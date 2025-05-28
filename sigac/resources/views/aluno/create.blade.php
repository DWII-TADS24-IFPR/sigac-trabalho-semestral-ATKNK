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

        <h1>Criando aluno:</h1>

        <form action="{{ route('aluno.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso:</label>
                <select name="curso_id" class="form-select" required>
                    <option value="">Selecione um curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="turma_id" class="form-label">Turma:</label>
                <select name="turma_id" class="form-select" required>
                    <option value="">Selecione uma turma</option>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}">{{ $turma->ano }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>

    </div>
    
    @include('layout.footer')

</body>

</html>
