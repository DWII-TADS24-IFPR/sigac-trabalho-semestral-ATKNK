@extends('layout.app')

@section('content')
    <div class="container"> 
        <h2>Editando Eixo: {{ $eixo->nome }}</h2>

        <form action="{{ route('eixo.update', $eixo->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do eixo:</label>
                <input type="text" name="nome" class="form-control" value="{{ $eixo->nome }}" required>

            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection