@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h2>Editando Declaração: {{ $declaracao->hash }}</h2>

        <form action="{{ route('declaracao.update', $declaracao->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <p>Hash: {{ $declaracao->hash }}</p>
                <label for="hash" class="form-label">Digite o novo hash:</label>
                <input type="text" name="hash" class="form-control" value="{{ old('hash', $declaracao->hash) }}" required>
            </div>

            <div class="mb-3">
                <p>Data: {{ $declaracao->data }}</p>
                <label for="data" class="form-label">Digite a nova data:</label>
                <input type="date" name="data" class="form-control" value="{{ old('data', $declaracao->data) }}"
                    required>
            </div>

            <div class="mb-3">
                <p>Aluno atual: {{ $declaracao->aluno->nome }}</p>
                <label for="aluno_id" class="form-label">Selecione o novo aluno:</label>
                <select name="aluno_id" class="form-select" required>
                    <option value="">Selecione um aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" @if (old('aluno_id', $declaracao->aluno_id) == $aluno->id) selected @endif>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <p>Comprovante atual: {{ $declaracao->comprovante->atividade }} - {{ $declaracao->comprovante->horas }}
                    horas</p>
                <label for="comprovante_id" class="form-label">Selecione o novo comprovante:</label>
                <select name="comprovante_id" class="form-select" required>
                    <option value="">Selecione um comprovante</option>
                    @foreach ($comprovantes as $comprovante)
                        <option value="{{ $comprovante->id }}" @if (old('comprovante_id', $declaracao->comprovante_id) == $comprovante->id) selected @endif>
                            {{ $comprovante->atividade }} - {{ $comprovante->horas }} horas
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
