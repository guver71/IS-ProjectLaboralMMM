<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gray-900 text-white shadow overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6 text-gray-100">Crear Oferta</h1>

            <form action="{{ route('ofertas.store') }}" method="POST">
                @csrf

                <!-- Campo Título -->
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-300">Título</label>
                    <input type="text" name="titulo" id="titulo" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('titulo') }}">
                    @error('titulo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-300">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Salario -->
                <div class="mb-4">
                    <label for="salario" class="block text-sm font-medium text-gray-300">Salario</label>
                    <input type="text" name="salario" id="salario" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('salario') }}">
                    @error('salario')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Ubicación -->
                <div class="mb-4">
                    <label for="ubicacion" class="block text-sm font-medium text-gray-300">Ubicación</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('ubicacion') }}">
                    @error('ubicacion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Fecha de Inicio de Publicación -->
<div class="mb-4">
    <label for="fecha_inicio" class="block text-sm font-medium text-gray-300">Fecha de Inicio de Publicación</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('fecha_inicio') }}">
    @error('fecha_inicio')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

                <!-- Campo Fecha de Vencimiento -->
                <div class="mb-4">
                    <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-300">Fecha de Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('fecha_vencimiento') }}">
                    @error('fecha_vencimiento')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end">
                    <a href="{{ route('ofertas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-700 transition duration-200 ease-in-out">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200 ease-in-out">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
