<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
     public function store(Request $request){
        $validator = Validator::make($request->all(), [
    'nombre' => 'required|string|max:255',
    'email' => 'required|email|max:255|unique:users,email',
    'contraseña' => 'required',
]);

if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}
        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = $request->contraseña;
        $user->save();
        Auth::login($user);
        return redirect('/');

    }

}
