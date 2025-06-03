<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\Aluno;
use App\Models\Documento;

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
        $alunos = Aluno::where('turma_id', $id)->get();
        $turma = Turma::findOrFail($id);

        $dados = [];

        foreach ($alunos as $aluno){
            $documentos = Documento::where('user_id', $aluno->user_id)->get();
            $horas_aprovadas = $documentos->where('status', 'aprovado')->sum('horas_out');

            $dados[] = [$aluno->nome, $horas_aprovadas];
        }

        return view('turma.show', compact('turma', 'alunos', 'dados'));
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
}
