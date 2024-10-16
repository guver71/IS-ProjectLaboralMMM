<x-guest-layout>
    <!-- Sección principal con modo oscuro -->
    <div class="relative min-h-screen flex items-center justify-center bg-gray-900">
        <!-- Video de fondo -->
        <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-20 z-0">
            <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
        </video>

        <!-- Capa de superposición semi-transparente -->
        <div class="absolute inset-0 bg-black bg-opacity-80 z-10"></div>

        <!-- Contenido principal en modo oscuro -->
        <div class="relative z-20 bg-gray-800 text-gray-100 rounded-lg p-10 max-w-lg mx-auto shadow-2xl">
            <!-- Icono de estado de cuenta -->
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Mensaje principal de espera -->
            <h1 class="text-3xl font-bold text-center mb-4">Su cuenta esta pendiente de aprobación</h1>
            <p class="text-gray-400 text-center mb-6">Gracias por registrarte. Estamos revisando tu cuenta. Recibirás una notificación pronto.</p>

            <!-- Dino caminando (Google Dino) -->
            <div class="flex justify-center my-6">
                <img src="{{ asset('images/google-dino.gif') }}" alt="Google Dino Caminando" class="h-24 w-24">
            </div>

            <!-- Botón para volver a la página principal -->
            <div class="mt-6 text-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-red-700 transition ease-in-out"
                    onclick="logoutAndRedirect()">
                    Loguearse
                </button>
            </div>

            <!-- Mensaje de agradecimiento minimalista -->
            <p class="mt-6 text-center text-gray-500 text-sm">Gracias por tu paciencia y confianza en nuestro sistema.</p>
        </div>
    </div>

    <!-- Scripts para animaciones -->
    <script>
        function logoutAndRedirect() {
            document.getElementById('logout-form').submit();
            setTimeout(function() {
                window.location.href = '/';
            }, 1000);
        }
    </script>
</x-guest-layout>
