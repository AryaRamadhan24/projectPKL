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
        $data = DB::table('kks')
        ->where('status','proses')
        ->select('no_kk')
        ->get();
        return view('kk.index',compact('data'));
    }

    public function add()
    {
        return view('kk.tambah');
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
        ])->validate();

        $data=new \App\kk;
        $data->no_kk = $request->input('no_kk');
        $data->user_id = Auth::user()->id_user;
        $data->save();
        return redirect()->route('kk', ['data' => $request])->with('success','Data Berhasil ditambahkan');
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
