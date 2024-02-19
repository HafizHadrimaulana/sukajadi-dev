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

class PegawaiExport implements FromCollection, WithMapping, WithHeadings, 
WithHeadingRow, WithCustomStartCell, WithEvents, WithColumnWidths
{

    private $jenis;


    
    public function __construct($jenis)
    {
        $this->jenis = $jenis;
    }
    

    public function startCell(): string
    {
        return 'A1';
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
        ->select("c.nama_j_sopd", DB::raw("COUNT(*) as jml"))
        ->when($this->jenis != "semua", function($q, $jenis){
            return $q->where('a.id_j_data_pegawai', '=', $jenis);
        })
        ->groupBy('c.nama_j_sopd')
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
            'A' => 24,
            'B' => 10,            
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
                $event->sheet->getStyle('A1:B1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    // Add more styling options as needed
                ]);

                
                $event->sheet->insertNewRowBefore(1, 3);
                $event->sheet->setCellValue('A2','DATA PEGAWAI KECAMATAN SUKAJADI');
                $event->sheet->mergeCells('A2:B2');


                $event->sheet->getStyle('A3:B' . ($event->sheet->getHighestRow()))->applyFromArray([
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
