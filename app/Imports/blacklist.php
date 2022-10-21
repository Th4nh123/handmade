<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class blacklist implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $excel = $collection->toArray();
        $excel_save = [];
        session()->forget('blacklist');
        foreach ($excel as $key =>  $data) {
            foreach ($data as $key_data => $value) {
                $excel_save[$key] = [
                    'blacklist'                    => $excel[$key][1],
                    'loai'                         => $excel[$key][2],
                ];
            }
        }
        session()->put('blacklist', $excel_save);
    }

     /**
     * @return int
     */
    public function startRow(): int
    {
        return 5;
    }
}
