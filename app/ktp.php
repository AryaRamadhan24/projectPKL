<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ktp extends Model
{
    protected $table = 'ktps';
    protected $primaryKey = 'NIK';
    protected $fillable = ['NIK','user_id','status','pesan'];
    // protected $fillable = ['nama','Tempat_Lahir','Tanggal_Lahir','Golongan_Darah','Jenis_Kelamin','agama','status','pekerjaan','kewarganegaraan','masa_berlaku','kk_no'];
    // public function kk(){
    //     return $this -> belongsTo('App\kk',);
    // }
    // public function bn()
    // {
    //     return $this-> hasMany('App\bn');
    // }
    public function user(){
        return $this -> belongsTo('App\User');
    }
}
