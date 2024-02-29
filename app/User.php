<?php

namespace App;

use App\Role;
use App\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'username', 
        'password', 
        'email', 
        'jabatan',
        'role_id',
        'unit_id',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id', 'id');
    }

    public function evaluasi()
    {
    	return $this->belongsToMany('App\Evaluasi');
    }

    public function asesor() 
    { 
        return $this->hasOne('App\Asesor'); 
    }

    public function evaluasidetail()
    {
        return $this->hasMany(Evaluasidetail::class, 'user_id');
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
}
