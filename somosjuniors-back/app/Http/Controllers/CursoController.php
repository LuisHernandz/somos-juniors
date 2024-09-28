<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        $cursos = Curso::orderby('id', 'desc')->paginate(10);

        return view('cursos.index', compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }

    public function store(StoreCurso $request){ // Cambiamos el objeto
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }

    public function show($id){
        $curso = Curso::find($id);

        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){
        return view('cursos.update', compact('curso'));
    }

    public function update(Request $request, Curso $curso){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->save();
        return redirect()->route('cursos.show', $curso);
    }

    public function destroy(Curso $curso){
        $curso->delete();
        return redirect()->route('cursos.index');
    }

}
