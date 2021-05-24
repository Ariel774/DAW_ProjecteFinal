<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubObjetivo extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'unidades_realizar',
        'hora_inicio',
        'hora_fin',
        'dia_id',
        'objetivo_id',
    ];
    use HasFactory;
    public function objetivo() 
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }
}
