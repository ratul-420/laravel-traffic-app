<?php
namespace App\Http\Controllers;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->orderBy('id', 'desc')->get();
        return view('messages', compact('messages'));
    }
}
