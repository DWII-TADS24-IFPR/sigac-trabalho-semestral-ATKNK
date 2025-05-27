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
    <div class="container">
        @include('layout.footer')
    </div>
</body>

</html>