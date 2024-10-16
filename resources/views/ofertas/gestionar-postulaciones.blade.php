<x-app-layout>
    <!-- Mensajes de éxito o alerta con animaciones (posicionado arriba) -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mt-4 animate-pulse flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-2.293-5.707l-3-3a1 1 0 011.414-1.414L8 10.586l6.293-6.293a1 1 0 111.414 1.414l-7 7a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('alert'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 p-4 rounded mt-4 flex items-center justify-center animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 8a1 1 0 012 0v3a1 1 0 01-2 0V8zm1 5a1 1 0 110 2 1 1 0 010-2z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('alert') }}</span>
        </div>
    @endif

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-white mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16zM10.293 15.707l-3-3a1 1 0 011.414-1.414L11 13.586l4.293-4.293a1 1 0 011.414 1.414l-5 5a1 1 0 01-1.414 0z"/>
                </svg>
                Gestionar Postulaciones
            </h1>

            @foreach($ofertas as $oferta)
                <div class="mb-4 bg-gray-800 p-4 shadow-sm rounded-lg transition duration-300 hover:shadow-md">
                    <h2 class="text-lg font-semibold text-white mb-2">{{ $oferta->titulo }}</h2>
                    <table class="table-auto w-full text-center text-xs">
                        <thead>
                            <tr class="bg-gray-700 text-white text-sm">
                                <th class="px-2 py-1">Postulante</th>
                                <th class="px-2 py-1">Estado</th>
                                <th class="px-2 py-1">CV</th> <!-- Columna para el CV -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($oferta->postulaciones as $postulacion)
                                <tr class="hover:bg-gray-700 transition duration-200">
                                    <!-- Columna de Postulante con enlace para ver detalles -->
                                    <td class="border px-2 py-1 flex items-center justify-center text-white">
                                        <img class="h-5 w-5 rounded-full mr-2" src="{{ $postulacion->user->profile_photo_url }}" alt="{{ $postulacion->user->name }}">
                                        <a href="{{ route('postulantes.ver', $postulacion->id) }}" class="text-blue-400 hover:text-blue-500">{{ $postulacion->user->name }}</a>
                                    </td>

                                    <td class="border px-2 py-1 text-white {{ $postulacion->estado == 'rechazado' ? 'text-red-500' : ($postulacion->estado == 'aceptado' ? 'text-green-500' : '') }}">
                                        <form action="{{ route('postulaciones.actualizar-estado', $postulacion->id) }}" method="POST" class="flex justify-center items-center">
                                            @csrf
                                            @method('PATCH')
                                            <select name="estado" class="mr-2 bg-gray-900 border border-gray-600 rounded-md text-xs focus:border-blue-500 focus:ring focus:ring-blue-200 transition text-white" onchange="this.form.submit()">
                                                <option value="aceptado" {{ $postulacion->estado == 'aceptado' ? 'selected' : '' }}>Aceptar</option>
                                                <option value="rechazado" {{ $postulacion->estado == 'rechazado' ? 'selected' : '' }}>Rechazar</option>
                                            </select>
                                        </form>
                                    </td>

                                    <!-- Columna para el CV -->
                                    <td class="border px-2 py-1 text-blue-400">
                                        @if($postulacion->user->archivo_cv)
                                            <a href="{{ asset('storage/' . $postulacion->user->archivo_cv) }}" target="_blank" class="hover:text-blue-500">
                                                Ver CV
                                            </a>
                                        @else
                                            <span class="text-gray-500">No disponible</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
