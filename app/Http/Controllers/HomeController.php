<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $arsip1=count(DB::table('kks')->get());
        $arsip2=count(DB::table('ktps')->get());
        $arsip3=count(DB::table('bns')->get());
        $arsip = $arsip1+$arsip2+$arsip3;

        $userData = DB::table('users')
        ->join('desas','users.desa_id','=','desas.id_desa')
        ->where('users.level', '=', 'admin')
        ->select('users.id_user','users.name','users.email','users.Tempat_Lahir','users.Tanggal_Lahir','users.Alamat','users.No_Telp','desas.nama_desa')
        ->get();
        $userId = Auth::user()->id_user;

        $ktp = DB::table('ktps')->where('user_id', $userId)->get();
        $kk = DB::table('kks')->where('user_id', $userId)->get();
        $bn = DB::table('bns')->where('user_id', $userId)->get();

        $ktp_petugas = DB::table('ktps')->where('status', 'valid')->get();
        $kk_petugas = DB::table('kks')->where('status', 'valid')->get();
        $bn_petugas = DB::table('bns')->where('status', 'valid')->get();

        return view('dashboard.index',compact('admin','petugas','warga','arsip','userData','ktp','kk','bn','ktp_petugas','kk_petugas','bn_petugas'));
    }

    public function loginview()
    {
        return view('auth.login');
    }
}
