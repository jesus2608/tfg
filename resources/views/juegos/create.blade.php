<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear juego</title>

    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>
<body class="bg-blue-900 text-gray-800">

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Crear nuevo juego</h1>

        <form action="{{ route('juegos.post') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium text-blue-700">Título</label>
                <input type="text" name="titulo" placeholder="Ingrese el título del juego"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Descripción</label>
                <textarea name="descripcion" rows="5"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required></textarea>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Formato</label>
                <select name="formato"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
                    <option value="fisico">Físico</option>
                    <option value="digital">Digital</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Plataforma</label>
                <select name="consola"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
                  <option value="Magnavox Odyssey">Magnavox Odyssey</option>
        <option value="Coleco Telstar">Coleco Telstar</option>
        <option value="Color TV-Game (Nintendo)">Color TV-Game (Nintendo)</option>
        <option value="Pong (Atari)">Pong (Atari)</option>
        <option value="Atari 2600">Atari 2600</option>
        <option value="Intellivision">Intellivision</option>
        <option value="ColecoVision">ColecoVision</option>
        <option value="Odyssey²">Odyssey²</option>
        <option value="Fairchild Channel F">Fairchild Channel F</option>
        <option value="Nintendo Entertainment System (NES)">Nintendo Entertainment System (NES)</option>
        <option value="Sega Master System">Sega Master System</option>
        <option value="Atari 7800">Atari 7800</option>
        <option value="Super Nintendo Entertainment System (SNES)">Super Nintendo Entertainment System (SNES)</option>
        <option value="Sega Genesis / Mega Drive">Sega Genesis / Mega Drive</option>
        <option value="TurboGrafx-16 / PC Engine">TurboGrafx-16 / PC Engine</option>
        <option value="Neo Geo AES">Neo Geo AES</option>
        <option value="Sony PlayStation">Sony PlayStation</option>
        <option value="Nintendo 64">Nintendo 64</option>
        <option value="Sega Saturn">Sega Saturn</option>
        <option value="3DO Interactive Multiplayer">3DO Interactive Multiplayer</option>
        <option value="Atari Jaguar">Atari Jaguar</option>
        <option value="PlayStation 2">PlayStation 2</option>
        <option value="Xbox (original)">Xbox (original)</option>
        <option value="Nintendo GameCube">Nintendo GameCube</option>
        <option value="Sega Dreamcast">Sega Dreamcast</option>
        <option value="Xbox 360">Xbox 360</option>
        <option value="PlayStation 3">PlayStation 3</option>
        <option value="Nintendo Wii">Nintendo Wii</option>
        <option value="PlayStation 4">PlayStation 4</option>
        <option value="Xbox One">Xbox One</option>
        <option value="Nintendo Wii U">Nintendo Wii U</option>
        <option value="Nintendo Switch">Nintendo Switch</option>
        <option value="PlayStation Vita">PlayStation Vita</option>
        <option value="Nintendo 3DS">Nintendo 3DS</option>
        <option value="PlayStation 5">PlayStation 5</option>
        <option value="Xbox Series X">Xbox Series X</option>
        <option value="Xbox Series S">Xbox Series S</option>
        <option value="Steam Deck">Steam Deck</option>
        <option value="Game Boy">Game Boy</option>
        <option value="Game Boy Color">Game Boy Color</option>
        <option value="Game Boy Advance">Game Boy Advance</option>
        <option value="Nintendo DS">Nintendo DS</option>
        <option value="PSP (PlayStation Portable)">PSP (PlayStation Portable)</option>
        <option value="Ouya">Ouya</option>
        <option value="Atari VCS (2021)">Atari VCS (2021)</option>
        <option value="Neo Geo Mini">Neo Geo Mini</option>
        <option value="Evercade">Evercade</option>
        <option value="Analogue Pocket">Analogue Pocket</option>
        <option value="Playdate">Playdate</option>
        <option value="Intellivision Amico">Intellivision Amico</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Género</label>
                <select name="genero"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
                  <option value="Acción">Acción</option>
        <option value="Aventura">Aventura</option>
        <option value="Plataformas">Plataformas</option>
        <option value="Shooter (Disparos)">Shooter (Disparos)</option>
        <option value="FPS (First Person Shooter)">FPS (First Person Shooter)</option>
        <option value="TPS (Third Person Shooter)">TPS (Third Person Shooter)</option>
        <option value="RPG (Role Playing Game)">RPG (Role Playing Game)</option>
        <option value="JRPG (Japanese RPG)">JRPG (Japanese RPG)</option>
        <option value="ARPG (Action RPG)">ARPG (Action RPG)</option>
        <option value="MMORPG">MMORPG</option>
        <option value="Estrategia">Estrategia</option>
        <option value="Estrategia en tiempo real (RTS)">Estrategia en tiempo real (RTS)</option>
        <option value="Estrategia por turnos">Estrategia por turnos</option>
        <option value="Simulación">Simulación</option>
        <option value="Simulador de vida">Simulador de vida</option>
        <option value="Simulador de vuelo">Simulador de vuelo</option>
        <option value="Deportes">Deportes</option>
        <option value="Carreras">Carreras</option>
        <option value="Lucha">Lucha</option>
        <option value="Beat ''em up">Beat 'em up</option>
        <option value="Survival horror">Survival horror</option>
        <option value="Sandbox / Mundo abierto">Sandbox / Mundo abierto</option>
        <option value="Puzzle (Rompecabezas)">Puzzle (Rompecabezas)</option>
        <option value="Musical / Ritmo">Musical / Ritmo</option>
        <option value="Party Game">Party Game</option>
        <option value="Battle Royale">Battle Royale</option>
        <option value="Metroidvania">Metroidvania</option>
        <option value="Roguelike / Roguelite">Roguelike / Roguelite</option>
        <option value="Stealth (Infiltración)">Stealth (Infiltración)</option>
        <option value="MOBA (Multiplayer Online Battle Arena)">MOBA (Multiplayer Online Battle Arena)</option>
        <option value="Tower Defense">Tower Defense</option>
        <option value="Visual Novel">Visual Novel</option>
        <option value="Idle / Incremental">Idle / Incremental</option>
        <option value="Educativo">Educativo</option>
        <option value="Casual">Casual</option>
        <option value="Indie">Indie</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Estado</label>
                <select name="estado"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
                    <option value="nuevo">Nuevo</option>
                    <option value="seminuevo">Seminuevo</option>
                    <option value="usado">Usado</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Precio</label>
                <select name="precio"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
                    <option value="fijo">Fijo</option>
                    <option value="negociable">Negociable</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Etiqueta</label>
                <select name="etiqueta"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" required>
                    <option value="retro">Retro</option>
                    <option value="edicion coleccionista">Edición Coleccionista</option>
                    <option value="disco">Disco</option>
                    <option value="cartuchos">Cartuchos</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-blue-700">Foto</label>
                <input type="file" name="foto1"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <input type="hidden" name="lat" id="lat" />
            <input type="hidden" name="lon" id="lon" />

            <div id="map" class="rounded border border-gray-300"></div>

            <div class="text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-6 py-2 rounded hover:from-blue-700 hover:to-blue-600 transition">
                    Guardar juego
                </button>
            </div>

            <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}" />
        </form>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([37.7818, -3.8889], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const marker = L.marker([37.7818, -3.8889], { draggable: true }).addTo(map);

        document.getElementById('lat').value = marker.getLatLng().lat;
        document.getElementById('lon').value = marker.getLatLng().lng;

        marker.on('dragend', function (e) {
            const { lat, lng } = e.target.getLatLng();
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lng;
        });
    </script>
</body>
</html>
