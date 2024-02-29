<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftetambahan extends Model
{
    use HasFactory;

    protected $table = "ftetambahan";

    protected $fillable = [
        'tambahan_id',
        'evaluasidetail_id',
        'ftetambahan_nilai',
        'ftetambahan_kategori',
        'asesortambahan_nilai',
        'asesortambahan_kategori',
        'asesortambahan_komentar',
        'asesortambahan_status',
    ];

    public function tambahan()
    {
    	return $this->belongsTo('App\Tambahan');
    }

    public function evaluasidetail()
    {
    	return $this->belongsTo('App\Evaluasidetail');
    }
}
