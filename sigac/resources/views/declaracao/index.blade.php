@extends('layout.app')
@section('content')
    <div class="container mt-4">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Declarações:</h1>
            <a href="{{ route('declaracao.create') }}" class="btn btn-primary mb-3">Criar Declaração</a>
        </div>

        @foreach ($declaracoes as $declaracao)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">
                <div class="d-flex flex-row justify-content-between">
                    <h2>Hash: {{ $declaracao->hash }}</h2>
                    <div class="d-flex flex-row align-items-center">
                        <a href="{{ route('declaracao.edit', $declaracao->id) }}"
                            class="btn btn-warning m-1 shadow-sm">Editar</a>

                        <form class="m-0 shadow-sm" action="{{ route('declaracao.destroy', $declaracao->id) }}"
                            method="POST" class="d-inline"
                            onsubmit="return confirm('Tem certeza que deseja excluir esta declaração?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
                <p>Data: {{ $declaracao->data }}</p>
                <p>Aluno: {{ $declaracao->aluno->nome }}</p>
                <p>Comprovante: {{ $declaracao->comprovante->atividade }} - {{ $declaracao->comprovante->horas }} horas
                </p>


            </div>
        @endforeach

        @if ($declaracoes->isEmpty())
            <p>Nenhuma declaração cadastrada.</p>
        @endif
    </div>
@endsection
