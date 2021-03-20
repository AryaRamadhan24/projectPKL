<?php

namespace App\Http\Controllers;

use App\bn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class bnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desaIdPetugas = Auth::user()->desa_id;

        $data = DB::table('bns')
        ->join('users','users.id_user','bns..user_id')
        ->where('users.desa_id',$desaIdPetugas)
        // ->select('NIK','nama','Tanggal_Lahir','Jenis_Kelamin','agama')
        ->where('bns.status','proses')
        ->select('bns.no_buku')
        ->get();
        return view('bukunikah.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('bukunikah.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'no_buku' => 'required|numeric|digits:7',
            'GambarSuami' => 'required|mimes:jpg,jpeg,png',
            'GambarIstri' => 'required|mimes:jpg,jpeg,png',
        ])->validate();

        $id_user = Auth::user()->id_user;
        $data=new \App\bn;
        $data->no_buku = $request->input('no_buku');
        $data->user_id = Auth::user()->id_user;
        if($request->hasFile('Gambar')){
            $ext = $request->file('Gambar')->getClientOriginalExtension();
            $name = $request->input('no_buku').'.'.$ext;
            // dd($name);
            $path=$request->file('Gambar')->move('gambar/'.$id_user.'/gambarBN/',$name);
            $data->gambar=$name;
            $data->save();
        }
        $data->save();
        return redirect()->route('home', ['data' => $request])->with('success','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('bns')
        ->where('no_buku', '=', $id)
        ->get();

        return view('bukunikah.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = bn::findOrFail($id);
        $data->delete();

        return redirect()->route('bn');
    }
    
    public function verify(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'valid':
                $data = \App\bn::where('no_buku',$id)->first();
                $data->status = 'valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;

            case 'notvalid':
                $data = \App\bn::where('no_buku',$id)->first();
                $data->status = 'tidak valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;
        }

        return redirect()->route('bn');
    }
}
