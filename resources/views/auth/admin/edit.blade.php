@extends('layout')

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 px-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Editar Usuario</h2>

        <form action="{{ route('usuarios.update', $user->id) }}" method="post" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <input 
                    type="text" 
                    name="nombre" 
                    placeholder="Ingrese su nombre" 
                    value="{{ old('nombre', $user->name) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition"
                    required
                >
            </div>
            
            <div>
                <input 
                    type="password" 
                    name="contraseña" 
                    placeholder="Nueva contraseña (opcional)" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition"
                >
            </div>
            
            <div>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Ingrese su email" 
                    value="{{ old('email', $user->email) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition"
                    required
                >
            </div>
            
            <div>
                <input 
                    type="submit" 
                    value="Actualizar" 
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white p-3 rounded-lg shadow-lg font-semibold cursor-pointer transition-transform transform hover:scale-105"
                >
            </div>
        </form>
    </div>
</div>
@endsection
