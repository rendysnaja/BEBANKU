<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absentambahan extends Model
{
    protected $table = "absentambahan";

    protected $fillable = [
        'tambahan_id',
        'absentambahan_tanggal',
        'absentambahan_deskripsi',
        'absentambahan_lamajam',
        'absentambahan_lamamenit',
        'absentambahan_file',
    ];
 
    public function tambahan()
    {
    	return $this->belongsTo('App\Tambahan');
    }
}
