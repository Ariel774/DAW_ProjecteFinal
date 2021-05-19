<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubObjetivo extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'ambito_id',
        'porcentaje',
        'finalizado',
        'imagen',
        'unidades_actuales',
        'unidades_fin',
        'unidad',
        'slug'
    ];
    use HasFactory;
}
