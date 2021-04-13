<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class extradata extends Model
{
    protected $table = 'extradatas';
    protected $primaryKey = 'id_extra';
    protected $fillable = ['nama_menu','input','user_id','status','pesan','menu_id'];
    public function user(){
        return $this -> belongsTo('App\User');
    }
    public function menu(){
        return $this -> belongsTo('App\menu');
    }
}
