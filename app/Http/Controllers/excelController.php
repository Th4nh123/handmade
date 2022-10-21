<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyTable;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\importExcel;
use App\Imports\blacklist;
use App\Imports\keylist;
use App\Models\KeyCaoBai;
use App\Models\BlackList as ModelBlackList;
class excelController extends Controller
{
    public function excel()
    {
        return view('levelphp.excel');
    }

    public function excelUpload(Request $request)
    {
        $key_table = [];
        $key_table  = session()->get('excel');
        foreach ($key_table as $key => $value) {
            KeyTable::query()->insert(
                [
                    'id'    => null,
                    'key1'  => $value['key1'],
                    'key2'  => $value['key2'],
                    'key3'  => $value['key3'],
                    'key4'  => $value['key4'],
                    'key5'  => $value['key5'],
                    'key6'  => $value['key6'],
                    'key7'  => $value['key7'],
                    'key8'  => $value['key8'],
                    'key9'  => $value['key9'],
                    'key10' => $value['key10'],
                    'key11' => $value['key11']
                ]
            );
        }
    }

    public function render(Request $request)
    {
        $html = '';
        $html2 = '';
        $route = route('upload.excel');
        if ($request->has('file')) {
            Excel::import(new importExcel, $request->file('file'));
            $key_table  = session()->get('excel');
            $html = view('excel.render', compact('key_table'))->render();
            $html2 = view('excel.reportExcel',compact('route'))->render();
        }
        return [
            'html' => $html,
            'html2' => $html2
        ];
    }

    public function excelUploadkey(Request $request)
    {
        $key_table = [];
        $key_table  = session()->get('key_list');
        foreach ($key_table as $key => $value) {
            KeyCaoBai::query()->insert(
                [
                    'id'    => null,
                    'tien_to'  => $value['Tien_to'],
                    'Key_cha'  => $value['KeyCha'],
                    'hau_to'  => $value['Hau_To'],
                    'Key_cha1'  => $value['KeyCha1'],
                    'Key_cha2'  => $value['KeyCha2'],
                    'Key_cha3'  => $value['KeyCha3'],
                    'Key_cha4'  => $value['KeyCha4'],
                    'topview'  => $value['TopView'],
                ]
            );
        }
    }

    public function key_render(Request $request)
    {
        $html = '';
        $html2 = '';
        $route = route('upload.excel.key');
        if ($request->has('file')) {
            Excel::import(new keylist, $request->file('file'));
            $key_render  = session()->get('key_list');
            $html = view('excel.render_key', compact('key_render'))->render();
            $html2 = view('excel.reportExcel',compact('route'))->render();
        }
        return [
            'html' => $html,
            'html2' => $html2
        ];
    }

    public function excelUploadBlackList(Request $request)
    {
        $key_table = [];
        $key_table  = session()->get('blacklist');
        foreach ($key_table as $key => $value) {
            ModelBlackList::query()->insert(
                [
                    'id'    => null,
                    'domain'  => $value['blacklist'],
                    'categories' => $value['loai']
                ]
            );
        }
    }

    public function blacklist_render(Request $request)
    {
        $html = '';
        $html2 = '';
        $route = route('upload.excel.blacklist');
        if ($request->has('file')) {
            Excel::import(new blacklist, $request->file('file'));
            $blacklist  = session()->get('blacklist');
            $html = view('excel.render_blacklist', compact('blacklist'))->render();
            $html2 = view('excel.reportExcel',compact('route'))->render();
        }
        return [
            'html' => $html,
            'html2' => $html2
        ];
    }
}
