@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h1>Criar Documento</h1>

        <form action="{{ route('documento.store') }}" method="POST">
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
                <label for="user_id" class="form-label">Usuário:</label>
                <select name="user_id" class="form-select" required>
                    <option value="">Selecione um usuário</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" class="form-select" required>
                    <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="aprovado" {{ old('status') == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                    <option value="rejeitado" {{ old('status') == 'rejeitado' ? 'selected' : '' }}>Rejeitado</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário (opcional):</label>
                <textarea name="comentario" class="form-control">{{ old('comentario') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="horas_out" class="form-label">Horas Validadas (opcional):</label>
                <input type="number" name="horas_out" class="form-control" step="0.1" min="0"
                    value="{{ old('horas_out') }}">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection
