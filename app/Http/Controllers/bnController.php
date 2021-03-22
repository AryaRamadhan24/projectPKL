<?php

namespace App\Http\Controllers;

use App\bn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

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

    public function bn($id)
    {
        $json = json_decode(file_get_contents("https://my-json-server.typicode.com/Aliie25/BukuNikahJson/bn"), true);

        $key = array_search("$id", array_column($json, 'nomor_bn'));
        // dd($key);
        $data3 = ['namaSuami'=>'Data Tidak Ditemukan','namaIstri'=>'Data Tidak Ditemukan'];
        if (is_int($key)) {
            $data = $json[$key]['nama_suami'];
            $data2 = $json[$key]['nama_istri'];
            $data3 = ['namaSuami'=>$data,'namaIstri'=>$data2];
        }

        echo json_encode($data3);
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

        if (bn::where('no_buku','=',$request->input('no_buku'))->exists()) {
            $status = DB::table('bns')->where('no_buku',$request->input('no_buku'))->select('status')->first();
            $status2 = $status->status;
            if ($status2!='valid') {
                $id = DB::table('bns')->where('no_buku',$request->input('no_buku'))->first()->no_buku;
                $data2 = bn::findOrFail($id);
                $data2->delete();
            }
            else{
                return redirect()->back()->with('alert','Data Ini Sudah di Validasi');
            }
        }

        $id_user = Auth::user()->id_user;
        $data=new \App\bn;
        $data->no_buku = $request->input('no_buku');
        $data->user_id = Auth::user()->id_user;
        if($request->hasFile('GambarSuami') or $request->hasFile('GambarIstri')){
            $ext = $request->file('GambarSuami')->getClientOriginalExtension();
            $name = $request->input('no_buku').'_suami'.'.'.$ext;
            $name2 = $request->input('no_buku').'_istri'.'.'.$ext;
            $path=$request->file('GambarSuami')->move('gambar/'.$id_user.'/gambarBN/',$name);
            $path2=$request->file('GambarIstri')->move('gambar/'.$id_user.'/gambarBN/',$name2);
            $data->gambarSuami='/gambar/'.$id_user.'/gambarBN/'.$name;
            $data->gambarIstri='/gambar/'.$id_user.'/gambarBN/'.$name2;
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

        $json = json_decode(file_get_contents("https://my-json-server.typicode.com/Aliie25/BukuNikahJson/bn"), true);

        $key = array_search("$id", array_column($json, 'nomor_bn'));

        $data1 = 'Data Tidak Ditemukan';
        $data2 = 'Data Tidak Ditemukan';
        $tglMenikah = 'Data Tidak Ditemukan';
        if (is_int($key)) {
            $data1 = $json[$key]['nama_suami'];
            $data2 = $json[$key]['nama_istri'];
            $data3 = ['namaSuami'=>$data1,'namaIstri'=>$data2];
            $tglMenikah = $json[$key]['Tanggal_Menikah'];
        }

        return view('bukunikah.edit',compact('data','tglMenikah','data1','data2'));
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

    public function gambarbnsuami($id)
    {
        header("Content-Type: image/png");
        $path = DB::table('bns')->where('no_buku',$id)->select('gambarSuami')->first();
        $path2 = $path->gambarSuami;

        return response()->file(public_path($path2));
    }

    public function gambarbnistri($id)
    {
        header("Content-Type: image/png");
        $path = DB::table('bns')->where('no_buku',$id)->select('gambarIstri')->first();
        $path2 = $path->gambarIstri;

        return response()->file(public_path($path2));
    }
}
