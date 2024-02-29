<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasilevaluasi extends Model
{
    use HasFactory;

    protected $table = "hasilevaluasi";

    protected $fillable = [
        'user_id',
        'evaluasidetail_id',
        'tahun_id',
        'totalkegiatan',
        'rutinitasditerima',
        'tambahanditerima',
        'rutinitasditolak',
        'tambahanditolak',
        'totalditerima',
        'totalditolak',
        'fterutinitaskurang',
        'fterutinitasnormal',
        'fterutinitasberlebihan',
        'ftetambahankurang',
        'ftetambahannormal',
        'ftetambahanberlebihan',
        'fteberlebihan',
        'ftenormal',
        'ftekurang',
        'sumfterutinitas',
        'sumftetambahan',
        'sumftetotal',
        'asesorrutinitaskurang',
        'asesorrutinitasnormal',
        'asesorrutinitasberlebihan',
        'asesortambahankurang',
        'asesortambahannormal',
        'asesortambahanberlebihan',
        'asesorberlebihan',
        'asesornormal',
        'asesorkurang',
        'sumasesorrutinitas',
        'sumasesortambahan',
        'sumasesortotal',
    ];

    public function evaluasidetail()
    {
        return $this->belongsTo('App\Evaluasidetail');
    }

    public function tahun()
    {
        return $this->belongsTo('App\Tahun');
    }
}
