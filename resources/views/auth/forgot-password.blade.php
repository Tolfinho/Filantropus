<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fontes do Projeto -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- CSS do Projeto -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body class="auth-container">

        <x-guest-layout>
            <div class="auth-card">

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Esqueceu sua senha? Sem problema. Apenas informe o seu email para lhe enviarmos um link de redefinição de senha.') }}
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1 class="auth-title" style="font-size: 40px;">Recuperar senha</h1>
                    <div class="block">
                        <x-jet-input id="email" class="block mt-1 w-full auth-inputs" type="email" name="email" :value="old('email')" placeholder="Email para recuperação..." required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <div class="back-to-menu-link"><ion-icon name="chevron-back-outline"></ion-icon><a href="/login">Voltar!</a></div>
                        <x-jet-button class="auth-button">
                            {{ __('Recuperar Senha') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-guest-layout>

        <!-- Ícones -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
