<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-b from-gray-100 to-white shadow-lg sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m0 0l-3-3m0 0L9 8v4" />
                </svg>
                Postulaciones para {{ $oferta->titulo }}
            </h1>

            <table class="table-auto w-full mt-5 bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Postulante</th>
                        <th class="px-6 py-3 text-left font-semibold">Email</th>
                        <th class="px-6 py-3 text-left font-semibold">Estado</th>
                        <th class="px-6 py-3 text-left font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($oferta->postulaciones as $postulacion)
                        <tr class="hover:bg-gray-50 transition duration-300">
                            <td class="border-b px-6 py-4 text-gray-800">{{ $postulacion->user->name }}</td>
                            <td class="border-b px-6 py-4 text-gray-800">{{ $postulacion->user->email }}</td>
                            <td class="border-b px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-sm 
                                    {{ $postulacion->estado == 'aceptado' ? 'bg-green-100 text-green-600' : ($postulacion->estado == 'rechazado' ? 'bg-red-100 text-red-600' : 'bg-yellow-100 text-yellow-600') }}">
                                    {{ ucfirst($postulacion->estado) }}
                                </span>
                            </td>
                            <td class="border-b px-6 py-4">
                                <form action="{{ route('postulaciones.cambiarEstado', $postulacion->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="estado" class="form-select bg-gray-100 text-gray-800 py-2 px-4 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                                        <option value="pendiente" {{ $postulacion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="aceptado" {{ $postulacion->estado == 'aceptado' ? 'selected' : '' }}>Aceptado</option>
                                        <option value="rechazado" {{ $postulacion->estado == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
