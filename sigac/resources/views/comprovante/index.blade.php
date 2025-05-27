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
        <a href="{{ route('comprovante.create') }}" class="btn btn-primary mb-3">Criar Comprovante</a>

        <h1>Lista de Comprovantes</h1>

        @foreach ($comprovantes as $comprovante)
            <div class="container">
                <h5>Atividade: {{ $comprovante->atividade }}</h5>
                <p>Horas: {{ $comprovante->horas }}</p>
                <p>Categoria: {{ $comprovante->categoria->nome ?? 'N/A' }}</p>
                <p>Aluno: {{ $comprovante->aluno->nome ?? 'N/A' }}</p>
                <p>Usuário: {{ $comprovante->user->name ?? 'N/A' }}</p>

                <a type="link" class="btn btn-primary" href="/comprovante/{{ $comprovante->id }}/edit">Editar</a>

                <form action="{{ route('comprovante.destroy', $comprovante->id) }}" method="POST"
                    onsubmit="return confirm('Está certo que deseja excluir este comprovante?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        @endforeach

        @if($comprovantes->isEmpty())
            <p>Nenhum comprovante cadastrado.</p>
        @endif
    </div>

    <div class="container mt-5">
        @include('layout.footer')
    </div>
</body>

</html>
