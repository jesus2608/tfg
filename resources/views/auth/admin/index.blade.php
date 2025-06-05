@extends('layout')
@section('contenido')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-4 text-blue-700">Gestión de Usuarios</h1>

    <table class="min-w-full bg-white border border-blue-200 rounded shadow-md">
        <thead class="bg-blue-100 text-blue-800">
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Admin</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr class="border-t hover:bg-blue-50">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        {{ $user->is_admin ? 'Sí' : 'No' }}
                    </td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('usuarios.edit', $user) }}"
                           class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-3 py-1 rounded hover:from-blue-700 hover:to-blue-600 transition">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                onclick="return confirm('¿Estás seguro de borrar este usuario?')">
                                Borrar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
