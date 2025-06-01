@extends('layout.app')

@section('content')
    <div class="container mt-1">

        <h1>Criando Categoria:</h1>

        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="maximo_horas" class="form-label">Máximo de Horas:</label>
                <input type="text" name="maximo_horas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso:</label>
                <select name="curso_id" class="form-select" required>
                    <option value="">Selecione um curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>

    </div>
@endsection
