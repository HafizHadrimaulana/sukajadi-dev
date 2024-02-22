<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PegawaiExport implements FromCollection, WithMapping, WithHeadings, 
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
        return  DB::table("t_data_pegawai as a")
        ->join("j_sopd as c", function($join){
            $join->on("c.id_j_sopd", "=", "a.sopd_t_data_pegawai");
        })
        ->select("c.id_j_sopd", "c.nama_j_sopd", DB::raw("COUNT(*) as jml"))
        ->when($this->jenis != "semua", function($q, $jenis){
            return $q->where('a.id_j_data_pegawai', '=', $jenis);
        })
        ->groupBy('c.nama_j_sopd', 'c.id_j_sopd')
        ->orderBy('c.id_j_sopd', 'DESC')
        ->get();

    }

    public function map($data): array
    {
        // $i = 1;
        return [
            // $i++,
            $data->nama_j_sopd,
            $data->jml
        ];
    }

    
    public function columnWidths(): array
    {
        return [
            'A' => 35,
            'B' => 18,            
        ];
    }
    
    public function headings(): array
    {
        return [
            'SOPD',
            'Jumlah',
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

                $j = DB::table("j_data_pegawai as a")->where('id_j_data_pegawai', $this->jenis)->first();

                if($this->jenis == 'semua'){
                    $title = 'DATA PEGAWAI ';
                }else{
                    $title = 'DATA PEGAWAI '. strtoupper($j->nama_j_data_pegawai);
                }
                
                $event->sheet->insertNewRowBefore(1, 4);
                $event->sheet->setCellValue('A2', $title);
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

                $event->sheet->getStyle('A'.$event->sheet->getHighestRow().':B'.$event->sheet->getHighestRow())->applyFromArray($headingStyle);

            },


        ];
    }
}
