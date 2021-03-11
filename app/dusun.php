<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dusun extends Model
{
    protected $table = 'dusuns';
    protected $primaryKey = 'id_dusun';
    protected $fillable = ['nama_dusun','desa_id'];
    public function desa(){
        return $this -> belongsTo('App\desa');
    }
    public function rw()
    {
        return $this-> hasMany('App\rw');
    }
}
