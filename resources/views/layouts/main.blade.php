<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Filantropus</title>

        <!-- Fontes do Projeto -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- CSS do Projeto -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" href="{{ url('/images/favicon. png') }}">
        <script src="https://kit.fontawesome.com/61b7997f9e.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="/js/scripts.js"></script>
    </head>
    <body>
    @if(Request::path() === '/')
        <header class="header-bg-transparent">
    @elseif(Request::path() === 'all')
        <header class="header-bg-transparent">
    @elseif(Request::path() === 'events/create')
        <header class="header-bg-transparent">
    @elseif(Request::path() === 'dashboard')
        <header class="header-bg-blue">
    @else
        <header class="header-bg-blue">
    @endif 
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <h1 style="font-weight: 600;">FILANTROPUS</h1>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/#all" class="nav-link">Ações Comunitárias</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Ação</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meu perfil</a>
                        </li> 
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                Sair</a>
                            </form>
                        </li> 
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li> 
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>  
                        @endguest  
                    <ul>
                </div>
            </nav>
        </header>

        <main>
            @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
            @endif

            @yield('content')
        </main>

        <footer>
            <p>Desenvolvido por <a href="/" id="author-link">João Tolfo</a> - &copy2021 All Rights Reserved</p>
        </footer>

        <!-- Ícones -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- Lottie Animations -->
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    </body>
</html>