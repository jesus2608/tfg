<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        $usuarios = User::all();
        return view('auth.admin.index', compact('usuarios'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user= User::findOrFail($id);
        return view('auth.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
  
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user->name = $request->nombre;
    $user->email = $request->email;

    if ($request->filled('contraseña')) {
        $user->password;
    }

    $user->save();

    return redirect("/usuarios");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
         $user->juegos()->delete(); 
        $user->delete();
        return redirect('/usuarios');
    }
}
