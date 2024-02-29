<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = "evaluasi";

    protected $fillable = [
        'tahun_id',
        'evaluasi_periode',
        'evaluasi_mulai',
        'evaluasi_berakhir',
    ];

    public function user()
    {
    	return $this->belongsToMany(User::class, 'user_id');
    }

    public function evaluasidetail()
    {
        // return $this->hasMany(Evaluasidetail::class, 'id');
        return $this->hasMany('App\Evaluasidetail');
    }

    public function tahun()
    {
    	return $this->belongsTo('App\Tahun');
    }
}
