<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <title>Cursos</title>
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        <a type="link" class="btn btn-primary" href="/curso/create">Criar Curso</a>
        <h1>Lista de Cursos:</h1>
        @foreach ($cursos as $curso)
            <div>
                <h2>{{ $curso->nome }}</h2>
                <p>Sigla: {{ $curso->sigla }}</p>
                <p>Total de Horas: {{ $curso->total_horas }}</p>
                <p>Nível: {{ $curso->nivel->nome ?? 'Nível não definido' }}</p>

                <a type="link" class="btn btn-primary" href="/curso/{{ $curso->id }}/edit">Editar</a>
                <form action="{{ route('curso.destroy', $curso->id) }}" method="POST"
                    onsubmit="return confirm('Está certo que deseja excluir este curso?')">
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
