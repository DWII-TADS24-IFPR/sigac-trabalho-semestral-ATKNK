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
        <a href="{{ route('documento.create') }}" class="btn btn-primary mb-3">Criar Documento</a>

        <h1>Lista de Documentos</h1>

        @foreach ($documentos as $documento)
            <div class="container">
                <h5>Descrição: {{ $documento->descricao }}</h5>
                <p>URL: <a href="{{ $documento->url }}" target="_blank">{{ $documento->url }}</a></p>
                <p>Horas Iniciais: {{ $documento->horas_in }}</p>
                <p>Horas Validadas: {{ $documento->horas_out ?? 'Não avaliadas' }}</p>
                <p>Status: {{ ucfirst($documento->status) }}</p>
                <p>Comentário: {{ $documento->comentario ?? 'Nenhum' }}</p>
                <p>Categoria: {{ $documento->categoria->nome ?? 'N/A' }}</p>
                <p>Usuário: {{ $documento->user->name ?? 'N/A' }}</p>

                <a href="{{ route('documento.edit', $documento->id) }}" class="btn btn-primary">Editar</a>

                <form action="{{ route('documento.destroy', $documento->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Tem certeza que deseja excluir este documento?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        @endforeach

        @if ($documentos->isEmpty())
            <p>Nenhum documento encontrado.</p>
        @endif
    </div>

    <div class="container mt-5">
        @include('layout.footer')
    </div>
</body>

</html>
