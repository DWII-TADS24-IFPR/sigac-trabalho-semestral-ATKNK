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
        <a type="link" class="btn btn-primary" href="/aluno">Aluno</a>
        <a type="link" class="btn btn-primary" href="/categoria">Categoria</a>
        <a type="link" class="btn btn-primary" href="/comprovante">Comprovante</a>
        <a type="link" class="btn btn-primary" href="/curso">Curso</a>
        <a type="link" class="btn btn-primary" href="/declaracao">Declaração</a>
        <a type="link" class="btn btn-primary" href="/documento">Documento</a>
        <a type="link" class="btn btn-primary" href="/eixo">Eixo</a>
        <a type="link" class="btn btn-primary" href="/nivel">Nível</a>
        <a type="link" class="btn btn-primary" href="/turma">Turma</a>
    </div>
    @include('layout.footer')
</body>

</html>