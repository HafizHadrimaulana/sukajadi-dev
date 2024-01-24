<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5;
        $timelines = $data = DB::table("t_kegiatan as a")
        ->join("j_kegiatan as b", function($join){
            $join->on("b.id_j_kegiatan", "=", "a.id_j_kegiatan");
        })
        ->join("j_satuan as c", function($join){
            $join->on("c.id_j_satuan", "=", "a.id_j_satuan");
        })
        // ->join("j_sopd as d", function($join){
        //     $join->on("d.id_j_sopd", "=", "a.id_j_sopd");
        // })
        ->select("a.*", "b.nama_j_kegiatan", "c.nama_j_satuan")
        ->orderBy('tanggal_t_kegiatan', 'DESC')
        ->get();
        $groupedTimelines = DB::table("t_kegiatan as a")->
        select(DB::raw('DATE(tanggal_t_kegiatan) as date'), DB::raw('count(*) as count'))
            ->groupBy('tanggal_t_kegiatan')
            ->orderBy('tanggal_t_kegiatan', 'DESC')
            ->get();

        $allTimelines = collect([]);

        foreach ($groupedTimelines as $group) {
            $groupedData = $timelines->where('tanggal_t_kegiatan', $group->date);
            $allTimelines = $allTimelines->concat($groupedData);
        }

        // dd($allTimelines);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentData = $allTimelines->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedTimelines = new LengthAwarePaginator($currentData, count($allTimelines), $perPage);

        return view('page.publik.kegiatan',[
            'data' => $paginatedTimelines
        ]);
    }
}
