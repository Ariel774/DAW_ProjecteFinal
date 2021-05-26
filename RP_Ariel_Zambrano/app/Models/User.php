<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /** Relacion 1:n  de Usuario a Ambitos */
    public function ambitos() 
    {
        return $this->hasMany(Ambito::class, 'user_id');
    }
    /** Relacion 1:n  de Usuario a Objetivos*/
    public function objetivos() 
    {
        return $this->hasMany(Objetivo::class, 'user_id');
    }
    /** Relacion 1:n  de Usuario a Calendario*/
    public function calendarios() 
    {
        return $this->hasMany(Calendario::class, 'user_id');
    }
}
