<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Models\cursos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = alumnos::leftJoin('matriculas', 'alumnos.id', '=', 'matriculas.alumno_id')
        ->leftJoin('cursos', 'matriculas.curso_id', '=', 'cursos.id')
        ->leftJoin('materias', 'cursos.materia_id', '=', 'materias.id')
        ->select('alumnos.*', 'cursos.materia_id', 'materias.materia as nombre_materia')
        ->get();

        return $alumnos;
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
        $alumnos = new alumnos();

        $alumnos->nombre = $request->nombre;
        $alumnos->apellido = $request->apellido;
        $alumnos->dni = $request->dni;
        $alumnos->correo = $request->correo;
        $alumnos->direccion = $request->direccion;
        $alumnos->fecha_nacimiento = $request->fecha_nacimiento;

        $alumnos->save();

        $cursoId = $request->curso_id;

        $curso = cursos::find($cursoId);

        if ($curso) {
            $alumnos->cursos()->attach($curso);

            return "Se agregó al alumno exitosamente al curso con ID: $cursoId";
        } else {
            return "No se encontró el curso con ID: $cursoId";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumnos = alumnos::leftJoin('matriculas', 'alumnos.id', '=', 'matriculas.alumno_id')
        ->leftJoin('cursos', 'matriculas.curso_id', '=', 'cursos.id')
        ->leftJoin('materias', 'cursos.materia_id', '=', 'materias.id')
        ->select('alumnos.*', 'cursos.materia_id', 'materias.materia as nombre_materia')
        ->findOrFail($id);

        return $alumnos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumnos $alumnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alumnos =  alumnos::find($id);

        $alumnos->nombre = $request->nombre;
        $alumnos->apellido = $request->apellido;
        $alumnos->dni = $request->dni;
        $alumnos->correo = $request->correo;
        $alumnos->direccion = $request->direccion;
        $alumnos->fecha_nacimiento = $request->fecha_nacimiento;

        $alumnos->save();

        $cursoId = $request->curso_id;

        $curso = cursos::find($cursoId);

        if ($curso) {
            $alumnos->cursos()->sync($curso);

            return "Se actualizo al alumno exitosamente al curso con ID: $cursoId";
        } 
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = Alumnos::find($id);

        if ($alumno) {
            // Elimina la asociación del alumno con los cursos
            $alumno->cursos()->detach();
    
            // Elimina al alumno
            $alumno->delete();
    
            return "Se eliminó al alumno correctamente.";
        } else {
            return "No se encontró al alumno con ID: $id";
        }
    }
}
