@extends('layout.app')

@section('content')
    <div class="container"> 
        <h2>Editando nível: {{ $nivel->nome }}</h2>

        <form action="{{ route('nivel.update', $nivel->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do nível:</label>
                <input type="text" name="nome" class="form-control" value="{{ $nivel->nome }}" required>

            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection