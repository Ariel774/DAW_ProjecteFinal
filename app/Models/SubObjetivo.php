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
        'dias',
        'objetivo_id',
    ];
    use HasFactory;
    public function objetivo() 
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }
    public function calendarios() 
    {
        return $this->hasMany(Calendario::class, 'sub_objetivo_id');
    }
}
