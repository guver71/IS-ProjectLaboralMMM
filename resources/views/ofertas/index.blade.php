<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gray-900 shadow-xl overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-100 mb-6">Lista de Ofertas</h1>

            <!-- Buscador -->
            <form action="{{ route('ofertas.index') }}" method="GET" class="mb-6">
                <div class="flex items-center bg-gray-800 p-4 rounded-lg shadow">
                    <input type="text" name="search" placeholder="Buscar oferta..." value="{{ request('search') }}" class="bg-gray-700 text-white rounded-l-lg w-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20h4M4 8l4 4-4 4m16-12h-4m0 8h4m-4 4h-4" />
                        </svg>
                    </button>
                </div>
            </form>

            @role('empresa|admin')
            <div class="mb-6">
                <a href="{{ route('ofertas.create') }}" class="bg-blue-600 text-white px-5 py-3 rounded-full hover:bg-blue-700 transition-all duration-300 ease-in-out flex items-center">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Crear Oferta
                </a>
            </div>
            @endrole

            @if (session('success'))
                <div class="bg-green-600 text-white p-4 rounded mb-4">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Lista de ofertas en formato de lista -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-800 text-white border border-gray-700">
                    <thead>
                        <tr class="text-left">
                            <th class="px-6 py-3 border-b border-gray-600">Título</th>
                            <th class="px-6 py-3 border-b border-gray-600">Descripción</th>
                            <th class="px-6 py-3 border-b border-gray-600">Salario</th>
                            <th class="px-6 py-3 border-b border-gray-600">Ubicación</th>
                            <th class="px-6 py-3 border-b border-gray-600">Empresa</th> <!-- Nueva columna para la empresa -->
                            <th class="px-6 py-3 border-b border-gray-600">Vencimiento</th>
                            <th class="px-6 py-3 border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ofertas as $oferta)
                        @php
                            $hoy = now()->toDateString();
                            $esVencida = $oferta->fecha_vencimiento < $hoy;
                        @endphp
                        <tr class="hover:bg-gray-700">
                            <!-- Título -->
                            <td class="px-6 py-4 border-b border-gray-700">
                                {{ $oferta->titulo }}
                            </td>

                            <!-- Descripción (truncada a 80 caracteres) -->
                            <td class="px-6 py-4 border-b border-gray-700">
                                {{ Str::limit($oferta->descripcion, 80) }}
                            </td>

                            <!-- Salario -->
                            <td class="px-6 py-4 border-b border-gray-700">
                                {{ $oferta->salario }}
                            </td>

                            <!-- Ubicación -->
                            <td class="px-6 py-4 border-b border-gray-700">
                                {{ $oferta->ubicacion }}
                            </td>

                            <!-- Empresa -->
                            <td class="px-6 py-4 border-b border-gray-700">
                                {{ $oferta->user->name ?? 'N/A' }} <!-- Muestra el nombre de la empresa que creó la oferta -->
                            </td>

                            <!-- Fecha de Vencimiento -->
                            <td class="px-6 py-4 border-b border-gray-700">
                                {{ $oferta->fecha_vencimiento }}
                                @if($esVencida)
                                    <span class="text-red-500 font-bold">Oferta Vencida</span>
                                @else
                                    <span class="text-green-500 font-bold">Vigente</span>
                                @endif
                            </td>

                            <!-- Acciones (Ver, Editar, Eliminar) -->
                            <td class="px-6 py-4 border-b border-gray-700 flex space-x-2">
                                <a href="{{ route('ofertas.show', $oferta->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition-all duration-300 ease-in-out">
                                    Ver
                                </a>

                                @role('empresa|admin')
                                <a href="{{ route('ofertas.edit', $oferta->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition-all duration-300 ease-in-out">
                                    Editar
                                </a>

                                <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta oferta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-all duration-300 ease-in-out">
                                        Eliminar
                                    </button>
                                </form>
                                @endrole
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
