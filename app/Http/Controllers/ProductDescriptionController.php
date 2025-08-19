<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductDescriptionController extends Controller
{
    public function showForm()
    {
        return view('product_description.form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string',
            'product_type' => 'required|string',
            'target_audience' => 'required|string',
            'features' => 'required|string',
            'tone' => 'required|string',
        ]);

        // Create AI Prompt
        $prompt = "
Write a {$validated['tone']} product description for a product with the following details:

- Product Name: {$validated['product_name']}
- Product Type: {$validated['product_type']}
- Target Audience: {$validated['target_audience']}
- Key Features: {$validated['features']}

Keep the description clear, engaging, and suitable for marketing. Return only the description text in plain format.
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
        $descriptionText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $generatedDescription = trim(str_replace(['```', 'text'], '', $descriptionText));

        if (!$generatedDescription) {
            return back()->withErrors(['api_error' => 'Could not generate product description. Try again.']);
        }

        // Store for PDF or reuse if needed
        session(['product_description' => $generatedDescription]);

        return view('product_description.display', [
            'description' => $generatedDescription,
        ]);
    }
}
