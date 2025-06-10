<?php

namespace App\Http\Controllers;

use App\Models\juegos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = juegos::query();
     //Si hay un valor en el campo "search", se aplica un filtro
    if ($request->filled('search')) {
        $query->where('titulo', 'like', '%' . $request->search . '%');
    }

    $juegos = $query->get();

    return view('juegos.index', compact('juegos'));
}

public function juegos(){
    return view('auth.index');
}


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('juegos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
    'titulo' => 'required|string|max:255',
    'descripcion' => 'nullable|string',
    'formato' => 'required|string|max:100',
    'consola' => 'required|string|max:100',
    'genero' => 'required|string|max:100',
    'estado' => 'required|string|max:50',
    'lat' => 'nullable|numeric|between:-90,90',
    'lon' => 'nullable|numeric|between:-180,180',
    'etiqueta' => 'nullable|string|max:255',
    'usuario_id' => 'required|exists:users,id',
    'foto1' => 'nullable|image|mimes:jpg|max:2048',
]);

if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()], 422);
}
        
        $juego = new juegos();
        $juego->titulo = $request->titulo;
        $juego -> descripcion  = $request->descripcion;
        $juego-> tipo = $request-> formato;
        $juego -> consola = $request -> consola;
        $juego -> genero = $request -> genero;
        $juego -> estado = $request-> estado;
        $juego -> precio = $request-> precio;
        $juego -> lat = $request-> lat;
        $juego -> lon = $request-> lon;
        $juego -> etiquetas = $request-> etiqueta;
        Storage::disk('public')->putFileAs('', $request->file('foto1'), $request->titulo.$request->estado.$request->precio.'.jpg');
        $juego -> foto_1 = $request->titulo.$request->estado.$request->precio.'.jpg';
        $juego->user_id = $request->usuario_id;
        $juego->save();
        return redirect('/juegos');
       
    }

    /**
     * Display the specified resource.
     */
  
    public function show2($id)
    {
        $juego = juegos::findOrFail($id);
        return view('juegos.show2', compact('juego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $juego = juegos::findOrFail($id);
        return view('juegos.edit', compact('juego'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
    'titulo' => 'required|string|max:255',
    'descripcion' => 'nullable|string',
    'formato' => 'required|string|max:100',
    'consola' => 'required|string|max:100',
    'genero' => 'required|string|max:100',
    'estado' => 'required|string|max:50',
    'precio' => 'required|numeric|min:0',
    'lat' => 'nullable|numeric|between:-90,90',
    'lon' => 'nullable|numeric|between:-180,180',
    'etiqueta' => 'nullable|string|max:255',
    'usuario_id' => 'required|exists:users,id',
    'foto1' => 'nullable|image|mimes:jpg|max:2048',
]);

if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()], 422);
}   
    $juego = juegos::findOrFail($id);
    $juego->titulo = $request->titulo;
    $juego->descripcion = $request->descripcion;
    $juego->tipo = $request->formato;
    $juego->consola = $request->consola;
    $juego->genero = $request->genero;
    $juego->estado = $request->estado;
    $juego->precio = $request->precio;
    $juego->lat = $request->lat;
    $juego->lon = $request->lon;
    $juego->etiquetas = $request->etiqueta;
    $juego->user_id = $request->usuario_id;
    if ($request->hasFile('foto1')) {
        if ($juego->foto_1 && Storage::disk('public')->exists($juego->foto_1)) {
            Storage::disk('public')->delete($juego->foto_1);
        }
        $nombreFoto = $request->titulo.$request->estado.$request->precio.'.jpg';
        Storage::disk('public')->putFileAs('', $request->file('foto1'), $nombreFoto);
        $juego->foto_1 = $nombreFoto;
    }

    $juego->save();

 
    return redirect('/juegos');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($juegos)
    {
        $juego = juegos::findOrFail($juegos);
        $juego->delete();
        Storage::disk('public')->delete($juego->foto_1);
        return redirect('/juegos');
    }
}
