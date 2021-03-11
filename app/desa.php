<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    protected $table = 'desas';
    protected $primaryKey = 'id_desa';
    protected $fillable = ['nama_desa','kecamatan_id'];
    public function kecamatan(){
        return $this -> belongsTo('App\kecamatan');
    }
    public function user()
    {
        return $this-> hasMany('App\User');
    }
}
