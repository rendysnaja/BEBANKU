<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fterutinitas extends Model
{
    use HasFactory;

    protected $table = "fterutinitas";

    protected $fillable = [
        'rutinitas_id',
        'evaluasidetail_id',
        'fterutinitas_nilai',
        'fterutinitas_kategori',
        'asesorrutinitas_nilai',
        'asesorrutinitas_kategori',
        'asesorrutinitas_komentar',
        'asesorrutinitas_status',
    ];

    public function rutinitas()
    {
    	return $this->belongsTo('App\Rutinitas');
    }

    public function evaluasidetail()
    {
    	return $this->belongsTo('App\Evaluasidetail');
    }
}
