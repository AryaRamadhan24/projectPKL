<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ktp extends Model
{
    protected $table = 'ktp';
    protected $primaryKey = 'id';
    protected $fillable = ['nik','nama','Tempat_Lahir','Tanggal_Lahir','Jenis_Kelamin','Alamat','agama','status','pekerjaan','kewarganegaraan','masa_berlaku','gambar'];
}
