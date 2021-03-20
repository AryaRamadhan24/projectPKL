<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\desa;

class desaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('desas')
        ->get();

        return view('Desa.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('kecamatans')
        ->get();

        return view('Desa.tambah',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new \App\desa;
        $data->nama_desa = $request->input('name');
        $data->kecamatan_id = $request->input('kecamatan');
        $data->save();

        return redirect()->route('desa')->with('success','Data Berhasil ditambahkan');
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
        $data = DB::table('desas')
        ->where('id_desa',$id)
        ->get();

        $kecamatan = DB::table('kecamatans')
        ->get();

        return view('Desa.edit',compact('data','kecamatan'));
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
        $dataUser = \App\desa::where('id_desa',$id)->first();
        $dataUser->nama_desa = $request->input('name');
        $dataUser->kecamatan_id = $request->input('kecamatan');
        $dataUser->save();

        return redirect()->route('editdesa',['id_desa'=>$id])->with('success','Data Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = desa::findOrFail($id);
        $data->delete();

        return redirect()->route('desa');
    }
}
