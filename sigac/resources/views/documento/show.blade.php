@extends('layout.app')
@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h1>Documento #{{ $documento->id }}</h1>
    </div>
    <div class="d-flex flex-column container mb-3 p-2 border border-tertiary rounded shadow-sm">
        <h5>Descrição: {{ $documento->descricao }}</h5>
        <p>URL: <a href="{{ $documento->url }}" target="_blank">{{ $documento->url }}</a></p>
        <p>Horas Iniciais: {{ $documento->horas_in }}</p>
        <p>Horas Validadas: {{ $documento->horas_out ?? 'Não avaliadas' }}</p>
        <p>Status: {{ ucfirst($documento->status) }}</p>
        <p>Comentário: {{ $documento->comentario ?? 'Nenhum' }}</p>
        <p>Categoria: {{ $documento->categoria->nome ?? 'N/A' }}</p>
        <p>Usuário: {{ $documento->user->name ?? 'N/A' }}</p>
    </div>
    <form action="{{ route('documento.aprovar', $documento->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success">Aprovar</button>
    </form>

    <form action="{{ route('documento.rejeitar', $documento->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-danger">Rejeitar</button>
    </form>
@endsection
