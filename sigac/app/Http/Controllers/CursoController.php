<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Eixo;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index')->with(['cursos' => $cursos]);
    }

    public function create()
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        return view('curso.create', compact('niveis', 'eixos'));
    }

    public function store(Request $request){
        $nome = $request->nome;
        $sigla = $request->sigla;
        $total_horas = $request->total_horas;
        $nivel_id = $request->nivel_id;
        $eixo_id = $request->eixo_id;

        $curso = new Curso();
        $curso->nome = $nome;
        $curso->sigla = $sigla;
        $curso->total_horas = $total_horas;
        $curso->nivel_id = $nivel_id;
        $curso->eixo_id = $eixo_id;

        $curso->save();

        return redirect()->route('curso.index')->with('success', 'Curso criado com sucesso!');
    }

    public function edit($id){
        $curso = Curso::find($id);
        return view('curso.edit', compact('curso'));
    }

    public function update(Request $request, $id){
        $curso = Curso::find($id);
        $curso->update($request->all());
        $curso->save();

        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso!');
    }

        public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('curso.index')->with('success', 'Curso deletado com sucesso!');
    }
}