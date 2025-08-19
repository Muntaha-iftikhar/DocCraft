<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BusinessNameController extends Controller
{
    public function showForm()
    {
        return view('business_name.form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'industry' => 'required|string',
            'audience' => 'required|string',
            'keywords' => 'nullable|string',
            'style' => 'required|string',
        ]);

        // Create AI Prompt
        $prompt = "
Suggest 10 creative, brandable business names for the following:
- Industry: {$validated['industry']}
- Target Audience: {$validated['audience']}
- Style: {$validated['style']}
- Keywords (optional): {$validated['keywords']}

Keep names short and memorable. Return only the list of names in plain text.
";

        // Call Gemini API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);

        $result = $response->json();
        $namesText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $generatedNames = explode("\n", trim(str_replace(['```', 'text'], '', $namesText)));

        if (!$generatedNames || empty($generatedNames[0])) {
            return back()->withErrors(['api_error' => 'Could not generate names. Try again.']);
        }

        // Store for PDF if needed
        session(['business_names' => $generatedNames]);

        return view('business_name.display', [
            'names' => $generatedNames,
        ]);
    }
}
