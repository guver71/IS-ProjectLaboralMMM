<x-app-layout>
    <!-- Hero Section -->
    <div class="min-h-screen relative bg-cover bg-center" style="background-image: url('/images/banner-barcelona.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-80"></div>

        <!-- Título -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold uppercase tracking-wide">El Barça presenta el cartel del 125 aniversario</h1>
            <p class="mt-3 text-lg font-medium opacity-80">Club | Hace 9 horas</p>
        </div>
    </div>

    <!-- Section de Noticias -->
    <div class="bg-black py-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Primera Noticia -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="/images/noticia1.jpg" alt="Noticia 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Jornada cargada de azulgranas</h3>
                    <p class="text-sm text-gray-400">Una jornada intensa con grandes resultados para el equipo.</p>
                </div>
            </div>

            <!-- Segunda Noticia -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="/images/noticia2.jpg" alt="Noticia 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Comunicado médico de Lamine Yamal</h3>
                    <p class="text-sm text-gray-400">El jugador ha sido dado de alta tras una leve lesión.</p>
                </div>
            </div>

            <!-- Tercera Noticia -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="/images/noticia3.jpg" alt="Noticia 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">De menos a más</h3>
                    <p class="text-sm text-gray-400">El equipo ha logrado una importante remontada en el último partido.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
