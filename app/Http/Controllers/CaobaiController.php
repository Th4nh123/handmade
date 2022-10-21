<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyCaoBai;
use App\Models\Paragraph;
use App\Models\BlackList;
use App\Exports\exportExcel;
use Maatwebsite\Excel\Facades\Excel;
class CaobaiController extends Controller
{

    public function search()
    {
        $keyCaoBai = KeyCaoBai::all();
        return view('caobai.search', compact('keyCaoBai'));
    }

    public function blacklist()
    {
        $blacklist = BlackList::all();
        return view('caobai.blacklist',compact('blacklist'));
    }

    public function inputkey()
    {
        // return view('caobai.create_search');
        return Excel::download(new exportExcel('key' => ), 'invoices.xlsx');
    }

    public function storekey(Request $request)
    {
        KeyCaoBai::query()->insert(
            [
                'id'    => null,
                'tien_to'  => $request['tien_to'],
                'key_cha'  => $request['KeyCha'],
                'hau_to'  => $request['hau_to'],
                'key_cha1'  => $request['KeyCha1'],
                'key_cha2'  => $request['KeyCha2'],
                'key_cha3'  => $request['KeyCha3'],
                'key_cha4'  => $request['KeyCha4'],
                'topview'  => $request['TopView'],
            ]
        );
        return redirect()->route('caobai.searchlist');
    }

    public function inputdomain()
    {
        return view("caobai.create_blacklist");
    }

    public function storedomain(Request $request)
    {
        BlackList::query()->insert(
            [
                'id'    => null,
                'domain'  => $request['domain'],
                'categories'  => $request['categories'],
            ]
        );
        return redirect()->route('view.inputdomain');
    }
    public function implements()
    {
        $keyCaoBai = KeyCaoBai::all();
        return view('caobai.implements', compact('keyCaoBai'));
    }

    public function googleapi(Request $request)
    {
        session()->forget('apigoogle');
        $keyCaoBai = KeyCaoBai::all();
        $api_key_search = 'AIzaSyDM6h0xL0RS58CwvkNgEYzBtLzPgZ6lOeo';
        $cx = '622357283d8f7426e';
        $start = 1;
        $amount = 1;
        $so_luong_url = "&num=$amount";
        $key_word = $request->keyCaoBai;
        $key_word = str_replace(" ","20%",$key_word);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.googleapis.com/customsearch/v1?key=$api_key_search&cx=$cx&start=$start&q=$key_word",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $url_json = json_decode($response);
        $url = [];
        if (isset($url_json)) {
            foreach ($url_json->items as $key => $value) {
                $url[$key] = $value;
            }
        }
        session()->put('apigoogle',$url);
        return view('caobai.implements', compact('url', 'keyCaoBai'));
    }

    public function storecontent()
    {
        $save =  session()->get('apigoogle');
        $title = $save[0]->htmlTitle;
        $htmlSnippet = $save[0]->htmlSnippet;
        $map_img =  $save[0]->pagemap->cse_thumbnail[0]->src;
        $content = "$title<br>$htmlSnippet<br><img src=$map_img>";
        dd($content);
        Paragraph::query()->insert(
            [
                'id' => null,
                'author' => 'admin',
                'posts_name' => "",
                'posts_content' => $content,
                'posts_image' =>  null
            ]

        );
        return redirect(route('list'));
    }
}
