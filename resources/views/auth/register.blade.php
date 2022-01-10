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

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="auth-title">Cadastre-se</h1>
                    <div>
                        <x-jet-input id="name" class="block mt-1 w-full auth-inputs" type="text" name="name" :value="old('name')" placeholder="Digite seu nome..." required autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="email" class="block mt-1 w-full auth-inputs" type="email" name="email" :value="old('email')" placeholder="Digite seu melhor email..." required autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="password" class="block mt-1 w-full auth-inputs" type="password" name="password" placeholder="Digite sua senha..." required autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full auth-inputs" type="password" name="password_confirmation" placeholder="Confirme sua senha..." required autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="whatsapp" class="block mt-1 w-full auth-inputs" type="tel" name="whatsapp" placeholder="Digite seu número de WhatsApp" maxlength="11" required autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="uf" class="block mt-1 w-full auth-inputs" type="text" name="uf" placeholder="Informe sua UF... ( Ex.: RS, SP, RJ, etc )" required autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="city" class="block mt-1 w-full auth-inputs" type="text" name="city" placeholder="Informe sua cidade..." required autocomplete="off" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <div class="back-to-menu-link"><ion-icon name="chevron-back-outline"></ion-icon><a href="/">Voltar!</a></div>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Já está registrado?') }}
                        </a>

                        <x-jet-button class="ml-4 auth-button">
                            {{ __('Registrar-se') }}
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
