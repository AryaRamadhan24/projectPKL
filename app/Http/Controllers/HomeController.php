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
        $desaIdPetugas = Auth::user()->desa_id;

        $admin=DB::table('users')->where('level','admin')->get();
        $petugas=DB::table('users')->where('level','petugas')->get();
        $warga=DB::table('users')->where('level','user')->get();
        $wargaDesa=DB::table('users')->where('level','user')->where('desa_id',$desaIdPetugas)->get();

        $arsip1=count(DB::table('kks')->join('users','users.id_user','kks.user_id')->where('users.desa_id',$desaIdPetugas)->get());
        $arsip2=count(DB::table('ktps')->join('users','users.id_user','ktps.user_id')->where('users.desa_id',$desaIdPetugas)->get());
        $arsip3=count(DB::table('bns')->join('users','users.id_user','bns..user_id')->where('users.desa_id',$desaIdPetugas)->get());
        $arsip = $arsip1+$arsip2+$arsip3;

        $arsip1Validated=count(DB::table('kks')->join('users','users.id_user','kks.user_id')->where('users.desa_id',$desaIdPetugas)->where('kks.status','!=','proses')->get());
        $arsip2Validated=count(DB::table('ktps')->join('users','users.id_user','ktps.user_id')->where('users.desa_id',$desaIdPetugas)->where('ktps.status','!=','proses')->get());
        $arsip3Validated=count(DB::table('bns')->join('users','users.id_user','bns..user_id')->where('users.desa_id',$desaIdPetugas)->where('bns.status','!=','proses')->get());
        $arsipValidated = $arsip1Validated+$arsip2Validated+$arsip3Validated;

        $arsip1Progress=count(DB::table('kks')->join('users','users.id_user','kks.user_id')->where('users.desa_id',$desaIdPetugas)->where('kks.status','proses')->get());
        $arsip2Progress=count(DB::table('ktps')->join('users','users.id_user','ktps.user_id')->where('users.desa_id',$desaIdPetugas)->where('ktps.status','proses')->get());
        $arsip3Progress=count(DB::table('bns')->join('users','users.id_user','bns..user_id')->where('users.desa_id',$desaIdPetugas)->where('bns.status','proses')->get());
        $arsipProgress = $arsip1Progress+$arsip2Progress+$arsip3Progress;

        $arsip1Admin=count(DB::table('kks')->get());
        $arsip2Admin=count(DB::table('ktps')->get());
        $arsip3Admin=count(DB::table('bns')->get());
        $arsipAdmin = $arsip1Admin+$arsip2Admin+$arsip3Admin;

        $userData = DB::table('users')
        ->join('desas','users.desa_id','=','desas.id_desa')
        ->where('users.level', '=', 'admin')
        ->select('users.id_user','users.name','users.email','users.Tempat_Lahir','users.Tanggal_Lahir','users.Alamat','users.No_Telp','desas.nama_desa')
        ->get();
        $userId = Auth::user()->id_user;

        $ktp = DB::table('ktps')->where('user_id', $userId)->get();
        $kk = DB::table('kks')->where('user_id', $userId)->get();
        $bn = DB::table('bns')->where('user_id', $userId)->get();

        $ktp_petugas = DB::table('ktps')
        ->where('status','!=', 'proses')
        ->join('users','users.id_user','ktps.user_id')
        ->where('users.desa_id',$desaIdPetugas)
        ->get();

        $kk_petugas = DB::table('kks')
        ->where('status','!=', 'proses')
        ->join('users','users.id_user','kks.user_id')
        ->where('users.desa_id',$desaIdPetugas)
        ->get();

        $bn_petugas = DB::table('bns')
        ->where('status','!=', 'proses')
        ->join('users','users.id_user','bns..user_id')
        ->where('users.desa_id',$desaIdPetugas)
        ->get();

        $namaDesa = DB::table('desas')
        ->where('id_desa',$desaIdPetugas)
        ->get();

        return view('dashboard.index',compact('admin','petugas','warga','wargaDesa','arsip','arsipAdmin','userData','ktp','kk','bn','ktp_petugas','kk_petugas','bn_petugas','namaDesa','arsipValidated','arsipProgress'));
    }

    public function loginview()
    {
        return view('auth.login');
    }
}
