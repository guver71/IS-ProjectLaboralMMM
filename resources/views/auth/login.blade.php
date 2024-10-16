<x-guest-layout>
    <style>
        body {
            background-color: #1A1A1D; /* Color de fondo oscuro */
            color: #C3073F; /* Color de texto principal */
        }
    </style>
    
    <!-- Formulario de autenticación -->
    <x-authentication-card class="bg-[#1A1A1D] p-6 rounded-lg shadow-lg max-w-md mx-auto mt-10">
        <x-slot name="logo">
            <div class="flex justify-center mb-4">
                <img src="/images/leonidas.png" alt="Logo" class="rounded-full w-24 h-24 object-cover">
            </div>
        </x-slot>

        <!-- Mostrar errores de validación -->
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Campo de email -->
            <div class="mb-4">
                <x-label for="email" class="text-[#C3073F] text-sm" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full bg-[#4E4E50] text-white border-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-4">
                <x-label for="password" class="text-[#C3073F] text-sm" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full bg-[#4E4E50] text-white border-none" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Recordar usuario -->
            <div class="block mb-4">
                <label for="remember_me" class="flex items-center text-[#C3073F]">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Enlace de contraseña olvidada -->
            <div class="flex items-center justify-between mb-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-[#6F2232] hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Botón de inicio de sesión -->
            <div class="flex items-center justify-center">
                <x-button class="bg-[#C3073F] hover:bg-[#950740] w-full text-white py-2 rounded-lg">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
