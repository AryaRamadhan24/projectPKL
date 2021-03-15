<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bn extends Model
{
    protected $table = 'bns';
    protected $primaryKey = 'no_buku';
    // protected $fillable = ['Tanggal_Menikah','Nama_Ayah','Status','ktp_no'];
    protected $fillable = ['no_buku','user_id','status','pesan'];
    // public function ktp()
    // {
    //     return $this->belongsTo('App\ktp','no_NIK');
    // }
    public function user(){
        return $this -> belongsTo('App\User');
    }
}
