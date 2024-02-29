<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = "izin";

    protected $fillable = [
        'user_id',
        'evaluasidetail_id',
        'izin_deskripsi',
        'izin_jenis',
        'izin_tanggal',
        'izin_lamahari',
        'izin_file',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function evaluasidetail()
    {
    	return $this->belongsTo('App\Evaluasidetail');
    }
}
