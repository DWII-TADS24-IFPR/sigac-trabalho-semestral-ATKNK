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
        <h2>Editando nível: {{ $nivel->nome }}</h2>

        <form action="{{ route('nivel.update', $nivel->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do nível:</label>
                <input type="text" name="nome" class="form-control" value="{{ $nivel->nome }}" required>

            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    @include('layout.footer')
</body>

</html>