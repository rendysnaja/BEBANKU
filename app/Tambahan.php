<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambahan extends Model
{
    use HasFactory;
    
    protected $table = "tambahan";

    protected $fillable = [
        'user_id',
        'evaluasidetail_id',
        'tambahan_nama',
        'tambahan_status',
        'tambahan_pelaksana',
        'tambahan_lamajam',
        'tambahan_lamamenit',
        'tambahan_file',
        'status',
    ];

    public function absentambahan()
    {
        return $this->hasMany('App\Absentambahan');
    }

    public function evaluasidetail()
    {
        return $this->belongsTo('App\Evaluasidetail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ftetambahan()
    { 
        return $this->hasOne('App\Ftetambahan'); 
    }
}
