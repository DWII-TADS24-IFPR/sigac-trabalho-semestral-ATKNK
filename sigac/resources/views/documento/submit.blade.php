@extends('layout.appaluno')
@section('content')
    <div class="container mt-4">
        <h1>Criar Documento</h1>

        <form action="{{ route('documento.send') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="url" class="form-label">URL:</label>
                <input type="url" name="url" class="form-control" value="{{ old('url') }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" name="descricao" class="form-control" value="{{ old('descricao') }}" required>
            </div>

            <div class="mb-3">
                <label for="horas_in" class="form-label">Horas Inseridas:</label>
                <input type="number" name="horas_in" class="form-control" step="0.1" min="0"
                    value="{{ old('horas_in') }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário (opcional):</label>
                <textarea name="comentario" class="form-control">{{ old('comentario') }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Submeter</button>
        </form>
    </div>
@endsection
