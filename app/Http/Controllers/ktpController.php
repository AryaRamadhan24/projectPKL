<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\ktp;
use Illuminate\Support\Facades\Auth;

class ktpController extends Controller
{
    public function index()
    {
        $desaIdPetugas = Auth::user()->desa_id;

        $data = DB::table('ktps')
        ->join('users','users.id_user','ktps.user_id')
        ->where('users.desa_id',$desaIdPetugas)
        ->where('ktps.status','proses')
        ->select('ktps.NIK')
        ->get();

        return view('ktp.index',compact('data'));
    }

    public function add()
    {
        return view('ktp.tambah');
    }

    public function edit($id)
    {
        $data = DB::table('ktps')
        ->where('NIK', '=', $id)
        ->get();

        return view('ktp.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = \App\ktp::where('id',$id)->first();
        $data->pesan = $request->input('pesan');
        // $data->nik = $request->input('NIK');
        // $data->nama= $request->input('name');
        // $data->Tempat_Lahir= $request->input('tempat');
        // $data->Tanggal_Lahir= $request->input('tanggal');
        // $data->Golongan_Darah= $request->input('Golongan_Darah');
        // $data->Jenis_Kelamin= $request->input('JenisKelamin');
        // $data->Alamat= $request->input('Alamat');
        // $data->agama= $request->input('Agama');
        // $data->status= $request->input('StatusPerkawinan');
        // $data->pekerjaan= $request->input('Pekerjaan');
        // $data->kewarganegaraan= $request->input('Kewarganegaraan');
        // $data->masa_berlaku= $request->input('MasaBerlaku');
        // if($request->hasFile('Gambar')){
        //     $path=$request->file('Gambar')->move('gambarKTP/',$request->input('NIK'));
        //     $data->gambar=$request->input('NIK');
        //     $data->save();
        // }

        $data->save();

        return redirect()->route('editktp',['id'=>$id])->with('success','Data Berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'NIK' => 'required|numeric|digits:16',
            'Gambar' => 'required|mimes:jpg,jpeg,png',
        ])->validate();

        $id_user = Auth::user()->id_user;
        $data=new \App\ktp;
        $data->nik = $request->input('NIK');
        $data->user_id = Auth::user()->id_user;
        // $data->nama= $request->input('name');
        // $data->Tempat_Lahir= $request->input('tempat');
        // $data->Tanggal_Lahir= $request->input('tanggal');
        // $data->Golongan_Darah= $request->input('Golongan_Darah');
        // $data->Jenis_Kelamin= $request->input('JenisKelamin');
        // $data->Alamat= $request->input('Alamat');
        // $data->agama= $request->input('Agama');
        // $data->status= $request->input('StatusPerkawinan');
        // $data->pekerjaan= $request->input('Pekerjaan');
        // $data->kewarganegaraan= $request->input('Kewarganegaraan');
        // $data->masa_berlaku= $request->input('MasaBerlaku');
        if($request->hasFile('Gambar')){
            $ext = $request->file('Gambar')->getClientOriginalExtension();
            $name = $request->input('NIK').'.'.$ext;
            // dd($name);
            $path=$request->file('Gambar')->move('gambar/'.$id_user.'/gambarKTP/',$name);
            $data->gambar=$name;
            $data->save();
        }
        $data->save();
        return redirect()->route('home',['data' => $request])->with('success','Data Berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = ktp::findOrFail($id);
        $data->delete();

        return redirect()->route('ktp');
    }
    public function verify(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'valid':
                $data = \App\ktp::where('NIK',$id)->first();
                $data->status = 'valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;

            case 'notvalid':
                $data = \App\ktp::where('NIK',$id)->first();
                $data->status = 'tidak valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;
        }

        return redirect()->route('ktp');
    }
}
