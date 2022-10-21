<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class importExcel implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $excel = $collection->toArray();
        $excel_save = [];
        session()->forget('excel');
        foreach ($excel as $key =>  $data) {
            foreach ($data as $key_data => $value) {
                $excel_save[$key] = [
                    'key1'                    => $excel[$key][1],
                    'key2'                    => $excel[$key][2],
                    'key3'                    => $excel[$key][3],
                    'key4'                    => $excel[$key][4],
                    'key5'                    => $excel[$key][5],
                    'key6'                    => $excel[$key][6],
                    'key7'                    => $excel[$key][7],
                    'key8'                    => $excel[$key][8],
                    'key9'                    => $excel[$key][9],
                    'key10'                   => $excel[$key][10],
                    'key11'                   => $excel[$key][11],
                ];
            }
        }
        session()->put('excel', $excel_save);
    }


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 5;
    }
}
