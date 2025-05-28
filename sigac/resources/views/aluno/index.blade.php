<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <title>SIGAC</title>
</head>

<body>

    @include('layout.navbar')

    <div class="container mt-1">


        <div class="d-flex flex-row justify-content-between align-items-center">
            <h1>Lista de Alunos:</h1>
            <a type="link" class="btn btn-primary m-1" href="/aluno/create">Criar Aluno</a>
        </div>

        @foreach ($alunos as $aluno)
            <div class="container mb-3">

                <div class="d-flex flex-row justify-content-between">
                    <h2>{{ $aluno->nome }}</h2>

                    <div class="d-flex flex-row align-items-center">
                        <a type="link" class="btn btn-warning m-1" href="/aluno/{{ $aluno->id }}/edit">Editar</a>
                        <form class="m-0" action="{{ route('aluno.destroy', $aluno->id) }}" method="POST"
                            onsubmit="return confirm('Está certo que deseja excluir este aluno?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>

                </div>

                <div class="mx-5">
                    <p>CPF: {{ $aluno->cpf }}</p>
                    <p>Email: {{ $aluno->email }}</p>
                    <p>Curso: {{ $aluno->curso->nome }}</p>
                    <p>Turma: {{ $aluno->turma->ano }}</p>
                </div>

            </div>
        @endforeach
    </div>

    @include('layout.footer')

</body>

</html>
