<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextTable;
use App\Models\Paragraph;

class TextController extends Controller
{
    public function list()
    {
        $list = Paragraph::all();
        return view('paragraph.list', compact('list'));
    }

    public function paragraph_v2($name)
    {
        $content = Paragraph::query()->where('posts_name', '=', $name)->first();
        return view('paragraph.paragraph_v2', compact('content'));
    }

    public function paragraph()
    {
        $content = null;
        return view('paragraph.paragraph_v2', compact('content'));
    }

    public function edit_paragraph(Request $request)
    {
        $paragraph = Paragraph::query()->pluck('posts_name', 'id')->toArray();
        $paragraph_array = [];
        foreach ($paragraph as $key => $value) {
            $paragraph_array[$key] = route('paragraph.v2', ['name' => '']) . '/' . $value;
        }
        $index = array_search($request->paragraph, $paragraph_array);
        $paragraph_get = Paragraph::query()->where('id', $index)->first();
        return view('paragraph.edit_paragraph', compact('paragraph_get'));
    }

    public function edit_paragraph_v2($id)
    {
        $paragraph = Paragraph::query()->where('id', $id)->first();
        return view('paragraph.edit_paragraph_v2', compact('paragraph', 'id'));
    }

    public function update_paragraph_v3(Request $request, $id)
    {
        Paragraph::query()->where('id', $id)->update(
            ['posts_content' => $request->paragraph]
        );
        return redirect()->route('list');
    }

    public function update_paragraph(Request $request)
    {
        $request_array = [];
        foreach ($request->all() as $key => $value) {
            $row = explode('_', $key);
            $request_array[$row[1]][$row[0]] = $value;
        }
        $array_request = [];
        foreach ($request_array as $key => $value) {
            if (is_long($key)) {
                $array_request[$key] = $value;
            }
        }
        foreach ($array_request as $key => $value) {
            TextTable::query()->where('id', '=', $key + 1)->update($value);
        }
        return redirect(route('list'));
    }

    public function update_paragraph_v2(Request $request)
    {
        $id_max = collect(Paragraph::query()->select('id')->get()->toArray())->max('id');
        if ($id_max == null) {
            $id_max == 0;
        }
        Paragraph::query()->insert(
            [
                'id' => null,
                'author' => 'admin',
                'posts_name' => 'van_ban' . $id_max,
                'posts_content' => $request->paragraph,
                'posts_image' =>  null
            ]

        );
        return redirect(route('list'));
    }

    public function add_paragraph(Request $request)
    {
        $paragraph = $request->paragragh;
        $view = '';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.googleapis.com/customsearch/v1?key=AIzaSyDM6h0xL0RS58CwvkNgEYzBtLzPgZ6lOeo&cx=622357283d8f7426e&start=1&q=Key3',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-API-Key: {{postman-api-key}}'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $url_json = json_decode($response);
        // dd($url_json->items[3]);
        $title = $url_json->items[3]->htmlTitle;
        $htmlSnippet = $url_json->items[3]->htmlSnippet;
        $map_img =  $url_json->items[3]->pagemap->cse_thumbnail[0]->src;
        $content = "$title<br>$htmlSnippet<br><img src=$map_img>";
        // dd($content);
        return view('paragraph.add_paragraph_v2', compact('paragraph', 'view','content'));
    }

    public function delete_paragraph($id)
    {
        Paragraph::query()->where('id', $id)->delete();
        return redirect()->route('list');
    }
}
