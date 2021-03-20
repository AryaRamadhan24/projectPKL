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

        $data = $json[$key]['nama_kk'];

        echo $data;
    }

    public function edit($id)
    {
        $data = DB::table('kks')
        ->where('no_kk', '=', $id)
        ->get();

        return view('kk.edit',compact('data'));
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'no_kk' => 'required|numeric|digits:16',
            'Gambar' => 'required|mimes:jpg,jpeg,png',
        ])->validate();

        $id_user = Auth::user()->id_user;
        $data=new \App\kk;
        $data->no_kk = $request->input('no_kk');
        $data->user_id = Auth::user()->id_user;
        if($request->hasFile('Gambar')){
            $ext = $request->file('Gambar')->getClientOriginalExtension();
            $name = $request->input('no_kk').'.'.$ext;
            // dd($name);
            $path=$request->file('Gambar')->move('gambar/'.$id_user.'/gambarKK/',$name);
            $data->gambar=$name;
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
}
