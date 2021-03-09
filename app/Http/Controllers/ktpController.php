<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\ktp;

class ktpController extends Controller
{
    public function index()
    {
        $data = DB::table('ktp')
        ->select('id','nama','nik','Tanggal_Lahir','Jenis_Kelamin','Alamat','agama')
        ->get();

        return view('ktp.index',compact('data'));
    }

    public function add()
    {
        return view('ktp.tambah');
    }

    public function edit($id)
    {
        $data = DB::table('ktp')
        ->where('id', '=', $id)
        ->get();

        return view('ktp.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = \App\ktp::where('id',$id)->first();
        $data->nik = $request->input('NIK');
        $data->nama= $request->input('name');
        $data->Tempat_Lahir= $request->input('tempat');
        $data->Tanggal_Lahir= $request->input('tanggal');
        $data->Golongan_Darah= $request->input('Golongan_Darah');
        $data->Jenis_Kelamin= $request->input('JenisKelamin');
        $data->Alamat= $request->input('Alamat');
        $data->agama= $request->input('Agama');
        $data->status= $request->input('StatusPerkawinan');
        $data->pekerjaan= $request->input('Pekerjaan');
        $data->kewarganegaraan= $request->input('Kewarganegaraan');
        $data->masa_berlaku= $request->input('MasaBerlaku');
        if($request->hasFile('Gambar')){
            $path=$request->file('Gambar')->move('gambarKTP/',$request->input('NIK'));
            $data->gambar=$request->input('NIK');
            $data->save();
        }
        $data->save();

        return redirect()->route('editktp',['id'=>$id])->with('success','Data Berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $data=new \App\ktp;
        $data->nik = $request->input('NIK');
        $data->nama= $request->input('name');
        $data->Tempat_Lahir= $request->input('tempat');
        $data->Tanggal_Lahir= $request->input('tanggal');
        $data->Golongan_Darah= $request->input('Golongan_Darah');
        $data->Jenis_Kelamin= $request->input('JenisKelamin');
        $data->Alamat= $request->input('Alamat');
        $data->agama= $request->input('Agama');
        $data->status= $request->input('StatusPerkawinan');
        $data->pekerjaan= $request->input('Pekerjaan');
        $data->kewarganegaraan= $request->input('Kewarganegaraan');
        $data->masa_berlaku= $request->input('MasaBerlaku');
        if($request->hasFile('Gambar')){
            $path=$request->file('Gambar')->move('gambarKTP/',$request->input('NIK'));
            $data->gambar=$request->input('NIK');
            $data->save();
        }
        $data->save();
        return redirect()->route('ktp');
    }

    public function destroy($id)
    {
        $data = ktp::findOrFail($id);
        $data->delete();

        return redirect()->route('ktp');
    }
}
