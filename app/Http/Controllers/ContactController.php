<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactQuery;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = $request->all();

        // Send email to client
        \Illuminate\Support\Facades\Mail::to('kamaltech02@gmail.com')->send(new \App\Mail\ContactQuery($data));

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
