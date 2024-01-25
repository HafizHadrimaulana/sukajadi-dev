<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\TimeLine;
class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 1;
        $timelines = $data = TimeLine::with('foto')
        ->join("j_kegiatan as b", function($join){
            $join->on("b.id_j_kegiatan", "=", "t_p_kegiatan.id_j_kegiatan");
        })
        ->select("t_p_kegiatan.*", "b.nama_j_kegiatan")
        ->orderBy('tanggal_kegiatan', 'DESC')
        ->get();

        $groupedTimelines = $timelines->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('Y-m-d');
        });

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentData = $groupedTimelines->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedTimelines = new LengthAwarePaginator($currentData, count($groupedTimelines), $perPage);

        // dd($paginatedTimelines);
        return view('page.publik.kegiatan',[
            'data' => $paginatedTimelines
        ]);
    }
}
