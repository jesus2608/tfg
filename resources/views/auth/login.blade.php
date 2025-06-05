@extends('layout')

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600 text-sm list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Correo electrónico"
                    required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                >
            </div>

            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Contraseña"
                    required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                >
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-orange-400 text-white p-3 rounded-lg shadow font-semibold hover:from-blue-700 hover:to-orange-500 transition-colors"
                >
                    Iniciar sesión
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-700 space-y-2">
            <span>¿No tienes cuenta?</span>
            <a href="{{ route('register.create') }}" class="text-orange-400 font-semibold hover:underline">Regístrate aquí</a>
        </div>
    </div>
</div>
@endsection
