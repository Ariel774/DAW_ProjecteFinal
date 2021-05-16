<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    // Campos de la base de datos a las que se agregarán los valores
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'ambito_id',
        'porcentaje',
        'finalizado'
    ];
    use HasFactory;
    /** Relacion 1:n  de Ambitos a Objetivo*/
    public function ambitos() 
    {
        return $this->belongsTo(Ambito::class, 'ambito_id');
    }
    /** Relacion 1:n  de Ambitos a Objetivo*/
    public function usuario() 
    {
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    }
}
