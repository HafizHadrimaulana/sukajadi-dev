<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PegawaiExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths
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
        return DB::table("t_data_pegawai as a")
        ->join("j_sopd as c", function($join){
            $join->on("c.id_j_sopd", "=", "a.sopd_t_data_pegawai");
        })
        ->select("a.*", "c.nama_j_sopd")
        ->when($this->jenis != "semua", function($q, $jenis){
            return $q->where('a.id_j_data_pegawai', '=', $jenis);
        })
        ->get();
    }

    public function map($data): array
    {
        $i = 1;
        return [
            $i++,
            $data->nip_t_data_pegawai,
            $data->nama_t_data_pegawai,
            $data->gender_t_data_pegawai,
            $data->ttl_t_data_pegawai,
            $data->jabatan_t_data_pegawai,
            $data->pangkat_t_data_pegawai,
            $data->gol_t_data_pegawai,
            $data->esselon_t_data_pegawai,
            $data->pendidikan_t_data_pegawai,
            $data->email_t_data_pegawai,
            $data->telp_t_data_pegawai,
            $data->jabatan_lainnya_t_data_pegawai,
        ];
    }

    
    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45,            
        ];
    }
    
    public function headings(): array
    {
        return [
            '#',
            'NIP',
            'Nama',
            'Jenis Kelamin',
            'TTL',
            'Jabatan',
            'Pangkat',
            'Golongan',
            'Esselon',
            'Pendidikan',
            'Email',
            'Telepon',
            'Jabatan Lainnya'
        ];
    }
}
