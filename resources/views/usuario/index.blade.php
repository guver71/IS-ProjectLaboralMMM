<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="border-b border-gray-700 pb-6">

                    <!-- Formulario de búsqueda -->
                    <div class="mb-6">
                        <form action="{{ route('usuarios.index') }}" method="GET" class="flex items-center space-x-4">
                            <input type="text" name="search" id="search" placeholder="Buscar..." class="w-full border border-gray-600 bg-gray-700 rounded-md p-2 text-white" value="{{ request()->get('search') }}">

                            <select name="rol" id="rol" class="border border-gray-600 bg-gray-700 rounded-md p-2 text-white">
                                <option value="">Todos los Roles</option>
                                <option value="admin" {{ request()->get('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="empresa" {{ request()->get('rol') == 'empresa' ? 'selected' : '' }}>Empresa</option>
                                <option value="postulante" {{ request()->get('rol') == 'postulante' ? 'selected' : '' }}>Postulante</option>
                                <option value="supervisor" {{ request()->get('rol') == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                            </select>

                            <button type="submit" class="ml-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Buscar
                            </button>
                        </form>
                    </div>

                    <!-- Botones de acción (crear y usuarios pendientes) -->
                    <div class="mb-6 flex space-x-4">
                        <a href="{{ route('usuarios.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center">
                            <i class="fas fa-user-plus mr-2"></i> Crear Nuevo Usuario
                        </a>

                        <a href="{{ route('usuarios.pending') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded flex items-center">
                            <i class="fas fa-users-cog mr-2"></i> Usuarios Pendientes ({{ $pendingUsersCount }})
                        </a>
                    </div>

                    <!-- Lista de usuarios en formato de tabla -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-gray-700 border border-gray-600 text-left">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Foto</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Nombre</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Email</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Teléfono</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Rol</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-gray-300">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-600">
                                    <!-- Foto de perfil -->
                                    <td class="px-6 py-4">
                                        <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/default-avatar3.jpg') }}" alt="Foto de {{ $user->name }}" class="w-12 h-12 rounded-full border-2 border-gray-500">
                                    </td>

                                    <!-- Información del usuario -->
                                    <td class="px-6 py-4 text-gray-300">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-gray-300">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-gray-300">{{ $user->celular }}</td>
                                    <td class="px-6 py-4 text-gray-300 capitalize">{{ $user->rol }}</td>

                                    <!-- Botones de acción -->
                                    <td class="px-6 py-4 flex space-x-4">
                                        <!-- Botón para editar -->
                                        <a href="{{ route('usuarios.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-3 rounded-lg">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Botón para eliminar -->
                                        <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="button"
                                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded-lg"
                                                onclick="if(confirm('¿Está seguro de que desea eliminar este usuario?')) { this.closest('form').submit(); }">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-6 text-gray-300">
                        {{ $users->appends(['search' => request()->get('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-form');
                if (confirm('¿Está seguro de que desea eliminar este usuario?')) {
                    form.submit();
                }
            });
        });
    });
</script>
