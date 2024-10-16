<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gray-800 text-gray-100 shadow-md sm:rounded-lg p-6 transition-all duration-300 hover:shadow-xl">
            <h1 class="text-3xl font-bold text-gray-100 mb-6 flex items-center justify-center">
                <svg class="w-8 h-8 text-yellow-400 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                </svg>
                {{ $oferta->titulo }}
            </h1>

            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="bg-green-600 text-white p-4 rounded mb-4 flex items-center animate-bounce">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Mensaje de alerta si ya está postulado -->
            @if (session('alert'))
                <div class="bg-red-500 text-white p-4 rounded mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ session('alert') }}</span>
                </div>
            @endif

            <!-- Formato de lista -->
            <div class="bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 mb-6">
                <div class="flex items-center mb-2">
                    <strong class="text-gray-300 w-40">Descripción:</strong>
                    <p class="text-gray-400">{{ $oferta->descripcion }}</p>
                </div>
                <div class="flex items-center mb-2">
                    <strong class="text-gray-300 w-40">Salario:</strong>
                    <p class="text-gray-400">{{ $oferta->salario }}</p>
                </div>
                <div class="flex items-center mb-2">
                    <strong class="text-gray-300 w-40">Ubicación:</strong>
                    <p class="text-gray-400">{{ $oferta->ubicacion }}</p>
                </div>
                <div class="flex items-center">
                    <strong class="text-gray-300 w-40">Fecha de Vencimiento:</strong>
                    <p class="text-gray-400">{{ $oferta->fecha_vencimiento }}</p>
                </div>
            </div>

            <!-- Botón de Postularse (visible solo para postulantes) -->
            @role('postulante')
            <form action="{{ route('postularse', $oferta->id) }}" method="POST" id="postulacionForm">
                @csrf
                <button type="submit" class="bg-yellow-500 text-white px-6 py-3 rounded-full hover:bg-yellow-600 transition-all duration-300 ease-in-out flex items-center justify-center transform hover:scale-105" onclick="return confirmPostulacion()">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Postularse
                </button>
            </form>
            @endrole

            <div class="flex justify-end mt-8">
                <a href="{{ route('ofertas.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-all duration-300 ease-in-out flex items-center transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0v6m0-6V6" />
                    </svg>
                    Regresar
                </a>
            </div>
        </div>
    </div>

    <script>
        function confirmPostulacion() {
            return confirm('¿Estás seguro de que deseas postularte a esta oferta?');
        }
    </script>
</x-app-layout>
