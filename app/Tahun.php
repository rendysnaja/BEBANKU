<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $table = "tahun";

    protected $fillable = [
        'tahun_nama',
        'tahun_jumlahhari',
        'tahun_kelonggaran',
    ];

    public function evaluasi()
    {
        return $this->hasMany('App\Evaluasi');
    }

    public function evaluasidetail()
    {
        return $this->hasMany('App\Evaluasidetail');
    }

    public function haslevaluasi()
    {
        return $this->hasMany('App\Hasilevaluasi');
    }
}
