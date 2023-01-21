<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Meu CSS -->
    <link rel="stylesheet" href="/css/styles.css">
    <!-- Meu Script-->
    <script src="/js/script.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Fonte Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!--Ion Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="logo" src="/img/paulitos_logo.png" alt="Logo eventos">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/events/created">Eventos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/events/create">Criar eventos</a>
                    </li>
                    @auth
                    <li class="nav-item"><a id="nav-link" href="/dashboard" class="nav-link px-2">Meus Eventos</a></li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Sair 
                    </a>
                    </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                    <a class="nav-link" href="/register">Cadastro</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/login">Entrar</a>
                    </li>
                    @endguest
                </ul>
                </div>
            </div>
        </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="container-footer">
        <ul id="ul-footer-main" class="nav justify-content-center pb-3 mb-3">
            <li class="nav-item"><a id="nav-link" href="/events/created" class="nav-link px-2">Eventos</a></li>
            <li class="nav-item"><a id="nav-link" href="/events/create" class="nav-link px-2">Criar eventos</a></li>
            @auth
            <li class="nav-item"><a id="nav-link" href="/dashboard" class="nav-link px-2">Meus Eventos</a></li>
            @endauth
            @guest
            <li class="nav-item"><a id="nav-link" href="/register" class="nav-link px-2">Cadastro</a></li>
            <li class="nav-item"><a id="nav-link" href="/login" class="nav-link px-2">Entrar</a></li>
            @endguest
        </ul>
        <p id="horizontal-line"></p>
        <a class="paulitos-producoes" href="https://github.com/PaPaPaulitos">&copy;Paulitos Produções</a>
        <p class="text-center normal-text">2020-Atualmente</p>
        </footer>
    </body>
</html>
