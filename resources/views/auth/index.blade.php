@extends('layout')

@section('contenido')
@auth
    <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 min-h-screen p-8">
        <div class="text-center text-white mb-8">
            <h1 class="text-3xl font-bold mb-2">Bienvenido, {{ auth()->user()->name }}</h1>
            <a href="{{ route('juegos.create') }}" 
               class="inline-block bg-white text-blue-700 py-2 px-6 rounded-full font-semibold shadow-md hover:bg-blue-50 transition">
                Crear un juego
            </a>
            <a href="{{ route('chat.conversaciones') }}"  class="inline-block bg-white text-blue-700 py-2 px-6 rounded-full font-semibold shadow-md hover:bg-blue-50 transition">
                Ver mis chats</a>
       

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach (auth()->user()->juegos as $juego)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-4">
                        <p class="text-lg font-medium mb-2 text-gray-800">{{ $juego->texto }}</p>
                        <img src="{{ Storage::url($juego->foto_1) }}" alt="Imagen no disponible" class="w-full h-48 object-cover mb-4 rounded-md">
                    </div>
                    <div class="flex justify-between items-center p-4 bg-gray-100">
                        <a href="{{ route('juegos.put', $juego->id) }}" 
                           class="text-blue-700 hover:text-blue-900 font-medium transition">
                            Editar
                        </a>
                        <form action="{{ route('juegos.delete', $juego->id) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 transition">
                                ❌
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endauth

@guest
    <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 min-h-screen flex flex-col items-center justify-center text-white p-6">
        <h1 class="text-4xl font-bold mb-4">Hola Invitado</h1>
        <p class="text-lg mb-6">Inicia sesión o regístrate si aún no tienes cuenta</p>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="inline-block bg-blue-700 hover:bg-blue-900 px-6 py-3 rounded font-semibold transition">
                Iniciar sesión
            </a>
            <a href="{{ route('register.create') }}" class="inline-block bg-orange-400 hover:bg-orange-500 px-6 py-3 rounded font-semibold text-white transition">
                Regístrate
            </a>
        </div>
    </div>
@endguest
@endsection
