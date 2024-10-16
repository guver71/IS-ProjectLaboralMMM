<x-app-layout>
    <div class="bg-gray-900 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow-lg rounded-lg p-6">
                <h1 class="text-3xl font-extrabold text-white mb-6 flex items-center">
                    <i class="fas fa-briefcase text-indigo-400 mr-3"></i> Mis Postulaciones
                </h1>

                @if($postulaciones->isEmpty())
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg" role="alert">
                        <p>No te has postulado a ninguna oferta todavía.</p>
                    </div>
                @else
                    <table class="table-auto w-full mt-5 bg-gray-800 text-white rounded-lg shadow">
                        <thead class="bg-gray-700 text-gray-300">
                            <tr>
                                <th class="px-4 py-3">Título</th>
                                <th class="px-4 py-3">Descripción</th>
                                <th class="px-4 py-3">Salario</th>
                                <th class="px-4 py-3">Ubicación</th>
                                <th class="px-4 py-3">Fecha de Vencimiento</th>
                                <th class="px-4 py-3">Estado</th>
                                <th class="px-4 py-3">Acciones</th> <!-- Nueva columna para las acciones -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postulaciones as $postulacion)
                                <tr class="hover:bg-gray-700 transition duration-300 ease-in-out">
                                    <td class="border-b border-gray-700 px-4 py-2 text-indigo-400 font-semibold">
                                        <i class="fas fa-briefcase mr-2 text-blue-400"></i> {{ $postulacion->oferta->titulo }}
                                    </td>
                                    <td class="border-b border-gray-700 px-4 py-2 text-gray-300">{{ Str::limit($postulacion->oferta->descripcion, 50) }}</td>
                                    <td class="border-b border-gray-700 px-4 py-2 text-gray-300">{{ $postulacion->oferta->salario }} USD</td>
                                    <td class="border-b border-gray-700 px-4 py-2 text-gray-300">{{ $postulacion->oferta->ubicacion }}</td>
                                    <td class="border-b border-gray-700 px-4 py-2 text-gray-300">{{ $postulacion->oferta->fecha_vencimiento }}</td>
                                    <td class="border-b border-gray-700 px-4 py-2 text-center">
                                        <span class="inline-block py-1 px-3 rounded-full text-xs {{ $postulacion->estado == 'aceptado' ? 'bg-green-500 text-white' : ($postulacion->estado == 'rechazado' ? 'bg-red-500 text-white' : 'bg-yellow-500 text-white') }}">
                                            {{ ucfirst($postulacion->estado) }}
                                        </span>
                                    </td> <!-- Mostrar el estado -->
                                    <td class="border-b border-gray-700 px-4 py-2">
                                        <!-- Botón para cancelar la postulación -->
                                        <form action="{{ route('postulaciones.cancelar', $postulacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar esta postulación?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md transition duration-200">
                                                Cancelar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
