<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-700 leading-tight">
            {{ __('Usuarios Pendientes de Aprobación') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <!-- Formato de lista para usuarios pendientes -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-gray-700 border border-gray-600 text-left">
                        <thead>
                            <tr>
                                
                                <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Nombre</th>
                                <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Email</th>
                                <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Rol</th>
                                <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-600">
                                

                                <!-- Información del usuario -->
                                <td class="px-6 py-4 text-gray-300">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-gray-300">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-gray-300 capitalize">{{ ucfirst($user->rol) }}</td>

                                <!-- Botones de acción (Aprobar y Rechazar) -->
                                <td class="px-6 py-4 flex space-x-4">
                                    <!-- Botón de Aprobar -->
                                    <form action="{{ route('usuarios.approve', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-transform duration-200 ease-in-out transform hover:scale-105">
                                            Aprobar
                                        </button>
                                    </form>

                                    <!-- Botón de Rechazar -->
                                    <form action="{{ route('usuarios.approve', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-transform duration-200 ease-in-out transform hover:scale-105">
                                            Rechazar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Enlaces de paginación -->
                <div class="mt-6 text-gray-300">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
