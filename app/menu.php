<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_menu','nama_input'];
    public function extradata()
    {
        return $this-> hasMany('App\extradata');
    }
}
