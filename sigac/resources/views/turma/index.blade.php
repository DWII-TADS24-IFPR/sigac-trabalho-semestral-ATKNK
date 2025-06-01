@extends('layout.app')

@section('content')
    <div class="container mt-1">

        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Turmas:</h1>
            <a class="btn btn-primary m-1 shadow-sm" href="/turma/create">Criar Turma</a>
        </div>

        @foreach ($turmas as $turma)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $turma->curso->sigla ?? 'Curso não definido' }} - {{ $turma->ano }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a class="btn btn-warning m-1 shadow-sm" href="/turma/{{ $turma->id }}/edit">Editar</a>
                        <form class="m-0 shadow-sm" action="{{ route('turma.destroy', $turma->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir esta turma?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

@endsection
