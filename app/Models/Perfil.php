<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    /** Relacion 1:n  de Usaurios a perfil*/
    public function usuario() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
