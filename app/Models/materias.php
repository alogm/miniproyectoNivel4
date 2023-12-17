<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    use HasFactory;

    public function cursos()
{
    return $this->hasMany(cursos::class, 'materia_id');
}
    public function curso()
{
    return $this->hasMany(cursos::class, 'materia_id');
}

}
