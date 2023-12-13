<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;

    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'matriculas', 'alumno_id', 'curso_id')
        ->withTimestamps();
    }

    public function materias()
{
    return $this->belongsTo(materias::class, 'materia_id');
}

public function curso()
{
    return $this->hasMany(cursos::class);
}
}
