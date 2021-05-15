<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambito extends Model
{
    // Campos de la base de datos a las que se agregarán los valores
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    use HasFactory;
    /** Relacion 1:n  de Ambitos a Usuario*/
    public function usuarios() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function objetivos() 
    {
        return $this->hasMany(Objetivo::class, 'ambito_id');
    }
}
