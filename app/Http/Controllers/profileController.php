<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\User;
use App\desa;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id_user;
        $userData = DB::table('users')
        ->where('id_user', '=', $user)
        ->select('id_user','name','email','password','Tempat_Lahir','Tanggal_Lahir','Alamat','No_Telp')
        ->get();

        $menu = DB::table('menus')
        ->get();

        return view('profile.edit',compact('userData','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        // $validatedData = $request->validate([
        //     'password' => 'required|min:8',
        // ]);
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

        $dataUser = \App\User::where('id_user',$id)->first();
        $dataUser->name = $request->input('name');
        $dataUser->email = $request->input('email');
        $dataUser->Tempat_Lahir = $request->input('Tempat_Lahir');
        $dataUser->Tanggal_Lahir = $request->input('Tanggal_Lahir');
        $dataUser->Alamat = $request->input('Alamat');
        $dataUser->No_Telp = $request->input('No_Telp');
        $dataUser->password = bcrypt($request->input('password'));
        $dataUser->save();

        return redirect()->route('editprofile',['data' => $request])->with('success','Data Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function desa($id)
    {
        echo json_encode(DB::table('desas')->where('kecamatan_id',$id)->get());
    }
}
