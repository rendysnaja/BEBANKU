<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutinitas extends Model
{
    use HasFactory;

    protected $table = "rutinitas";

    protected $fillable = [
        'user_id',
        'evaluasidetail_id',
        'rutinitas_nama',
        'rutinitas_status',
        'rutinitas_pelaksana',
        'rutinitas_lamajam',
        'rutinitas_lamamenit',
        'rutinitas_file',
        'status',
    ];

    public function absenrutinitas()
    {
    	return $this->hasMany('App\Absenrutinitas');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function evaluasidetail()
    {
        return $this->belongsTo('App\Evaluasidetail');
    }

    public function fterutinitas() { 
        return $this->hasOne('App\Fterutinitas'); 
    }
}
