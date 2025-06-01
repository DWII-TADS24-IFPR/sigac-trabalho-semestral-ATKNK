@extends('layout.app')

@section('content')
    <div class="container mt-4">


        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Categorias:</h1>
            <a type="link" class="btn btn-primary m-1 shadow-sm" href="/categoria/create">Criar Categoria</a>
        </div>

        @foreach ($categorias as $categoria)
            <div class="container mb-3 p-2 border border-tertiary rounded shadow-sm">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $categoria->nome }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a type="link" class="btn btn-warning m-1" href="/categoria/{{ $categoria->id }}/edit">Editar</a>
                        <form class="m-0 action="{{ route('categoria.destroy', $categoria->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir esta categoria?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>

                </div>

                <p>Máximo de Horas: {{ $categoria->maximo_horas }}</p>


            </div>
        @endforeach
    </div>
@endsection
