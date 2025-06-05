<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
     public function store(Request $request){
        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = $request->contraseña;
        $user->save();
        Auth::login($user);
        return redirect('/');

    }

}
