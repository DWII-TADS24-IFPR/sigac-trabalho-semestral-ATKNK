<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>SIGAC</title>
</head>

<body class="d-flex flex-column min-vh-100">

        <div>@include('layout.navbar')</div>

        <div class="flex-grow-1 container my-3">
            @yield('content')
        </div>

        <footer class="mt-auto">
            @include('layout.footer')
        </footer>

</body>

</html>
