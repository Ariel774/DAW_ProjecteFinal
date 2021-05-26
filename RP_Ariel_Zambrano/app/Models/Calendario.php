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
        'color'
    ];
    public function usuario() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
