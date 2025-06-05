<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PagoController extends Controller
{
    public function formulario(){
    return view('pago'); 
}

    public function pagar(Request $request){
        Stripe::setApiKey(config('services.stripe.secret'));

        try{
            Charge::create([
                'amount' => $request->amount*100, //pasar de centimos a euros,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Pago de juego',
            ]);
            return back()->with('success', 'Pago realizado');
        }catch(\Exception $e){
            return back()->with('error', 'Error a la hora de realizar el pago: '. $e->getMessage());
        }
    }
}
