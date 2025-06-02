@extends('layout.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Eixos:</h1>
            <a type="link" class="btn btn-primary" href="/eixo/create">Criar Eixo</a>
        </div>
        @foreach ($eixos as $eixo)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $eixo->nome }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a type="link" class="btn btn-warning m-1 shadow-sm" href="/eixo/{{ $eixo->id }}/edit">Editar</a>
                        <form action="{{ route('eixo.destroy', $eixo->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir este eixo?')">
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