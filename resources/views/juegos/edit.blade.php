<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar juego</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-top: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #bfdbfe; /* azul claro */
            box-shadow: 0 2px 6px rgb(191 219 254 / 0.5);
        }
    </style>
</head>
<body class="bg-blue-50 p-6 text-blue-900">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow border border-blue-200">

        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Edita tu juego.</h1>

        <form action="{{ route('juegos.update', $juego->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="titulo" class="block font-semibold mb-1">Título:</label>
                <input 
                    type="text" 
                    name="titulo" 
                    id="titulo" 
                    value="{{ old('titulo', $juego->titulo) }}" 
                    placeholder="Ingrese el título del juego"
                    class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label for="descripcion" class="block font-semibold mb-1">Descripción:</label>
                <textarea 
                    name="descripcion" 
                    id="descripcion" 
                    rows="5" 
                    class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('descripcion', $juego->descripcion) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="formato" class="block font-semibold mb-1">Formato:</label>
                    <select name="formato" id="formato" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="fisico" {{ $juego->formato == 'fisico' ? 'selected' : '' }}>Físico</option>
                        <option value="digital" {{ $juego->formato == 'digital' ? 'selected' : '' }}>Digital</option>
                    </select>
                </div>

                <div>
                    <label for="consola" class="block font-semibold mb-1">Plataforma:</label>
                    <select name="consola" id="consola" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach([
                            "Magnavox Odyssey", "Coleco Telstar", "Color TV-Game (Nintendo)", "Pong (Atari)", "Atari 2600",
                            "Intellivision", "ColecoVision", "Odyssey²", "Fairchild Channel F", "Nintendo Entertainment System (NES)",
                            "Sega Master System", "Atari 7800", "Super Nintendo Entertainment System (SNES)", "Sega Genesis / Mega Drive",
                            "TurboGrafx-16 / PC Engine", "Neo Geo AES", "Sony PlayStation", "Nintendo 64", "Sega Saturn",
                            "3DO Interactive Multiplayer", "Atari Jaguar", "PlayStation 2", "Xbox (original)", "Nintendo GameCube",
                            "Sega Dreamcast", "Xbox 360", "PlayStation 3", "Nintendo Wii", "PlayStation 4", "Xbox One",
                            "Nintendo Wii U", "Nintendo Switch", "PlayStation Vita", "Nintendo 3DS", "PlayStation 5", "Xbox Series X",
                            "Xbox Series S", "Steam Deck", "Game Boy", "Game Boy Color", "Game Boy Advance", "Nintendo DS",
                            "PSP (PlayStation Portable)", "Ouya", "Atari VCS (2021)", "Neo Geo Mini", "Evercade", "Analogue Pocket",
                            "Playdate", "Intellivision Amico"
                        ] as $plataforma)
                            <option value="{{ $plataforma }}" {{ $juego->consola == $plataforma ? 'selected' : '' }}>{{ $plataforma }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="genero" class="block font-semibold mb-1">Género:</label>
                    <select name="genero" id="genero" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach([
                            "Acción", "Aventura", "Plataformas", "Shooter (Disparos)", "FPS (First Person Shooter)", "TPS (Third Person Shooter)",
                            "RPG (Role Playing Game)", "JRPG (Japanese RPG)", "ARPG (Action RPG)", "MMORPG", "Estrategia",
                            "Estrategia en tiempo real (RTS)", "Estrategia por turnos", "Simulación", "Simulador de vida",
                            "Simulador de vuelo", "Deportes", "Carreras", "Lucha", "Beat 'em up", "Survival horror",
                            "Sandbox / Mundo abierto", "Puzzle (Rompecabezas)", "Musical / Ritmo", "Party Game", "Battle Royale",
                            "Metroidvania", "Roguelike / Roguelite", "Stealth (Infiltración)", "MOBA (Multiplayer Online Battle Arena)",
                            "Tower Defense", "Visual Novel", "Idle / Incremental", "Educativo", "Casual", "Indie"
                        ] as $genero)
                            <option value="{{ $genero }}" {{ $juego->genero == $genero ? 'selected' : '' }}>{{ $genero }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="estado" class="block font-semibold mb-1">Estado:</label>
                    <select name="estado" id="estado" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="nuevo" {{ $juego->estado == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                        <option value="seminuevo" {{ $juego->estado == 'seminuevo' ? 'selected' : '' }}>Seminuevo</option>
                        <option value="usado" {{ $juego->estado == 'usado' ? 'selected' : '' }}>Usado</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="precio" class="block font-semibold mb-1">Precio:</label>
                    <select name="precio" id="precio" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="fijo" {{ $juego->precio == 'fijo' ? 'selected' : '' }}>Fijo</option>
                        <option value="negociable" {{ $juego->precio == 'negociable' ? 'selected' : '' }}>Negociable</option>
                    </select>
                </div>

                <div>
                    <label for="etiqueta" class="block font-semibold mb-1">Etiqueta:</label>
                    <select name="etiqueta" id="etiqueta" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="retro" {{ $juego->etiqueta == 'retro' ? 'selected' : '' }}>Retro</option>
                        <option value="edicion coleccionista" {{ $juego->etiqueta == 'edicion coleccionista' ? 'selected' : '' }}>Edición Coleccionista</option>
                        <option value="disco" {{ $juego->etiqueta == 'disco' ? 'selected' : '' }}>Disco</option>
                        <option value="cartuchos" {{ $juego->etiqueta == 'cartuchos' ? 'selected' : '' }}>Cartuchos</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="foto_1" class="block font-semibold mb-1">Foto:</label>
                <input type="file" name="foto1" id="foto1" class="block w-full text-sm text-blue-700 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                    file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                @if($juego->foto_1)
                    <img src="{{ asset('storage/' . $juego->foto_1) }}" width="200" alt="Imagen actual" class="mt-3 rounded shadow border border-blue-300" />
                @endif
            </div>

            <input type="hidden" name="lat" id="lat" value="{{ $juego->lat }}">
            <input type="hidden" name="lon" id="lon" value="{{ $juego->lon }}">

            <div id="map"></div>

            <div class="mt-6 text-center">
                <button type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-6 py-3 rounded hover:from-blue-700 hover:to-blue-600 transition font-semibold">
                    Actualizar juego
                </button>
            </div>
            <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}" />

        </form>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const lat = {{ $juego->lat ?? 37.7818 }};
        const lon = {{ $juego->lon ?? -3.8889 }};
        const map = L.map('map').setView([lat, lon], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const marker = L.marker([lat, lon], { draggable: true }).addTo(map);

        // Actualizar inputs ocultos con la posición del marcador
        document.getElementById('lat').value = marker.getLatLng().lat;
        document.getElementById('lon').value = marker.getLatLng().lng;

        marker.on('dragend', () => {
            const pos = marker.getLatLng();
            document.getElementById('lat').value = pos.lat;
            document.getElementById('lon').value = pos.lng;
        });
    </script>

</body>
</html>
