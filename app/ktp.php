<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ktp extends Model
{
    protected $table = 'ktps';
    protected $primaryKey = 'NIK';
    protected $fillable = ['NIK','user_id','status','pesan'];

    public function user(){
        return $this -> belongsTo('App\User');
    }
}
