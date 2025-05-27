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
        <h2>Editando aluno: {{ $aluno->nome }}</h2>

        <div>
            <form action="{{ route('aluno.update', $aluno->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <p>Nome: {{ $aluno->nome }}</p>
                    <label for="nome" class="form-label">Digite o novo nome:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <p>CPF: {{ $aluno->cpf }}</p>
                    <label for="cpf" class="form-label">Digite o novo CPF:</label>
                    <input type="text" name="cpf" class="form-control" required>
                </div>

                <div class="mb-3">
                    <p>Email: {{ $aluno->email }}</p>
                    <label for="email" class="form-label">Digite o novo email:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="curso_id" class="form-label">Curso:</label>
                    <select name="curso_id" class="form-select" required>
                        <option value="">Selecione o novo curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="turma_id" class="form-label">Turma:</label>
                    <select name="turma_id" class="form-select" required>
                        <option value="">Selecione a nova turma</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->ano }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>

        </form>


    </div>

    @include('layout.footer')
</body>

</html>
