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

class SarprasExport implements FromCollection, WithMapping, WithHeadings, 
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
        $query = DB::table("t_data_sarpras as a")
        ->join("j_kelurahan as c", function($join){
            $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_sarpras");
        })
        ->select("c.nama_j_kelurahan", DB::raw("COUNT(*) as jml"))
        ->when($this->jenis != "semua", function($q){
            return $q->where('a.id_j_data_sarpras', '=', $this->jenis);
        })
        ->groupBy('c.nama_j_kelurahan')
        ->get();
        // dd($data);'

        $data = Collect([]);
        $total = 0;
        foreach($query as $q){
            $data->push([
                 'nama' => $q->nama_j_kelurahan,
                 'jml' => $q->jml
            ]);

            $total += $q->jml;
        }

        $data->push([
             'nama' => 'Kecamatan Sukajadi',
             'jml' => $total
        ]);

        return $data;
    }

    public function map($data): array
    {
        $i = 1;
        return [
            $data['nama'],
            $data['jml'],
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
            // '#',
            'Kelurahan',
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
                
                $j = DB::table("j_data_sarpras as a")->where('id_j_data_sarpras', $this->jenis)->first();

                if($this->jenis == 'semua'){
                    $title = 'DATA SARANA & PRASANA';
                }else{
                    $title = 'DATA SARANA & PRASANA '. strtoupper($j->nama_j_data_sarpras);
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
