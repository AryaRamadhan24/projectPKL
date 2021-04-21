<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\menu;
use App\extradata;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = DB::table('menus')
        ->get();

        return view('menu.index',compact('menu'));
    }

    public function indexMenu($id)
    {
        $data = DB::table('menus')
        ->where('id',$id)
        ->get();
        $menu = DB::table('menus')
        ->get();
        return view('menu.tambahIndex',compact('data','menu'));
    }

    public function indexIndex($id)
    {
        $desaIdPetugas = Auth::user()->desa_id;

        $data = DB::table('extradatas')
        ->join('users','users.id_user','extradatas.user_id')
        ->where('users.desa_id',$desaIdPetugas)
        ->where('extradatas.menu_id',$id)
        ->where('extradatas.status','proses')
        ->select('extradatas.input','extradatas.updated_at')
        ->get();

        $menu = DB::table('menus')
        ->get();

        return view('menu.indexIndex',compact('data','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = DB::table('menus')
        ->get();
        return view('menu.tambah',compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new \App\menu;
        $data->nama_menu = $request->input('name');
        $data->nama_input = $request->input('input1');
        $data->nama_inputGambar = $request->input('input2');
        $data->save();
        return redirect()->route('menu');
    }

    public function storeIndex(Request $request, $id)
    {

        if (extradata::where('input','=',$request->input('input1'))->exists()) {
            $status = DB::table('extradatas')->where('input',$request->input('input1'))->select('status')->first();
            $status2 = $status->status;
            if ($status2!='valid') {
                //  = DB::table('extradatas')->where('input',$request->input('input1'))->first()->input;
                $data3 = DB::table('extradatas')
                ->where('input',$request->input('input1'))
                ->first();
                // dd($data3);
                $hapus = $data3->id_extra;

                $data3 = extradata::findOrFail($hapus);
                $data3->delete();
            }
            else{
                return redirect()->back()->with('alert','Data Ini Sudah di Validasi');
            }
        }

        $id_user = Auth::user()->id_user;
        $data=new \App\extradata;
        $data->input = $request->input('input1');
        $data->user_id = Auth::user()->id_user;
        $data->menu_id = $id;

        if($request->hasFile('Gambar')){
            $ext = $request->file('Gambar')->getClientOriginalExtension();
            $name = $request->input('input1').'.'.$ext;
            // dd($name);
            $path=$request->file('Gambar')->move('gambar/'.$id_user.'/gambarExtra/',$name);
            $data->gambar='/gambar/'.$id_user.'/gambarExtra/'.$name;
            $data->save();
        }
        $data->save();
        return redirect()->route('indexIndex',['id'=>$id]);
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
        $menu = DB::table('menus')
        ->get();

        $data = DB::table('menus')
        ->where('id',$id)
        ->get();

        return view('menu.edit',compact('menu','data'));
    }

    public function editIndex($id)
    {
        $data = DB::table('extradatas')
        ->join('menus','extradatas.menu_id','=','menus.id')
        ->where('extradatas.input',$id)
        ->get();
        $menu = DB::table('menus')
        ->get();
        return view('menu.editIndex',compact('data','menu'));
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
        $data = \App\menu::where('id',$id)->first();
        $data->nama_menu = $request->input('name');
        $data->nama_input = $request->input('input1');
        $data->nama_inputGambar = $request->input('input2');

        $data->save();

        return redirect()->route('editmenu',['id'=>$id])->with('success','Data Berhasil diperbarui');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = menu::findOrFail($id);
        $data->delete();

        return redirect()->route('menu');
    }

    public function destroyIndex($id)
    {
        $data = DB::table('extradatas')
        ->where('input',$id)
        ->first();

        $hapus = $data->id_extra;

        $data = extradata::findOrFail($hapus);
        $data->delete();

        return redirect()->route('indexIndex',['id'=>$hapus]);
    }

    public function verify(Request $request, $id)
    {
        $id_index = DB::table('extradatas')
        ->where('id_extra',$id)
        ->first();
        $dataid = $id_index->menu_id;

        // dd($id_index);
        switch ($request->input('action')) {
            case 'valid':
                $data = \App\extradata::where('id_extra',$id)->first();
                $data->status = 'valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;

            case 'notvalid':
                $data = \App\extradata::where('id_extra',$id)->first();
                $data->status = 'tidak valid';
                $data->pesan = $request->input('pesan');

                $data->save();
                break;
        }

        return redirect()->route('indexIndex',['id'=>$dataid]);
    }

    public function gambarExtra($id)
    {
        header("Content-Type: image/png");
        $path = DB::table('extradatas')->where('input',$id)->select('gambar')->first();
        $path2 = $path->gambar;
        // dd($path2);
        // $ext = $request->file('Gambar')->getClientOriginalExtension();

        return response()->file(public_path($path2));
    }
}
