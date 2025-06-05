<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if (Auth::check() && Auth::user()->is_admin) {
         $usuarios = User::all();
            return view('auth.admin.index', compact('usuarios'));
    }

    abort(403, 'Acceso denegado');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('auth.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
         $user->juegos()->delete(); 
        $user->delete();
        return redirect()->view('auth.admin.index')->with('success', 'Usuario eliminado.');
    }
}
