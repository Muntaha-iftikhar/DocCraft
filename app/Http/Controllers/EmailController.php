<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('email.form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string',
            'recipient_title' => 'required|string',
            'company_name' => 'required|string',
            'contact_info' => 'required|string',
            'project_name' => 'required|string',
            'purpose' => 'required|string',
            'details' => 'required|string',
            'tone' => 'required|string',
            'your_name' => 'required|string',
        ]);
    
        $prompt = "
Write a {$validated['tone']} professional email for a project named '{$validated['project_name']}'.

Recipient: {$validated['recipient_title']} {$validated['recipient_name']} from {$validated['company_name']} (Contact: {$validated['contact_info']}).

Purpose: {$validated['purpose']}.

Details: {$validated['details']}.

Sender: {$validated['your_name']}.

At the end of the email, clearly include:

- Sender's Name: {$validated['your_name']}
- Sender's Contact Info: {$validated['contact_info']}

Format the email properly with greeting, intro, project summary, request or action, and polite closing.
";

    
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);
    
        $result = $response->json();
        $emailText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $generatedEmail = trim(str_replace(['```', '*', '#'], '', $emailText));
    
        if (!$generatedEmail) {
            return back()->withErrors(['api_error' => 'Could not generate email. Try again.']);
        }
    
        return view('email.display', [
            'email' => $generatedEmail,
        ]);
    }
    
}

// - Sender's Email: [Use placeholder: your@email.com]
// - Sender's Company Website (optional): [Use placeholder: yourwebsite.com]

