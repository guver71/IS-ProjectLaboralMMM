<!-- resources/views/ofertas/edit.blade.php -->
<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gray-900 text-white shadow-xl overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6 text-gray-100">Editar Oferta</h1>

            <form action="{{ route('ofertas.update', $oferta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo Título -->
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-300">Título</label>
                    <input type="text" name="titulo" id="titulo" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $oferta->titulo }}">
                    @error('titulo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-300">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $oferta->descripcion }}</textarea>
                    @error('descripcion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Salario -->
                <div class="mb-4">
                    <label for="salario" class="block text-sm font-medium text-gray-300">Salario</label>
                    <input type="text" name="salario" id="salario" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $oferta->salario }}">
                    @error('salario')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Ubicación -->
                <div class="mb-4">
                    <label for="ubicacion" class="block text-sm font-medium text-gray-300">Ubicación</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $oferta->ubicacion }}">
                    @error('ubicacion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Fecha de Vencimiento -->
                <div class="mb-4">
                    <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-300">Fecha de Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $oferta->fecha_vencimiento }}">
                    @error('fecha_vencimiento')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('ofertas.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-full hover:bg-gray-800 transition duration-200 ease-in-out">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-200 ease-in-out">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
