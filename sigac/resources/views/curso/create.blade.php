@extends('layout.app')

@section('content')

    <div class="container">

        <h1>Criando Curso:</h1>

        <form action="{{ route('curso.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sigla" class="form-label">Sigla:</label>
                <input type="text" name="sigla" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="total_horas" class="form-label">Total de Horas:</label>
                <input type="text" name="total_horas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nivel_id" class="form-label">Nível:</label>
                <select name="nivel_id" class="form-select" required>
                    <option value="">Selecione um nível</option>
                    @foreach ($niveis as $nivel)
                        <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="eixo_id" class="form-label">Eixo:</label>
                <select name="eixo_id" class="form-select" required>
                    <option value="">Selecione um eixo</option>
                    @foreach ($eixos as $eixo)
                        <option value="{{ $eixo->id }}">{{ $eixo->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>

    </div>
@endsection