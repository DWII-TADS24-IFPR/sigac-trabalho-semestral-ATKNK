<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Curso;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index')->with(['categorias' => $categorias]);
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('categoria.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        $maximo_horas = $request->maximo_horas;
        $curso_id = $request->curso_id;

        $categoria = new Categoria();
        $categoria->nome = $nome;
        $categoria->maximo_horas = $maximo_horas;
        $categoria->curso_id = $curso_id;

        $categoria->save();

        return redirect()->route('categoria.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        $cursos = Curso::all();
        return view('categoria.edit', compact('categoria', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        $categoria->save();

        return redirect()->route('categoria.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoria deletado com sucesso!');
    }
}
