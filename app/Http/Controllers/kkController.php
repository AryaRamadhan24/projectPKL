<?php

namespace App\Http\Controllers;

use App\kk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class kkController extends Controller
{
    public function index()
    {
        $desaIdPetugas = Auth::user()->desa_id;

        $data = DB::table('kks')
        ->join('users','users.id_user','kks.user_id')
        ->where('users.desa_id',$desaIdPetugas)
        ->where('kks.status','proses')
        ->select('kks.no_kk')
        ->get();

        return view('kk.index',compact('data'));
    }

    public function add()
    {
        return view('kk.tambah');
    }

    public function kk($id)
    {
        $json = json_decode(file_get_contents("https://my-json-server.typicode.com/Gundho/testjson/kk"), true);

        $key = array_search("$id", array_column($json, 'nomor_kk'));
        // dd($key);
        $data = 'Data Tidak Ditemukan';
        if (is_int($key)) {
            $data = $json[$key]['nama_kk'];
        }

        echo $data;
    }

    public function edit($id)
    {
        $data = DB::table('kks')
        ->where('no_kk', '=', $id)
        ->get();

        $json = json_decode(file_get_contents("https://my-json-server.typicode.com/Gundho/testjson/kk"), true);

        $key = array_search("$id", array_column($json, 'nomor_kk'));

        $nama = 'Data Tidak Ditemukan';
        $dusun = 'Data Tidak Ditemukan';
        $rt = 'Data Tidak Ditemukan';
        $rw = 'Data Tidak Ditemukan';
        $kodePos = 'Data Tidak Ditemukan';
        $noTelp = 'Data Tidak Ditemukan';
        $alamat = 'Data Tidak Ditemukan';
        $anggota = null;
        if (is_int($key)) {
            $nama = $json[$key]['nama_kk'];
            $dusun = $json[$key]['alamat']['dusun'];
            $rt = $json[$key]['alamat']['rt'];
            $rw = $json[$key]['alamat']['rw'];
            $kodePos = $json[$key]['alamat']['kode_pos'];
            $noTelp = $json[$key]['alamat']['no_telp'];
            $alamat = 'DUSUN '.$dusun.', RT : '.$rt.', RW : '.$rw.', Kode Pos : '.$kodePos.', Telp : '.$noTelp;
            $anggota = $json[$key]['anggota'];
        }

        return view('kk.edit',compact('data','nama','alamat','anggota'));
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'no_kk' => 'required|numeric|digits:16',
            'Gambar' => 'required|mimes:jpg,jpeg,png',
        ])->validate();

        if (kk::where('no_kk','=',$request->input('no_kk'))->exists()) {
            $status = DB::table('kks')->where('no_kk',$request->input('no_kk'))->select('status')->first();
            $status2 = $status->status;
            if ($status2!='valid') {
                $id = DB::table('kks')->where('no_kk',$request->input('no_kk'))->first()->no_kk;
                $data2 = kk::findOrFail($id);
                $data2->delete();
            }
            else{
                return redirect()->back()->with('alert','Data Ini Sudah di Validasi');
            }
        }

        $id_user = Auth::user()->id_user;
        $data=new \App\kk;
        $data->no_kk = $request->input('no_kk');
        $data->user_id = Auth::user()->id_user;
        if($request->hasFile('Gambar')){
            $ext = $request->file('Gambar')->getClientOriginalExtension();
            $name = $request->input('no_kk').'.'.$ext;
            // dd($name);
            $path=$request->file('Gambar')->move('gambar/'.$id_user.'/gambarKK/',$name);
            $data->gambar= '/gambar/'.$id_user.'/gambarKK/'.$name;
            $data->save();
        }
        $data->save();
        return redirect()->route('home', ['data' => $request])->with('success','Data Berhasil ditambahkan');
    }
    public function destroy($id)
    {
        $data = kk::findOrFail($id);
        $data->delete();

        return redirect()->route('kk');
    }
    public function verify(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'valid':
                $data = \App\kk::where('no_kk',$id)->first();
                $data->status = 'valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;

            case 'notvalid':
                $data = \App\kk::where('no_kk',$id)->first();
                $data->status = 'tidak valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;
        }

        return redirect()->route('kk');
    }

    public function gambarkk($id)
    {
        header("Content-Type: image/png");
        $path = DB::table('kks')->where('no_kk',$id)->select('gambar')->first();
        $path2 = $path->gambar;
        // dd($path2);
        // $ext = $request->file('Gambar')->getClientOriginalExtension();

        return response()->file(public_path($path2));
    }
}
