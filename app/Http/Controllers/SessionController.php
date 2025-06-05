<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return  view('auth.login');
    }
    public function store(Request $request){
        // $request->validate([
        //     'email'=>'required',
        //     'contraseña'=>'required'
        // ]);
        
        $atributos = $request->only(['email', 'password']);
        if(!Auth::attempt($atributos)){
            throw ValidationException::withMessages([
                'email'=>'Esas credenciales no son correctas'
            ]);
        }
        $request->session()->regenerate();
        return redirect('/');
    }
    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
