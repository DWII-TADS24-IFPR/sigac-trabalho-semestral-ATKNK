<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use App\Models\User;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::all();
        return view('comprovante.index', compact('comprovantes'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        $users = User::all();

        return view('comprovante.create', compact('categorias', 'alunos', 'users'));
    }

    public function store(Request $request)
    {
        $comprovante = new Comprovante();

        $comprovante->horas = $request->horas;
        $comprovante->atividade = $request->atividade;
        $comprovante->categoria_id = $request->categoria_id;
        $comprovante->aluno_id = $request->aluno_id;
        $comprovante->user_id = $request->user_id;

        $comprovante->save();

        return redirect()->route('comprovante.index')->with('success', 'Comprovante criado com sucesso!');
    }

    public function show(Comprovante $comprovante)
    {
        return view('comprovante.show', compact('comprovante'));
    }

    public function edit(Comprovante $comprovante)
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        $users = User::all();

        return view('comprovante.edit', compact('comprovante', 'categorias', 'alunos', 'users'));
    }

    public function update(Request $request, $id)
    {
        $comprovante = Comprovante::find($id);
        $comprovante->update($request->all());
        $comprovante->save();

        return redirect()->route('comprovante.index')->with('success', 'Comprovante atualizado com sucesso!');
    }

    public function destroy(Comprovante $comprovante)
    {
        $comprovante->delete();

        return redirect()->route('comprovante.index')->with('success', 'Comprovante deletado com sucesso!');
    }
}
