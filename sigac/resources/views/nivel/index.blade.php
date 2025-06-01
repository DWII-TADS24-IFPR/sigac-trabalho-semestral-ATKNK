@extends('layout.app')

@section('content')
    <div class="container mt-1">

        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Níveis:</h1>
            <a class="btn btn-primary m-1 shadow-sm" href="/nivel/create">Criar Nível</a>
        </div>

        @foreach ($niveis as $nivel)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $nivel->nome }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a class="btn btn-warning m-1 shadow-sm" href="/nivel/{{ $nivel->id }}/edit">Editar</a>
                        <form class="m-0 shadow-sm" action="{{ route('nivel.destroy', $nivel->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir este nível?')">
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
