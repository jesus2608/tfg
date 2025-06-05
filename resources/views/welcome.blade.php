@extends('layout') 

@section('contenido')
    <div class="text-center mt-12">
        <h2 class="text-4xl font-bold text-white mb-4">Bienvenido a <span class="text-orange-400">Juegos Santana</span> 🎮</h2>
        <p class="text-lg text-blue-100 mb-8">
            La mejor plataforma para comprar, vender e intercambiar videojuegos con otros gamers apasionados como tú.
        </p>
        <a href="{{ route('juegos.index') }}"
           class="bg-orange-400 hover:bg-orange-500 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition duration-300 ease-in-out">
            Ver juegos disponibles
        </a>
    </div>

    <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold text-blue-700 mb-2">🎯 Compra</h3>
            <p class="text-gray-700">Encuentra juegos de todas las plataformas al mejor precio y cerca de ti.</p>
        </div>

        <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold text-blue-700 mb-2">🕹️ Vende</h3>
            <p class="text-gray-700">Publica tus juegos fácilmente y encuentra compradores interesados.</p>
        </div>

        <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold text-blue-700 mb-2">💬 Conecta</h3>
            <p class="text-gray-700">Chatea con otros usuarios, intercambia opiniones y haz reportes seguros.</p>
        </div>
    </div>
@endsection
