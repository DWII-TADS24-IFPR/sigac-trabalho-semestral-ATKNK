@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h1>Criando Declaração:</h1>

        <form action="{{ route('declaracao.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="hash" class="form-label">Hash:</label>
                <input type="text" name="hash" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno:</label>
                <select name="aluno_id" class="form-select" required>
                    <option value="">Selecione um aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="comprovante_id" class="form-label">Comprovante:</label>
                <select name="comprovante_id" class="form-select" required>
                    <option value="">Selecione um comprovante</option>
                    @foreach ($comprovantes as $comprovante)
                        <option value="{{ $comprovante->id }}">
                            {{ $comprovante->atividade }} - {{ $comprovante->horas }} horas
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection