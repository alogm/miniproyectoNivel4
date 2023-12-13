<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;

    
    protected $fillable = ['docente_id', 'materia_id'];

    // Relación con el modelo Docente
    public function cursos()
    {
        return $this->hasMany(cursos::class);
    }
    
}
