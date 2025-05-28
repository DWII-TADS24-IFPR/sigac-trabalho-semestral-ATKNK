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

        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Comprovantes</h1>
            <a href="{{ route('comprovante.create') }}" class="btn btn-primary mb-1">Criar Comprovante</a>
        </div>

        @foreach ($comprovantes as $comprovante)
            <div class="container">
                <div class="d-flex flex-row justify-content-between">
                    <h2>Comprovante #{{ $comprovante->id }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a type="link" class="btn btn-warning m-1""
                            href="/comprovante/{{ $comprovante->id }}/edit">Editar</a>
                        <form action="{{ route('comprovante.destroy', $comprovante->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir este comprovante?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>

                </div>
                <h5>Atividade: {{ $comprovante->atividade }}</h5>
                <p>Horas: {{ $comprovante->horas }}</p>
                <p>Categoria: {{ $comprovante->categoria->nome ?? 'N/A' }}</p>
                <p>Aluno: {{ $comprovante->aluno->nome ?? 'N/A' }}</p>
                <p>Usuário: {{ $comprovante->user->name ?? 'N/A' }}</p>


            </div>
        @endforeach

        @if ($comprovantes->isEmpty())
            <p>Nenhum comprovante cadastrado.</p>
        @endif
    </div>

    @include('layout.footer')

</body>

</html>
