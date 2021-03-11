<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kk extends Model
{
    protected $table = 'kks';
    protected $primaryKey = 'no_kk';
    protected $fillable = ['nama_kepala','Alamat','RW','RT','Desa','Kecamatan','Kabupaten','Kode_pos','user_id'];
    public function user(){
        return $this -> belongsTo('App\User');
    }
    public function ktp()
    {
        return $this-> hasMany('App\ktp');
    }
}
