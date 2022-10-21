<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
class keylist implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $excel = $collection->toArray();
        $excel_save = [];
        session()->forget('key_list');
        foreach ($excel as $key =>  $data) {
            foreach ($data as $key_data => $value) {
                $excel_save[$key] = [
                    'Tien_to'                    => $excel[$key][1],
                    'KeyCha'                     => $excel[$key][2],
                    'Hau_To'                     => $excel[$key][3],
                    'KeyCha1'                    => $excel[$key][4],
                    'KeyCha2'                    => $excel[$key][5],
                    'KeyCha3'                    => $excel[$key][6],
                    'KeyCha4'                    => $excel[$key][7],
                    'TopView'                    => $excel[$key][8],
                ];
            }
        }
        session()->put('key_list', $excel_save);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 5;
    }
}
