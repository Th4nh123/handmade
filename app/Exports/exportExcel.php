<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\KeyTable;
class exportExcel implements FromView, ShouldAutoSize, WithTitle, WithStyles, WithEvents,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $key;

    public function __construct(array $key)
    {
        $this->key = $key['key_table'];
    }
    public function view(): View
    {
        return view('excel.reportExcel', [
            'key_excel' => $this->key
        ]);
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 7,
            'B' => 18,
            'C' => 18,
            'D' => 18,
            'E' => 18,
            'F' => 18,
            'G' => 18,
            'H' => 18,
            'I' => 18,
            'J' => 18,
            'K' => 18,
            'L' => 18,
        ];
    }  

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:L2');
        $sheet->mergeCells('A3:L3');
 
        $sheet->setCellValue('A1', 'Danh sách vừa lưu');
        $styleMain =[ 
            'font' => [
                'bold' => true,
                'size'=> 16
            ],
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $sheet->getStyle('A1')-> applyFromArray($styleMain);

        $sheet->setCellValue('A3', 'Thời gian : '.date('d/m/Y', time()));
        $styleMain2 =[ 
            'font' => [
                'size'=> 17
            ],
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $sheet->getStyle('A3')-> applyFromArray($styleMain2);

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' =>14
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'vertical'=>[
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
                'outline' =>[
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ]
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            ]
        ];
        //$color = '5ae6ae';
        $sheet->getStyle('A4:L4')-> applyFromArray($styleArray);
        $sheet->getRowDimension(4)->setRowHeight(40);

        $sheet->setCellValue('A4', 'STT');
        $sheet->setCellValue('B4', 'Key1');
        $sheet->setCellValue('C4', 'Key2');
        $sheet->setCellValue('D4', 'Key3');
        $sheet->setCellValue('E4', 'Key4');
        $sheet->setCellValue('F4', 'Key5');
        $sheet->setCellValue('G4', 'Key6');
        $sheet->setCellValue('H4', 'Key7');
        $sheet->setCellValue('I4', 'Key8');
        $sheet->setCellValue('J4', 'Key9');
        $sheet->setCellValue('K4', 'Key10');
        $sheet->setCellValue('L4', 'Key11');
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A4:L4';
                $color = '93ccea';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->getStartColor()->setRGB($color);
            }
        ];
    }



    public function title(): string
    {
        return 'Hanoi_' . date('d-m-Y', time());
    }

}
