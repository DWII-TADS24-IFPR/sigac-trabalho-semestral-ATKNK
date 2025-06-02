@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Editando aluno: {{ $aluno->nome }}</h2>

        <div>
            <form action="{{ route('aluno.update', $aluno->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Digite o novo nome:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <h5>CPF: {{ $aluno->cpf }}</h5>
                    <label for="cpf" class="form-label">Digite o novo CPF:</label>
                    <input type="text" name="cpf" class="form-control" required>
                </div>

                <div class="mb-3">
                    <h5>Email: {{ $aluno->email }}</h5>
                    <label for="email" class="form-label">Digite o novo email:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <h5>Curso:</h5>
                    <select name="curso_id" class="form-select" required>
                        <option value="">Selecione o novo curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <h5>Turma:</h5>
                    <select name="turma_id" class="form-select" required>
                        <option value="">Selecione a nova turma</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->curso->sigla }} {{ $turma->ano }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>

        </form>


    </div>

@endsection
