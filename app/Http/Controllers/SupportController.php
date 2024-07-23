<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'problem' => 'required|string',
        ]);

        // Send the email (you can customize this part)
        Mail::raw($request->problem, function ($message) use ($request) {
            $message->to('support@example.com')
                ->subject('Technical Support Request')
                ->from($request->email);
        });

        return back()->with('success', 'Your problem report has been sent successfully.');
    }
}
