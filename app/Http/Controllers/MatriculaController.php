<?php

namespace App\Http\Controllers;

use App\Models\matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::leftJoin('alumnos', 'matriculas.alumno_id', '=', 'alumnos.id')
        ->leftJoin('cursos', 'matriculas.curso_id', '=', 'cursos.id')
        ->leftJoin('materias', 'cursos.materia_id', '=', 'materias.id')
        ->select('matriculas.*', 'alumnos.nombre as nombre_alumno', 'materias.materia as nombre_materia')
        ->get();

    return $matriculas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $matricula = Matricula::find($id);
    
        if (!$matricula) {
            return "No se encontró la matrícula con ID: $id";
        }
    
        $matricula->asistencia = $request->asistencia;
        $matricula->fecha = $request->fecha;
    
        $matricula->save();
    
        return "Se registró la asistencia en la matrícula con ID: $id";
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(matricula $matricula)
    {
        //
    }
}
