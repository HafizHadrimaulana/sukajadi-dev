<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsahaExport implements FromCollection, WithMapping, WithHeadings
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
        return DB::table("t_data_usaha as a")
        ->join("j_data_usaha as b", function($join){
            $join->on("b.id_j_data_usaha", "=", "a.id_j_data_usaha");
        })
        ->join("j_kelurahan as c", function($join){
            $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_usaha");
        })
        ->select("a.*", "b.nama_j_data_usaha", "c.nama_j_kelurahan")
        // ->where('a.id_j_data_usaha', $id)
        ->when($this->jenis != "semua", function($q, $jenis){
            return $q->where('a.id_j_data_usaha', '=', $jenis);
        })
        ->get();
    }

    public function map($data): array
    {
        $i = 1;
        return [
            $i++,
            $data->nama_t_data_usaha,
            $data->pemilik_t_data_usaha,
            $data->nik_t_data_usaha,
            $data->merk_t_data_usaha,
            $data->izin_t_data_usaha,
            $data->no_izin_t_data_usaha,
            $data->tahun_berdiri_t_data_usaha,
            $data->alamat_t_data_usaha,
            $data->rt_t_data_usaha,
            $data->rw_t_data_usaha,
            $data->nama_j_kelurahan,
            $data->keterangan_t_data_usaha,
            $data->jenis_t_data_usaha,
            $data->produk_t_data_usaha,
            $data->email_t_data_usaha,
            $data->sosmed_t_data_usaha,
            $data->telp_t_data_usaha,
        ];
    }
    
    public function headings(): array
    {
        return [
            '#',
            'Nama Usaha',
            'Pemilik Usaha',
            'NIK Pemilik Usaha',
            'Merk',
            'Izin',
            'No Izin',
            'Tahun Berdiri',
            'Alamat',
            'RT',
            'RW',
            'Kelurahan',
            'Keterangan',
            'Jenis Usaha',
            'Produk',
            'Email',
            'Sosmed',
            'No. Telepon'
        ];
    }
}
