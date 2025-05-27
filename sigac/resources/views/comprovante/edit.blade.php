<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIGAC</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.navbar')

    <div class="container mt-4">
        <h1>Editar Comprovante: {{ $comprovante->atividade }}</h1>

        <form action="{{ route('comprovante.update', $comprovante->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="atividade" class="form-label">Atividade:</label>
                <input type="text" name="atividade" class="form-control" required value="{{ old('atividade', $comprovante->atividade) }}">
            </div>

            <div class="mb-3">
                <label for="horas" class="form-label">Horas:</label>
                <input type="number" name="horas" class="form-control" required step="0.1" min="0" value="{{ old('horas', $comprovante->horas) }}">
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ (old('categoria_id', $comprovante->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno:</label>
                <select name="aluno_id" class="form-select" required>
                    <option value="">Selecione um aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ (old('aluno_id', $comprovante->aluno_id) == $aluno->id) ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Usuário:</label>
                <select name="user_id" class="form-select" required>
                    <option value="">Selecione um usuário</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ (old('user_id', $comprovante->user_id) == $user->id) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <div class="container mt-5">
        @include('layout.footer')
    </div>
</body>

</html>
