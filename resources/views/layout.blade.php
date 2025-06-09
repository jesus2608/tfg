<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Juegos Santana</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #map {
            height: 400px;
            width: 100%;
            margin: 1rem 0;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 min-h-screen flex flex-col text-gray-900">


    <header class="bg-white bg-opacity-90 shadow-md p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-700">🎮 Juegos Santana</h1>
            <nav class="space-x-6 text-blue-700 font-semibold">
                <a href="{{ route('welcome') }}" class="hover:text-orange-400 transition">Inicio</a>
                <a href="{{ route('auth.index') }}" class="hover:text-orange-400 transition">Mi panel</a>
                <a href="{{ route('juegos.index') }}" class="hover:text-orange-400 transition">Listado de juegos</a>
                <a href="{{ route('usuarios.index') }}" class="hover:text-orange-400 transition">Listado de usuarios</a>
                <a href="{{ route('chat.index', 1) }}" class="hover:text-orange-400 transition">Hacer un reporte</a>
                @auth
                    
                
                <form action="{{ route('logout') }}" method="post" class="inline-block">
    @csrf
    <input type="submit" value="Cerrar sesión"
        class="bg-gradient-to-r from-blue-600 to-blue-500 text-white py-2 px-5 rounded-xl shadow hover:from-blue-700 hover:to-blue-600 transition duration-300 ease-in-out font-semibold cursor-pointer">
</form>
          @endauth  </nav>
        </div>
    </header>

    <main class="flex-grow max-w-6xl mx-auto p-6 w-full">
        @yield('contenido')
    </main>

    <footer class="bg-white bg-opacity-90 text-center p-4 text-sm text-blue-700 font-semibold">
        © {{ now()->year }} Juegos Santana. Todos los derechos reservados.
    </footer>

</body>
</html>
