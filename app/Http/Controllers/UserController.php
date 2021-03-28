<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\kecamatan;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexadmin()
    {
        // $user = auth()->user()->id;
        $userData = DB::table('users')
        ->join('desas','users.desa_id','=','desas.id_desa')
        ->where('users.level', '=', 'admin')
        ->select('users.id_user','users.name','users.email','users.Tempat_Lahir','users.Tanggal_Lahir','users.Alamat','users.No_Telp','desas.nama_desa')
        ->get();

        return view('user.indexadmin', compact('userData'));
    }

    public function indexpetugas()
    {
        // $user = auth()->user()->id;
        $userData = DB::table('users')
        ->join('desas','users.desa_id','=','desas.id_desa')
        ->where('users.level', '=', 'petugas')
        ->select('users.id_user','users.name','users.email','users.Tempat_Lahir','users.Tanggal_Lahir','users.Alamat','users.No_Telp','desas.nama_desa')
        ->get();

        return view('user.indexpetugas',compact('userData'));
    }

    public function indexuser()
    {
        // $user = auth()->user()->id;
        $userData = DB::table('users')
        ->join('desas','users.desa_id','=','desas.id_desa')
        ->where('users.level', '=', 'user')
        ->select('users.id_user','users.name','users.email','users.Tempat_Lahir','users.Tanggal_Lahir','users.Alamat','users.No_Telp','desas.nama_desa')
        ->get();

        return view('user.indexuser',compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kecamatan=kecamatan::pluck('nama_kecamatan','id_kecamatan');

        return view('user.createuser',['kecamatan' => $kecamatan]);
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
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8'
        ],
        [
           'password.min'=> 'Password Minimal 8 Karakter', // custom message
           'password_confirmation.min'=> 'Password Minimal 8 Karakter', // custom message
           'password_confirmation.same'=> 'Password tidak sesuai', // custom message
        ])->validate();

        if($request->input('password')!=$request->input('password_confirmation')){
            return redirect()->back()->with('alert','Password Tidak Sesuai');
        }

        $data=new \App\User;
        $data->name = $request->input('name');
        $data->email= $request->input('email');
        $data->level= $request->input('level');
        $data->desa_id= $request->input('desa');
        $data->password = Hash::make($request->input('password'));
        $data->save();

        return redirect()->route('createuser',['data' => $request])->with('success','Akun Berhasil Dibuat');
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
        $kecamatan=kecamatan::pluck('nama_kecamatan','id_kecamatan');

        $userData = DB::table('users')
        ->where('id_user', '=', $id)
        ->select('id_user','name','email','Tempat_Lahir','Tanggal_Lahir','desa_id','Alamat','No_Telp')
        ->get();

        return view ('user.edituser',['kecamatan' => $kecamatan], compact('userData'));
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

        $dataUser = \App\User::where('id_user',$id)->first();
        $dataUser->name = $request->input('name');
        $dataUser->email = $request->input('email');
        $dataUser->Tempat_Lahir = $request->input('Tempat_Lahir');
        $dataUser->Tanggal_Lahir = $request->input('Tanggal_Lahir');
        $dataUser->desa_id = $request->input('desa');
        $dataUser->Alamat = $request->input('Alamat');
        $dataUser->No_Telp = $request->input('No_Telp');
        // $dataUser->password = bcrypt($request->input('password'));
        $dataUser->save();

        return redirect()->route('edituser',['id_user'=>$id])->with('success','Data Berhasil diperbarui');
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
            $data = User::findOrFail($id);
            $data->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with('alert','User Tidak Dapat Di Hapus Karena Masih Terdapat Arsip Pada User Tersebut');
        }

        return redirect()->back();
    }
}
