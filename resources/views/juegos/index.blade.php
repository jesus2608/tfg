@extends('layout')

@section('contenido')
<div class="p-6">
    @auth
        
    
    <h1 class="text-3xl font-bold mb-4">Bienvenido {{ auth()->user()->name }} estos son los juegos que hay disponibles</h1>
@endauth
<form method="GET" action="{{ route('juegos.index') }}" class="mb-6">
    <input type="text" name="search" placeholder="Buscar por título..."
           value="{{ request('search') }}"
           class="p-2 border border-blue-300 rounded w-64 focus:outline-none focus:ring focus:border-blue-400">
    <button type="submit"
            class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        Buscar
    </button>
</form>


    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Consola</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($juegos as $item)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('juegos.show2', $item) }}" class="text-blue-600 hover:underline">
                                {{ $item->titulo }}
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $item->consola }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
