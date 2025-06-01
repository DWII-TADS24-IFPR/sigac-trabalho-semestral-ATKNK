@extends('layout.app')

@section('content')
    <div class="container">

        <h1>Criando Turma:</h1>

        <form action="{{ route('turma.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso:</label>
                <select name="curso_id" class="form-select" required>
                    <option value="">Selecione um nível</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano:</label>
                <input type="text" name="ano" class="form-control" required>
            </div>


            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>

    </div>
@endsection