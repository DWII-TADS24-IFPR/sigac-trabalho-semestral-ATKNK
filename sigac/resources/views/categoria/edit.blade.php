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
        <h2>Editando Categoria: {{ $categoria->nome }}</h2>

        <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <p>Nome atual: {{ $categoria->nome }}</p>
                <label for="nome" class="form-label">Digite o novo nome:</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $categoria->nome) }}" required>
            </div>

            <div class="mb-3">
                <p>Máximo de horas atual: {{ $categoria->maximo_horas }}</p>
                <label for="maximo_horas" class="form-label">Digite o novo máximo de horas:</label>
                <input type="number" name="maximo_horas" class="form-control" value="{{ old('maximo_horas', $categoria->maximo_horas) }}" required>
            </div>

            <div class="mb-3">
                <p>Curso atual: {{ $categoria->curso->nome ?? 'Nenhum curso' }}</p>
                <label for="curso_id" class="form-label">Selecione o novo curso:</label>
                <select name="curso_id" class="form-select" required>
                    <option value="">Selecione um curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" @if(old('curso_id', $categoria->curso_id) == $curso->id) selected @endif>
                            {{ $curso->nome }}
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
