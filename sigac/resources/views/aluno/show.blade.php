@extends('layout.app')
@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h1>{{ $aluno->nome }}</h1>

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

    <div class="d-flex flex-column container mb-3 p-2 border border-tertiary rounded shadow-sm">

        <div class="mx-5 my-2">
            @if ($aluno->user)
                <h4>Usuário Associado: {{ $aluno->user->name }}</h4>
            @else
                <h4>Não há Usuário Associado a este aluno</h4>
            @endif

            <h3>Dados Básicos</h3>
            <p>CPF: {{ $aluno->cpf }}</p>
            <p>Email: {{ $aluno->email }}</p>
            <p>Curso: {{ $aluno->curso->nome }}</p>
            <p>Turma: {{ $aluno->turma->ano }}</p>

            <h3>Horas Complementares</h3>
            <p>Horas Submetidas: {{ $horas_submetidas}}</p>
            <p>Horas Aprovadas: {{ $horas_aprovadas}}</p>
        </div>
    </div>
@endsection
