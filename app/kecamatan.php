<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table = 'kecamatans';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = ['nama_kecamatan'];
    public function desa(){
        return $this -> hasMany('App\desa');
    }
}
