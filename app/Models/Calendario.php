<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'title',
        'start',
        'end',
        'daysOfWeek',
        'startTime',
        'endTime',
        'startRecur',
        'endRecur',
        'color',
        'sub_objetivo_id',
        'objetivo_id'
    ];
    public function usuario() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function objetivos() 
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }
    public function subObjetivos() 
    {
        return $this->belongsTo(SubObjetivo::class, 'sub_objetivo_id');
    }
}
