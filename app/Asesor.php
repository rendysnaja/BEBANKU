<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    protected $table = 'asesor';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
    ];

    public function evaluasidetail()
    {
        return $this->hasMany('App\Evaluasidetail');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
