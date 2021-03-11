<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    protected $table = 'rws';
    protected $primaryKey = 'id_rw';
    protected $fillable = ['nomor_rw','dusun_id'];
    public function dusun(){
        return $this -> belongsTo('App\dusun');
    }
    public function rt()
    {
        return $this-> hasMany('App\rt');
    }
}
