<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Curso;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turma.index')->with(['turmas' => $turmas]);
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('turma.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $ano = $request->ano;
        $curso_id = $request->curso_id;

        $turma = new Turma();
        $turma->ano = $ano;
        $turma->curso_id = $curso_id;

        $turma->save();

        return redirect()->route('turma.index')->with('success', 'Turma criada com sucesso!');
    }

    public function show($id)
    {
        $turma = Turma::findOrFail($id);
        return view('turma.show', compact('turma'));
    }

    public function edit($id)
    {
        $turma = Turma::find($id);
        $cursos = Curso::all();
        return view('turma.edit', compact('turma', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::find($id);
        $turma->update($request->all());
        $turma->save();

        return redirect()->route('turma.index')->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();

        return redirect()->route('turma.index')->with('success', 'Turma deletada com sucesso!');
    }

    public function chart($id)
    {
        $turma = Turma::with('alunos.comprovante')->findOrFail($id);

        $data = [];

        foreach ($turma->alunos as $aluno){
            $horas = $aluno->comprovante->sum('horas');
            $data[] = [$aluno->nome, $horas];
        }

        return view('turma.chart', ['dadosGrafico' => $data, 'turma' => $turma]);
    }
}
