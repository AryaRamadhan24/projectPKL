<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin=DB::table('users')->where('level','admin')->get();
        $petugas=DB::table('users')->where('level','petugas')->get();
        $warga=DB::table('users')->where('level','user')->get();
        $arsip=DB::table('kks','ktps','bns')->get();

        $userData = DB::table('users')
        ->join('desas','users.desa_id','=','desas.id_desa')
        ->where('users.level', '=', 'admin')
        ->select('users.id_user','users.name','users.email','users.Tempat_Lahir','users.Tanggal_Lahir','users.Alamat','users.No_Telp','desas.nama_desa')
        ->get();

        return view('dashboard.index',compact('admin','petugas','warga','arsip','userData'));
    }

    public function loginview()
    {
        return view('auth.login');
    }
}
