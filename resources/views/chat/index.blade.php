@extends('layout')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-lg border border-blue-200">

    <h4 class="text-2xl font-semibold mb-4 text-blue-700">Chat con {{ $user->name }}</h4>

    <div class="h-72 overflow-y-scroll border border-blue-300 rounded p-4 bg-blue-50">
        @foreach($messages as $msg)
            <div class="mb-2">
                <strong class="text-blue-800">{{ $msg->sender->name }}:</strong>
                <span class="text-gray-800">{{ $msg->message }}</span>
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('chat.store', $user->id) }}" class="mt-4">
        @csrf
        <textarea name="message" required
            class="w-full p-2 border border-blue-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            rows="3" placeholder="Escribe tu mensaje aquí..."></textarea>

        <button type="submit"
            class="mt-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-4 py-2 rounded hover:from-blue-700 hover:to-blue-600 transition">
            Enviar
        </button>
    </form>
</div>
@endsection
