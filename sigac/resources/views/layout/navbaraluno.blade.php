<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard-aluno">SIGAC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard-aluno">Home</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/submit">Submeter Certificado</a>
                </li>

            </ul>

            <div class="d-flex flex-column justify-center">
                @auth
                    <div class="d-flex flex-row justify-content-around align-items-center">
                        <h5 class="m-2">{{ Auth::user()->name }}</h5>
                        <a href="{{ route('profile.edit') }}" class="btn m-2">Perfil</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn m-2">Logout</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Registrar</a>
                @endguest
            </div>

        </div>
    </div>
</nav>
