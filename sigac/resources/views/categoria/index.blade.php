<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <title>Document</title>
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        <a type="link" class="btn btn-primary" href="/categoria/create">Criar Categoria</a>
        <h1>Lista de Categorias:</h1>
        @foreach ($categorias as $categoria)
            <div>
                <h2>{{ $categoria->nome }}</h2>
                <p>Máximo de Horas: {{ $categoria->maximo_horas }}</p>
                <a type="link" class="btn btn-primary" href="/categoria/{{ $categoria->id }}/edit">Editar</a>
                <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST"
                    onsubmit="return confirm('Está certo que deseja excluir esta categoria?')">
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
