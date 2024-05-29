<?php

namespace App\Http\Controllers;

use App\Models\tlbproduct;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function trangchu(){
        return view('index', compact([]));
    }

    public function sanpham(){

        $y = 1;
        $x = "tôi chịu";

        $product = tlbproduct::where('id', "1")->get();

        return view('product', compact(['x', 'y', 'product']));

    }

}
