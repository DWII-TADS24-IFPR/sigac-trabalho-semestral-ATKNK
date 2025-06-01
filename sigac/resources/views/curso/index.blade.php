@extends('layout.app')

@section('content')
    <div class="container mt-1">

        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Cursos:</h1>
            <a type="link" class="btn btn-primary" href="/curso/create">Criar Curso</a>
        </div>

        @foreach ($cursos as $curso)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $curso->nome }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a type="link" class="btn btn-warning m-1 shadow-sm"
                            href="/curso/{{ $curso->id }}/edit">Editar</a>
                        <form class="m-0 shadow-sm"action="{{ route('curso.destroy', $curso->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir este curso?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>

                <div class="mx-5">
                    <p>Sigla: {{ $curso->sigla }}</p>
                    <p>Total de Horas: {{ $curso->total_horas }}</p>
                    <p>Nível: {{ $curso->nivel->nome ?? 'Nível não definido' }}</p>
                </div>

            </div>
        @endforeach
    </div>
    @endsection
