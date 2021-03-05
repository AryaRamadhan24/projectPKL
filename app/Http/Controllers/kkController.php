<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kkController extends Controller
{
    public function index()
    {
        return view('kk.index');
    }

    public function add()
    {
        return view('kk.tambah');
    }
}
