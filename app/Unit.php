<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = "unit";

    protected $fillable = [
        'unit_nama',
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function evaluasidetail()
    {
        return $this->hasMany('App\Evaluasidetail');
    }
    
}
