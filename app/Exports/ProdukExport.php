<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\AfterSheet;
use Maatwebsite\Excel\Concerns\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet as EventsAfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class ProdukExport implements FromCollection, WithHeadings, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produk::all();
    }
    
    public function registerEvents(): array
    {
        return[
            AfterSheet::class =>function(BeforeSheet $event){
                $event->sheet->getColumnDimension('A')->setWidth(5); //no
                $event->sheet->getColumnDimension('B')->setAutoSize(true); //nama produk
                $event->sheet->getColumnDimension('C')->setWidth(35); //created at
                $event->sheet->getColumnDimension('C')->setWidth(12); //update

                //judul atas
                $event->sheet->insertNewRowBefore(1,3);
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->insertNewRowBefore('A2:D2');
                $event->sheet->setCellValue('A1', "DATA PRODUK DI MARKET");
                $event->sheet->setCellValue('A2', "PER TANGGAL".date('d M Y'));

                //style
                $event->sheet->getStyle('A1:B2')->getFont()->setBold(true);
                $event->sheet->getStyle('A1:B2')->getAligment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A4:D4')->getAligment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                

                //Border
                $event->sheet->getStyle('A4:D' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders'=>[
                        'allBorders'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color'=>['rgb'=>'00000'],
                    ],
                ]);

            }
        ];
    }




    public function headings(): array{
     return[
        'No',
        'Nama Produk',
        'Created At',
        'Update At'
     ];
    }
public function title():string{
    return 'Data';
}
        
    
}
