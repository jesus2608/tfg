<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalle del juego</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-blue-50 text-gray-800 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-lg border border-blue-200">

        <h1 class="text-3xl font-bold mb-4 text-blue-700">{{ $juego->titulo }}</h1>

        <div class="space-y-2 text-lg text-blue-900">
            <p><strong class="text-blue-700">Descripción:</strong> {{ $juego->descripcion }}</p>
            <p><strong class="text-blue-700">Formato:</strong> {{ $juego->tipo }}</p>
            <p><strong class="text-blue-700">Plataforma:</strong> {{ $juego->consola }}</p>
            <p><strong class="text-blue-700">Género:</strong> {{ $juego->genero }}</p>
            <p><strong class="text-blue-700">Estado:</strong> {{ $juego->estado }}</p>
            <p><strong class="text-blue-700">Precio:</strong> {{ $juego->precio }}</p>
            <p><strong class="text-blue-700">Etiqueta:</strong> {{ $juego->etiquetas }}</p>
        </div>

        <div class="mt-6">
            <p class="font-semibold mb-2 text-blue-700">Imagen:</p>
            <img src="{{ Storage::url($juego->foto_1) }}" alt="Imagen del juego" class="rounded shadow w-72 border border-blue-300">
        </div>

        <div class="mt-6">
            <div id="map" class="rounded overflow-hidden shadow border border-blue-300"></div>
        </div>
@auth
                <form action="{{ route('chat.index', $juego->user_id) }}" method="get">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-4 py-2 rounded hover:from-blue-700 hover:to-blue-600 transition">
                        Chatear con el vendedor
                    </button>
                         <a href="{{ route('pago.form') }}"
             class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            Comprar
            </a>
                </form>
       


        @endauth
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const lat = {{ $juego->lat }};
        const lon = {{ $juego->lon }};
        const map = L.map('map').setView([lat, lon], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([lat, lon]).addTo(map)
            .bindPopup('{{ $juego->titulo }}')
            .openPopup();
    </script>
</body>
</html>
