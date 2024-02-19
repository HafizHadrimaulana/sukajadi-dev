<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class UsahaExport implements FromCollection, WithMapping, WithHeadings, 
WithHeadingRow, WithEvents, WithColumnWidths
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
        // ->join("j_data_usaha as b", function($join){
        //     $join->on("b.id_j_data_usaha", "=", "a.id_j_data_usaha");
        // })
        ->join("j_kelurahan as c", function($join){
            $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_usaha");
        })
        ->select("c.nama_j_kelurahan", DB::raw("COUNT(*) as jumlah"))
        ->when($this->jenis != "semua", function($q, $jenis){
            return $q->where('a.id_j_data_usaha', '=', $jenis);
        })
        ->groupBy('c.nama_j_kelurahan')
        ->get();
    }

    public function map($data): array
    {
        $i = 1;
        return [
            $data->nama_j_kelurahan,
            $data->jumlah,
        ];
    }

    
    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 20,            
        ];
    }
    
    public function headings(): array
    {
        return [
            'Kelurahan',
            'Jumlah'
            // '#',
            // 'Nama Usaha',
            // 'Pemilik Usaha',
            // 'NIK Pemilik Usaha',
            // 'Merk',
            // 'Izin',
            // 'No Izin',
            // 'Tahun Berdiri',
            // 'Alamat',
            // 'RT',
            // 'RW',
            // 'Kelurahan',
            // 'Keterangan',
            // 'Jenis Usaha',
            // 'Produk',
            // 'Email',
            // 'Sosmed',
            // 'No. Telepon'
        ];
    }

    

    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {

                $headingStyle = [
                    
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];


                $event->sheet->insertNewRowBefore(1, 4);

                $event->sheet->setCellValue('A2','DATA USAHA');
                $event->sheet->setCellValue('A3','KECAMATAN SUKAJADI, KOTA BANDUNG');
                

                $event->sheet->mergeCells('A2:B2');
                $event->sheet->mergeCells('A3:B3');


                
                $event->sheet->getStyle('A2:B3')->applyFromArray($headingStyle);
                $event->sheet->getStyle('A5:B5')->applyFromArray($headingStyle);

                $event->sheet->getStyle('A5:B' . ($event->sheet->getHighestRow()))->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);
            },

        ];
    }
}
