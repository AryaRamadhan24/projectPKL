<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ktpController extends Controller
{
    public function index()
    {
        return view('ktp.index');
    }
}
