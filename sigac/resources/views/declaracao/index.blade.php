<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/js/app.js'])

    <title>SIGAC</title>
</head>

<body>
    @include('layout.navbar')

    <div class="container mt-4">
        <a href="{{ route('declaracao.create') }}" class="btn btn-primary mb-3">Criar Declaração</a>

        <h1>Lista de Declarações:</h1>

        @foreach ($declaracoes as $declaracao)
            <div class="container">
                <h2>Hash: {{ $declaracao->hash }}</h2>
                <p>Data: {{ $declaracao->data }}</p>
                <p>Aluno: {{ $declaracao->aluno->nome }}</p>
                <p>Comprovante: {{ $declaracao->comprovante->atividade }} - {{ $declaracao->comprovante->horas }} horas
                </p>

                <a href="{{ route('declaracao.edit', $declaracao->id) }}" class="btn btn-primary">Editar</a>

                <form action="{{ route('declaracao.destroy', $declaracao->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Tem certeza que deseja excluir esta declaração?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        @endforeach

        @if ($declaracoes->isEmpty())
            <p>Nenhuma declaração cadastrada.</p>
        @endif
    </div>

        @include('layout.footer')
    
</body>

</html>
