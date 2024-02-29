<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasidetail extends Model
{
    use HasFactory;

    protected $table = "evaluasidetail";

    protected $fillable = [
        'evaluasi_id',
        'tahun_id',
        'user_id',
        'asesor_id',
        'unit_id',
        'status',
    ];

    public function evaluasi()
    {
    	// return $this->belongsTo(Evaluasi::class, 'evaluasi_id');
        return $this->belongsTo('App\Evaluasi');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function asesor()
    {
    	return $this->belongsTo('App\Asesor');
    }

    public function unit()
    {
    	return $this->belongsTo('App\Unit');
    }

    public function rutinitas()
    {
    	return $this->hasMany('App\Rutinitas');
    }

    public function tambahan()
    {
    	return $this->hasMany('App\Tambahan');
    }

    public function izin()
    {
        return $this->hasMany('App\Izin');
    }

    public function fterutinitas()
    {
        return $this->hasMany('App\Fterutinitas');
    }

    public function ftetambahan()
    {
        return $this->hasMany('App\Ftetambahan');
    }

    public function hasilevaluasi()
    {
        return $this->hasOne('App\Hasilevaluasi');
    }

    public function tahun()
    {
        return $this->belongsTo('App\Tahun');
    }
}
