<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambito extends Model
{
    use HasFactory;
    /** Relacion 1:n  de Ambitos a Usuario*/
    public function usuarios() 
    {
        return $this->belongsTo(User::class);
    }
}
