<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Prepare email data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'messageBody' => $request->message,
        ];

        // Send the email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('official.easycars@gmail.com')
                    ->subject($data['subject'])
                    ->replyTo($data['email'], $data['name']);
        });

        // Redirect back with success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
