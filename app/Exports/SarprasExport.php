<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SarprasExport implements FromCollection, WithMapping, WithHeadings
{

    private $jenis;


    
    public function __construct($jenis)
    {
        $this->jenis = $jenis;
    }
    

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table("t_data_sarpras as a")
        ->join("j_data_sarpras as b", function($join){
            $join->on("b.id_j_data_sarpras", "=", "a.id_j_data_sarpras");
        })
        ->join("j_kelurahan as c", function($join){
            $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_sarpras");
        })
        ->select("a.*", "b.nama_j_data_sarpras", "c.nama_j_kelurahan")
        // ->where('a.id_j_data_sarpras', $id)
        ->when($this->jenis != "semua", function($q, $jenis){
            return $q->where('a.id_j_data_sarpras', '=', $jenis);
        })
        ->get();
    }

    public function map($data): array
    {
        $i = 1;
        return [
            $i++,
            $data->nama_t_data_sarpras,
            $data->nama_j_data_sarpras,
            $data->alamat_t_data_sarpras,
            $data->rt_t_data_sarpras,
            $data->rw_t_data_sarpras,
            $data->nama_j_kelurahan,
            $data->keterangan_t_data_sarpras,
            $data->detail_t_data_sarpras,
        ];
    }
    
    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Jenis',
            'Alamat',
            'RT',
            'RW',
            'Kelurahan',
            'Keterangan',
            'Detail',
        ];
    }
}
