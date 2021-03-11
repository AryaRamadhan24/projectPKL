<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rt extends Model
{
    protected $table = 'rts';
    protected $primaryKey = 'id_rt';
    protected $fillable = ['nomor_rt','rw_id'];
    public function rw(){
        return $this -> belongsTo('App\rw','rw_id');
    }
}
