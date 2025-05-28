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
    <div class="d-flex align-items-center justify-content-center mt-5 flex-column">
        <h2>Bem-vindo(a) ao Sistema de Gerenciamento de Atividades Complementares</h2>
        <p>Este projeto foi desenvolvido na disciplina de Desenvolvimento Web II</p>
    </div>
    @include('layout.footer')
</body>

</html>