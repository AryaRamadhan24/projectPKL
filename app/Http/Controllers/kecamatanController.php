<?php

namespace App\Http\Controllers;

use App\kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class kecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kecamatans')
        ->get();

        return view('Kecamatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kecamatan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new \App\kecamatan;
        $data->nama_kecamatan = $request->input('name');
        $data->save();
        return redirect()->route('kecamatan')->with('success','Data Berhasil ditambahkan');
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
        $data = DB::table('kecamatans')
        ->where('id_kecamatan',$id)
        ->get();

        return view('Kecamatan.edit',compact('data'));
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
        $dataUser = \App\kecamatan::where('id_kecamatan',$id)->first();
        $dataUser->nama_kecamatan = $request->input('name');

        $dataUser->save();

        return redirect()->route('editKecamatan',['id_kecamatan'=>$id])->with('success','Data Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = kecamatan::findOrFail($id);
            $data->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with('alert','Data Tidak Dapat Di Hapus Karena Masih Terdapat Desa Pada Kecamatan Tersebut');
        }

        return redirect()->route('kecamatan');
    }
}
