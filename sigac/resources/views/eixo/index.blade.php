<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <title>SIGAC</title>
</head>

<body>

    @include('layout.navbar')

    <div class="container">
        <a type="link" class="btn btn-primary" href="/eixo/create">Criar Eixo</a>

        <h1>Lista de Eixos:</h1>

        @foreach ($eixos as $eixo)
            <div>
                <h2>{{ $eixo->nome }}</h2>
            </div>

            <a type="link" class="btn btn-primary" href="/eixo/{{ $eixo->id }}/edit">Editar</a>
            <form action="{{ route('eixo.destroy', $eixo->id) }}" method="POST"
                onsubmit="return confirm('Está certo que deseja excluir este eixo?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        @endforeach
    </div>

    @include('layout.footer')

</body>

</html>
