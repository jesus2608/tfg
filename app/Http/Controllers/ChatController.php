<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
 public function index(User $user)
{
    $authId = Auth::id();

    $messages = Message::with('sender')
        ->where(function ($query) use ($authId, $user) {
            $query->whereIn('sender_id', [$authId, $user->id])
                  ->whereIn('receiver_id', [$authId, $user->id]);
        })
        ->orderBy('created_at')
        ->get();

    return view('chat.index', compact('messages', 'user'));
}


    public function store(Request $request, User $user)
    {
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'message' => $request->message
        ]);
        return back();
    }



public function conversaciones()
{
    $userId = Auth::id();

    $chats = Message::where('sender_id', $userId)
                ->orWhere('receiver_id', $userId)
                ->with(['sender', 'receiver'])
                ->get();

    $contactos = collect(); //Agrupar con la persona que chatean
    
    foreach ($chats as $msg) {
        $contacto = $msg->sender_id == $userId ? $msg->receiver : $msg->sender;
        if ($contacto && !$contactos->contains('id', $contacto->id)) {
            $contactos->push($contacto);
        }
    }

    return view('chat.conversaciones', compact('contactos'));
}

}
