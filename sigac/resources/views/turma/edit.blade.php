<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGAC</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.navbar')

    <div class="container">
        <h2>Editando turma: {{ $turma->nome }}</h2>

        <form action="{{ route('turma.update', $turma->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="ano" class="form-label">Ano da turma:</label>
                <input type="text" name="ano" class="form-control" value="{{ $turma->ano }}" required>

            </div>
            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso:</label>
                <select name="curso_id" class="form-select" required>
                    <option value="">Selecione o novo curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    @include('layout.footer')
</body>

</html>
