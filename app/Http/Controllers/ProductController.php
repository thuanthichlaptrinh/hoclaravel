<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function soluong($soluong) {
        return 'Số lượng sản phẩm: ' . $soluong;
    }

    public function danhsach($ds) {
        // return view('tintuc', ['ds' => $ds]);
        // return view('tintuc', compact('ds'));
        return view('tintuc')->with('ds', $ds);
    }

}
