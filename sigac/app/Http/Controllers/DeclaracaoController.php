<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::all();
        return view('declaracao.index', compact('declaracoes'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();

        return view('declaracao.create', compact('alunos', 'comprovantes'));
    }

    public function store(Request $request)
    {
        $declaracao = new Declaracao();

        $declaracao->hash = $request->hash;
        $declaracao->data = $request->data;
        $declaracao->aluno_id = $request->aluno_id;
        $declaracao->comprovante_id = $request->comprovante_id;

        $declaracao->save();

        return redirect()->route('declaracao.index')->with('success', 'Declaração criada com sucesso!');
    }

    public function show(Declaracao $declaracao)
    {
        return view('declaracao.show', compact('declaracao'));
    }

    public function edit(Declaracao $declaracao)
    {
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();

        return view('declaracao.edit', compact('declaracao', 'alunos', 'comprovantes'));
    }

    public function update(Request $request, $id)
    {
        $declaracao = Declaracao::find($id);
        $declaracao->update($request->all());
        $declaracao->save();

        return redirect()->route('declaracao.index')->with('success', 'Declaração atualizada com sucesso!');
    }

    public function destroy(Declaracao $declaracao)
    {
        $declaracao->delete();

        return redirect()->route('declaracao.index')->with('success', 'Declaração deletada com sucesso!');
    }
}
