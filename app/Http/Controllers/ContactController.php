<?php
namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|min:3|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|min:3|max:150',
            'message' => 'required|string|min:10|max:2000',
        ]);
        Message::create($data);
        return redirect('/contact')->with('success', 'Thank you! Your message has been sent.');
    }
}
