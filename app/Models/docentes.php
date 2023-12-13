<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docentes extends Model
{
    use HasFactory;

    public function cursos()
    {
        return $this->hasMany(cursos::class, 'docente_id');
    }
    
    public function curso()
{
    return $this->hasMany(cursos::class);
}
}
