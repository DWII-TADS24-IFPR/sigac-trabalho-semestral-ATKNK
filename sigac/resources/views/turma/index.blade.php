<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <title>Turmas</title>
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        <a type="link" class="btn btn-primary" href="/turma/create">Criar Turma</a>
        <h1>Lista de Turmas:</h1>
        @foreach ($turmas as $turma)
            <div>
                <h2>{{ $turma->curso->nome ?? 'Curso não definido' }} - {{ $turma->ano }}</h2>
                <a type="link" class="btn btn-primary" href="/turma/{{ $turma->id }}/edit">Editar</a>
                <form action="{{ route('turma.destroy', $turma->id) }}" method="POST"
                    onsubmit="return confirm('Está certo que deseja excluir esta turma?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="container">
        @include('layout.footer')
    </div>
</body>

</html>
