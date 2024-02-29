<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absenrutinitas extends Model
{
    protected $table = "absenrutinitas";

    protected $fillable = [
        'rutinitas_id',
        'absenrutinitas_tanggal',
        'absenrutinitas_deskripsi',
        'absenrutinitas_lamajam',
        'absenrutinitas_lamamenit',
        'absenrutinitas_file',
    ];
 
    public function rutinitas()
    {
    	return $this->belongsTo('App\Rutinitas');
    }
}
