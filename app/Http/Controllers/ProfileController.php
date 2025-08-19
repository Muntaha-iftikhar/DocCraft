<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function showForm()
    {
        return view('profile.form');
    }

    public function generateProfile(Request $request)
    {
        // Validation for user input
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'skills' => 'required|string|max:500',
            'experience' => 'required|integer',
            'industry' => 'nullable|string|max:255',
            'achievements' => 'nullable|string|max:1000',
        ]);

        // Prepare the prompt for AI to generate the profile summary
        $prompt = "
            Write a professional and engaging profile summary for someone with the job title {$validated['position']}. 
            They have {$validated['experience']} years of experience, 
            with key skills in {$validated['skills']}. 
            Their industry experience is in {$validated['industry']}. 
            They have the following achievements: {$validated['achievements']}.
            The summary should be confident but not too boastful, professional yet approachable.
        ";

        // Call the AI service (use the same logic as other features, e.g., Gemini API)
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);

        // Get the generated text
        $result = $response->json();
        $generatedText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if (!$generatedText) {
            return back()->withErrors(['api_error' => 'Profile summary generation failed.']);
        }

        // Pass the generated profile summary to the view
        return view('profile.display', [
            'profileSummary' => $generatedText,
            'inputData' => $validated,
        ]);
    }
}
