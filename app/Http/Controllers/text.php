<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyTable;

class text extends Controller
{

    public function index(Request $request)
    {
        $old_text = $request['text'];
        $key_table = KeyTable::all();
        $translated_text = $this->spin_word($old_text, $key_table);
        return view('levelphp.text', compact('old_text', 'translated_text'));
    }

    public function spin_word($old_text, $key_table)
    {
        $translated_text = "  " . $old_text . "  ";
        $key_array = [];
        $array_element = [];
        $key_table_array = $key_table->pluck('key1');
        foreach ($key_table_array as $key1) {
            $data = $key_table->where('key1', $key1)->first();
            if ($data->key2 != null) {
                array_push($array_element, $data->key2);
            }
            if ($data->key3 != null) {
                array_push($array_element, $data->key3);
            }
            if ($data->key4 != null) {
                array_push($array_element, $data->key4);
            }
            if ($data->key5 != null) {
                array_push($array_element, $data->key5);
            }
            if ($data->key6 != null) {
                array_push($array_element, $data->key6);
            }
            if ($data->key7 != null) {
                array_push($array_element, $data->key7);
            }
            if ($data->key8 != null) {
                array_push($array_element, $data->key8);
            }
            if ($data->key9 != null) {
                array_push($array_element, $data->key9);
            }
            if ($data->key10 != null) {
                array_push($array_element, $data->key10);
            }
            if ($data->key11 != null) {
                array_push($array_element, $data->key11);
            }
            $index = rand(0, count($array_element) - 1);
            $key_array[$data->key1] = $array_element[$index];
            $array_element = [];
        }
        $key_word_1 = [];
        $key_word_2 = [];
        foreach ($key_array as $key => $value) {
            if ((int)(strpos("$key", " ")) == 0) {
                $key_word_1[" $key "] = " $value ";
            } else {
                $key_word_2[$key] = $value;
            }
        }
        foreach ($key_word_2 as $key => $key_translate) {
            if ((int)(strpos($translated_text, $key)) > 0) {
                $translated_text = str_replace($key, $key_translate, $translated_text);
            }
        }

        $string = " ,.\"'!(){}[]/\?_#*=+•_~:x";
        for ($i = 0; $i < strlen($string); $i++) {
            $translated_text = str_replace("$string[$i]", " $string[$i] ", $translated_text);
        }
        foreach ($key_word_1 as $key => $key_translate) {
            if ((int)(strpos($translated_text, $key)) > 0) {
                $translated_text = str_replace($key, $key_translate, $translated_text);
            }
        }

        for ($i = 0; $i < strlen($string); $i++) {
            $translated_text = str_replace(" $string[$i] ", "$string[$i]", $translated_text);
        }
        $translated_text = explode("  ", $translated_text, 2)[1];
        return $translated_text;
    }

}
