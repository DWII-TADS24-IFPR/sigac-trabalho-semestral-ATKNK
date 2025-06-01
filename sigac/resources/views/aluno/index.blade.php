@extends('layout.app')

@section('content')

    <div class="container mt-1">

        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Alunos:</h1>
            <a type="link" class="btn btn-primary m-1 shadow-sm" href="/aluno/create">Criar Aluno</a>
        </div>

        @foreach ($alunos as $aluno)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $aluno->nome }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a type="link" class="btn btn-warning m-1 shadow-sm" href="/aluno/{{ $aluno->id }}/edit">Editar</a>
                        <form class="m-0 shadow-sm" action="{{ route('aluno.destroy', $aluno->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir este aluno?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>

                </div>

                <div class="mx-5">
                    <p>CPF: {{ $aluno->cpf }}</p>
                    <p>Email: {{ $aluno->email }}</p>
                    <p>Curso: {{ $aluno->curso->nome }}</p>
                    <p>Turma: {{ $aluno->turma->ano }}</p>
                </div>

            </div>
        @endforeach
    </div>
@endsection
