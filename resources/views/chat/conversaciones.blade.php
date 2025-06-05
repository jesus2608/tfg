@extends('layout')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-lg border border-blue-200">
    <h2 class="text-2xl font-bold mb-4 text-blue-700">Tus conversaciones</h2>

    @forelse($contactos as $contacto)
        <div class="mb-4">
            <a href="{{ route('chat.index', $contacto->id) }}"
               class="block bg-blue-100 text-blue-800 px-4 py-2 rounded hover:bg-blue-200 transition">
                {{ $contacto->name }}
            </a>
        </div>
    @empty
        <p class="text-gray-600">No tienes conversaciones aún.</p>
    @endforelse
</div>
@endsection
