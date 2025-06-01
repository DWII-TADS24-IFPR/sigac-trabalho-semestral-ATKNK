@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Documentos:</h1>
            <a type="link" class="btn btn-primary m-1 shadow-sm" href="/documento/create">Criar Documento</a>
        </div>

        @foreach ($documentos as $documento)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">
                <div class="d-flex flex-row justify-content-between">
                    <h2>Documento #{{ $documento->id }}</h2>

                    <div>
                        <a href="{{ route('documento.edit', $documento->id) }}"
                            class="btn btn-warning m-1 shadow-sm">Editar</a>

                        <form action="{{ route('documento.destroy', $documento->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Tem certeza que deseja excluir este documento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
                <h5>Descrição: {{ $documento->descricao }}</h5>
                <p>URL: <a href="{{ $documento->url }}" target="_blank">{{ $documento->url }}</a></p>
                <p>Horas Iniciais: {{ $documento->horas_in }}</p>
                <p>Horas Validadas: {{ $documento->horas_out ?? 'Não avaliadas' }}</p>
                <p>Status: {{ ucfirst($documento->status) }}</p>
                <p>Comentário: {{ $documento->comentario ?? 'Nenhum' }}</p>
                <p>Categoria: {{ $documento->categoria->nome ?? 'N/A' }}</p>
                <p>Usuário: {{ $documento->user->name ?? 'N/A' }}</p>


            </div>
        @endforeach

        @if ($documentos->isEmpty())
            <p>Nenhum documento encontrado.</p>
        @endif
    </div>
@endsection
