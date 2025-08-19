<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BusinessIdeaController extends Controller
{
    public function showForm()
    {
        return view('Business_idea.business_idea_form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'interests' => 'required|string',
            'skills' => 'required|string',
            'budget' => 'required|string',
            'location' => 'required|string',
            'tone' => 'required|string',
        ]);

        // Create the AI prompt
        $prompt = "
Suggest 3 innovative business ideas in a {$validated['tone']} tone. Use the following input:

- Interests: {$validated['interests']}
- Skills: {$validated['skills']}
- Budget: {$validated['budget']}
- Location: {$validated['location']}

Each idea should include a name, short description, and why it's a good fit.
";

        // Make the API call to Gemini
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);

        // Log the response to check for issues
        \Log::info('Gemini API Response:', ['response' => $response->json()]);

        // Check if the response is valid
        $result = $response->json();
        $ideaText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if (!$ideaText) {
            return back()->withErrors(['api_error' => 'Could not generate business ideas. Check API response.']);
        }

        // Clean up the response text
        $generatedIdeas = trim(str_replace(['```', '*', '#', 'text'], '', $ideaText));

        // If no ideas are generated, return an error
        if (!$generatedIdeas) {
            return back()->withErrors(['api_error' => 'No business ideas generated. Try again later.']);
        }

        // Store generated ideas in the session
        session(['business_ideas' => $generatedIdeas]);

        return view('Business_idea.business_idea_display', [
            'ideas' => $generatedIdeas,
        ]);
    }
}
