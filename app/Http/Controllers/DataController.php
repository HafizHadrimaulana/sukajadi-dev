<?php

namespace App\Http\Controllers;
use App\Models\Gis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class DataController extends Controller
{    
    public function penghargaan(Request $request)
    {
        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_penghargaan as a")
            ->select(DB::raw('YEAR(tanggal_t_data_penghargaan) as tahun'), DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('data.penghargaan.show', ['tahun' => $row->tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.publik.data.penghargaan.index');
    }

    public function penghargaanDetail($tahun, Request $request)
    {
        
        if ($request->ajax()) {
            
            $data = DB::table("t_data_penghargaan as a")
            ->join("j_data_penghargaan as b", function($join){
                $join->on("b.id_j_data_penghargaan", "=", "a.id_j_data_penghargaan");
            })
            ->join("j_sopd as c", function($join){
                $join->on("c.id_j_sopd", "=", "a.sopd_t_data_penghargaan");
            })
            ->whereYear('a.tanggal_t_data_penghargaan', $tahun)
            ->select("a.*", "nama_j_data_penghargaan", "nama_j_sopd")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    // $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    $btn = '<button class="btn btn-sm btn-info mr-1"><i class="fa fa-edit"></i></button>';
                    $btn .= '<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }
        return view('page.publik.data.penghargaan.detail',[
            'tahun' => $tahun
        ]);
    }
    

    public function sarpras(Request $request)
    {

        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_sarpras as a")
            ->join("j_data_sarpras as b", function($join){
                $join->on("b.id_j_data_sarpras", "=", "a.id_j_data_sarpras");
            })
            ->select("a.id_j_data_sarpras", "b.nama_j_data_sarpras", DB::raw('COUNT(*) as jumlah'))
            ->groupBy("a.id_j_data_sarpras", "b.nama_j_data_sarpras")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('data.sarpras.show', ['id' => $row->id_j_data_sarpras]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.publik.data.sarpras.index');
    }

    public function sarprasDetail($id, Request $request)
    {
        $data = DB::table('j_data_sarpras')->select('*')->where('id_j_data_sarpras', $id)->first();

        return view('page.publik.data.sarpras.detail',[
            'data' => $data
        ]);
    }


    public function sarprasData($id, Request $request)
    {
        $query = DB::table("t_data_sarpras as a")
        ->join("j_data_sarpras as b", function($join){
            $join->on("b.id_j_data_sarpras", "=", "a.id_j_data_sarpras");
        })
        ->join("j_kelurahan as c", function($join){
            $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_sarpras");
        })
        ->select("a.*", "b.nama_j_data_sarpras", "c.nama_j_kelurahan")
        ->where('a.id_j_data_sarpras', $id);


        if($request->page){
            $data = $query->paginate(20);
        }else{
            $data = $query->get();
        }

        return response()->json($data);

    }

    
    public function markers($id, Request $request)
    {
        $query = DB::table("t_data_sarpras as a")
        ->join("j_data_sarpras as b", function($join){
            $join->on("b.id_j_data_sarpras", "=", "a.id_j_data_sarpras");
        })
        ->join("j_kelurahan as c", function($join){
            $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_sarpras");
        })
        ->whereNotNull('a.lat_t_data_sarpras')
        ->whereNotNull('a.lng_t_data_sarpras')
        ->select("a.*", "b.nama_j_data_sarpras", "c.nama_j_kelurahan")
        ->where('a.id_j_data_sarpras', $id);


        if($request->page){
            $data = $query->paginate(20);
        }else{
            $data = $query->get();
        }

        return response()->json($data);

    }
}
