<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminform(){

        // Chuyển dữ liệu qua view và trả về view adminform.blade với dữ liệu sản phẩm
        return view('adminform');
    }
}
