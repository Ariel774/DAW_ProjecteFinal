<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'subtitulo',
        'unidades_hechas',
        'unidades_realizar',
        'fecha_inicio',
        'fecha_fin',
        'fecha_tarea',
        'hora_inicio',
        'hora_fin',
        'objetivo_id',
        'sub_objetivo_id',
    ];
    public function objetivo() 
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }
    public function subobjetivo() 
    {
        return $this->belongsTo(SubObjetivo::class, 'sub_objetivo_id');
    }
}
