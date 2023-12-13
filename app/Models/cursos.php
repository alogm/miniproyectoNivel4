<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;

    
    protected $fillable = ['docente_id', 'materia_id'];

    
    public function cursos()
    {
        return $this->hasMany(cursos::class);
    }

    public function materias()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }
    
    public function alumno()
{
    return $this->belongsTo(alumnos::class);
}

public function materia()
{
    return $this->belongsTo(materias::class);
}

public function docente()
{
    return $this->belongsTo(docentes::class);
}
}
