<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = docentes::leftJoin('cursos', 'docentes.id', '=', 'cursos.docente_id')
        ->leftJoin('materias', 'cursos.materia_id', '=', 'materias.id')
        ->select('docentes.*', 'cursos.materia_id', 'materias.materia as nombre_materia')
        ->get();

    return $docentes;
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
        $docentes = new docentes();

        $docentes->nombre = $request->nombre;
        $docentes->apellido = $request->apellido;
        $docentes->correo = $request->correo;
        $docentes->direccion = $request->direccion;
        $docentes->fecha_nacimiento = $request->fecha_nacimiento;

        $docentes->save();

        if ($request->has('materia_id')) {
            $curso = new cursos();
            $curso->docente_id = $docentes->id;
            $curso->materia_id = $request->materia_id;
            $curso->save();
        }
        return "se agrego al Docente exitosamente";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docentes = docentes::leftJoin('cursos', 'docentes.id', '=', 'cursos.docente_id')
        ->leftJoin('materias', 'cursos.materia_id', '=', 'materias.id')
        ->select('docentes.*', 'cursos.materia_id', 'materias.materia as nombre_materia')
        ->findOrFail($id);

    return $docentes;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(docentes $docentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
    $docente = docentes::findOrFail($id);

  
    $docente->nombre = $request->nombre;
    $docente->apellido = $request->apellido;
    $docente->correo = $request->correo;
    $docente->direccion = $request->direccion;
    $docente->fecha_nacimiento = $request->fecha_nacimiento;

  
    $docente->save();

  
    if ($request->has('materia_id')) {
       
        $curso = cursos::updateOrCreate(
            ['docente_id' => $docente->id],
            ['materia_id' => $request->materia_id]
        );
    }

    return "Se editó al Docente exitosamente";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $maestro = docentes::find($id);

        $maestro->cursos()->delete();

        $maestro->delete();

        return "se elimino al maestro";
    }
}
