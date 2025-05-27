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
        <a type="link" class="btn btn-primary" href="/nivel/create">Criar Nivel</a>

        <h1>Lista de Níveis:</h1>

        @foreach ($niveis as $nivel)
            <div>
                <h2>{{ $nivel->nome }}</h2>
            </div>

            <a type="link" class="btn btn-primary" href="/nivel/{{ $nivel->id }}/edit">Editar</a>
            <form action="{{ route('nivel.destroy', $nivel->id) }}" method="POST"
                onsubmit="return confirm('Está certo que deseja excluir este nível?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        @endforeach
    </div>

    @include('layout.footer')

</body>

</html>
