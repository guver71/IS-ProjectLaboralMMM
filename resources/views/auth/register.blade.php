<x-guest-layout>
    <style>
        body {
            background-color: #1A1A1D; /* Fondo oscuro */
            color: #C3073F; /* Texto principal */
        }

        input, select, button {
            background-color: #4E4E50; /* Fondo de los campos */
            color: white; /* Texto en los campos */
            border: none;
        }

        a {
            color: #6F2232; /* Color de los enlaces */
        }

        a:hover {
            color: #950740; /* Efecto hover en los enlaces */
        }

        .bg-button {
            background-color: #C3073F; /* Fondo del botón */
        }

        .bg-button:hover {
            background-color: #950740; /* Fondo del botón en hover */
        }
    </style>

    <x-authentication-card class="bg-[#1A1A1D] p-6 rounded-lg shadow-lg max-w-md mx-auto mt-10">
        <x-slot name="logo">
            <div class="flex justify-center mb-4">
                <img src="/images/leonidas.png" alt="Logo" class="rounded-full w-24 h-24 object-cover">
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf


            <!-- Selección de Rol -->
            <div class="mt-4">
                <x-label for="rol" class="text-[#C3073F]" value="{{ __('Rol') }}" />
                <select id="rol" name="rol" class="block mt-1 w-full bg-[#4E4E50]" onchange="toggleFields()">
                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="empresa" {{ old('rol') == 'empresa' ? 'selected' : '' }}>Empresa</option>
                    <option value="postulante" {{ old('rol') == 'postulante' ? 'selected' : '' }}>Postulante</option>
                    <option value="supervisor" {{ old('rol') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                </select>
            </div>

            <div>
                <x-label for="name" class="text-[#C3073F]" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full bg-[#4E4E50]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Campo para DNI / RUC (se cambia dinámicamente) -->
            <div class="mt-4">
                <x-label for="identifier" class="text-[#C3073F]" id="identifierLabel" value="{{ __('DNI') }}" />
                <x-input id="identifier" class="block mt-1 w-full bg-[#4E4E50]" type="text" name="identifier" :value="old('identifier')" />
            </div>

            <!-- Campo para Celular / Teléfono (se cambia dinámicamente) -->
            <div class="mt-4">
                <x-label for="contact" class="text-[#C3073F]" id="contactLabel" value="{{ __('Celular') }}" />
                <x-input id="contact" class="block mt-1 w-full bg-[#4E4E50]" type="text" name="contact" :value="old('contact')" />
            </div>

            <div class="mt-4">
                <x-label for="email" class="text-[#C3073F]" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full bg-[#4E4E50]" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Añadido: Campo para Correo Alternativo -->
            <div class="mt-4">
                <x-label for="correo" class="text-[#C3073F]" value="{{ __('Correo Alternativo') }}" />
                <x-input id="correo" class="block mt-1 w-full bg-[#4E4E50]" type="email" name="correo" :value="old('correo')" />
            </div>

            

            <div class="mt-4">
                <x-label for="password" class="text-[#C3073F]" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full bg-[#4E4E50]" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" class="text-[#C3073F]" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full bg-[#4E4E50]" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Carga de archivo CV (solo para postulantes) -->
            <div class="mt-4" id="cv-upload" style="display: none;">
                <x-label for="archivo_cv" class="text-[#C3073F]" value="{{ __('Cargar CV (solo para postulantes)') }}" />
                <x-input id="archivo_cv" class="block mt-1 w-full bg-[#4E4E50]" type="file" name="archivo_cv" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-[#6F2232] hover:text-[#950740]">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-[#6F2232] hover:text-[#950740]">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-checkbox>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-[#6F2232] hover:text-[#950740]" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4 bg-button text-white">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    <!-- Script para manejar la dinámica de los campos -->
    <script>
        function toggleFields() {
            var rol = document.getElementById('rol').value;
            var identifierLabel = document.getElementById('identifierLabel');
            var contactLabel = document.getElementById('contactLabel');
            var cvUploadField = document.getElementById('cv-upload');

            if (rol === 'empresa') {
                identifierLabel.textContent = 'RUC';
                contactLabel.textContent = 'Teléfono';
                cvUploadField.style.display = 'none';
            } else if (rol === 'postulante') {
                identifierLabel.textContent = 'DNI';
                contactLabel.textContent = 'Celular';
                cvUploadField.style.display = 'block';
            } else {
                identifierLabel.textContent = 'DNI';
                contactLabel.textContent = 'Celular';
                cvUploadField.style.display = 'none';
            }
        }

        // Ejecutar la función al cargar la página para establecer el estado inicial
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
        });
    </script>
</x-guest-layout>
