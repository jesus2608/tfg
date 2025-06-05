<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        
            $table->enum('tipo', ['fisico', 'digital']);
            $table->string('titulo');
            $table->string('descripcion');
        
            $table->enum('consola', [
                "Magnavox Odyssey",
                "Coleco Telstar",
                "Color TV-Game (Nintendo)",
                "Pong (Atari)",
                "Atari 2600",
                "Intellivision",
                "ColecoVision",
                "Odyssey²",
                "Fairchild Channel F",
                "Nintendo Entertainment System (NES)",
                "Sega Master System",
                "Atari 7800",
                "Super Nintendo Entertainment System (SNES)",
                "Sega Genesis / Mega Drive",
                "TurboGrafx-16 / PC Engine",
                "Neo Geo AES",
                "Sony PlayStation",
                "Nintendo 64",
                "Sega Saturn",
                "3DO Interactive Multiplayer",
                "Atari Jaguar",
                "PlayStation 2",
                "Xbox (original)",
                "Nintendo GameCube",
                "Sega Dreamcast",
                "Xbox 360",
                "PlayStation 3",
                "Nintendo Wii",
                "PlayStation 4",
                "Xbox One",
                "Nintendo Wii U",
                "Nintendo Switch",
                "PlayStation Vita",
                "Nintendo 3DS",
                "PlayStation 5",
                "Xbox Series X",
                "Xbox Series S",
                "Steam Deck",
                "Game Boy",
                "Game Boy Color",
                "Game Boy Advance",
                "Nintendo DS",
                "PSP (PlayStation Portable)",
                "Ouya",
                "Atari VCS (2021)",
                "Neo Geo Mini",
                "Evercade",
                "Analogue Pocket",
                "Playdate",
                "Intellivision Amico"
            ]);
        
            $table->enum('genero', [
                "Acción",
                "Aventura",
                "Plataformas",
                "Shooter (Disparos)",
                "FPS (First Person Shooter)",
                "TPS (Third Person Shooter)",
                "RPG (Role Playing Game)",
                "JRPG (Japanese RPG)",
                "ARPG (Action RPG)",
                "MMORPG",
                "Estrategia",
                "Estrategia en tiempo real (RTS)",
                "Estrategia por turnos",
                "Simulación",
                "Simulador de vida",
                "Simulador de vuelo",
                "Deportes",
                "Carreras",
                "Lucha",
                "Beat ''em up", // <-- Comillas escapadas
                "Survival horror",
                "Sandbox / Mundo abierto",
                "Puzzle (Rompecabezas)",
                "Musical / Ritmo",
                "Party Game",
                "Battle Royale",
                "Metroidvania",
                "Roguelike / Roguelite",
                "Stealth (Infiltración)",
                "MOBA (Multiplayer Online Battle Arena)",
                "Tower Defense",
                "Visual Novel",
                "Idle / Incremental",
                "Educativo",
                "Casual",
                "Indie"
            ]);
        
            $table->enum('estado', ['nuevo', 'seminuevo', 'usado']);
            $table->enum('precio', ['fijo', 'negociable']);
            $table->string('lat');
            $table->string("lon");
        
            $table->enum('etiquetas', ['retro', 'edicion coleccionista', 'disco', 'cartuchos'])->nullable();
        
            // Fotos
            $table->string('foto_1');
            $table->string('foto_2')->nullable();
            $table->string('foto_3')->nullable();
            $table->string('foto_4')->nullable();
            $table->string('foto_5')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        });
        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
