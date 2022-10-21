<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyTable;

class KeyTableController extends Controller
{
    public function data()
    {
        $key_table = KeyTable::all();
        return view('levelphp.index', compact('key_table'));
    }
    public function create(Request $request)
    {
        KeyTable::query()->insert(
            [
                'key1' => $request->Inputkey1,
                'key2' => $request->Inputkey2,
                'key3' => $request->Inputkey3,
                'key4' => $request->Inputkey4,
                'key5' => $request->Inputkey5,
                'key6' => $request->Inputkey6,
                'key7' => $request->Inputkey7,
                'key8' => $request->Inputkey8,
                'key9' => $request->Inputkey9,
                'key10' => $request->Inputkey10,
                'key11' => $request->Inputkey11,
            ]
        );
        return redirect()->back();
    }
    public function delete($id)
    {
        KeyTable::query()->where('id',$id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $key = KeyTable::query()->where('id', $id)->get();
        return view("levelphp.update", compact('key','id'));
    }
    public function update(Request $request,$id)
    {
        KeyTable::query()->where('id', $id)->update(
            [
                'key1' => $request->Inputkey1,
                'key2' => $request->Inputkey2,
                'key3' => $request->Inputkey3,
                'key4' => $request->Inputkey4,
                'key5' => $request->Inputkey5,
                'key6' => $request->Inputkey6,
                'key7' => $request->Inputkey7,
                'key8' => $request->Inputkey8,
                'key9' => $request->Inputkey9,
                'key10' => $request->Inputkey10,
                'key11' => $request->Inputkey11,
            ]
        );
        return redirect()->route("key.text");
    }
}
