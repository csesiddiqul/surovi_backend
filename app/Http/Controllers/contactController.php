<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        $data = [
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'message' => $validated['message'],
        ];

        Mail::to('siddiqulcsebd@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Thanks for your message! We will contact you soon.');
        // বা যদি API হয়, তাহলে:
        return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    }
}
