<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductNameController extends Controller
{
    public function showForm()
    {
        return view('product-name.form');
    }

    public function generateNames(Request $request)
{
    // Validate user input
    $validated = $request->validate([
        'product_type' => 'required|string|max:255',
        'industry' => 'required|string|max:255',
        'audience' => 'nullable|string|max:255',
        'tone' => 'required|string|max:255',
    ]);

    // Prepare the prompt
    $prompt = "
        Generate a list of 5 unique, catchy product names for a {$validated['product_type']} 
        in the {$validated['industry']} industry. 
        The target audience is " . ($validated['audience'] ?: 'general consumers') . ". 
        The names should match a {$validated['tone']} tone.
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
    $rawText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

    if (!$rawText) {
        return back()->withErrors(['api_error' => 'Product name generation failed.']);
    }

    // Clean and format text
    $cleanText = strip_tags($rawText);
    $cleanText = preg_replace('/[`#*_>]/', '', $cleanText); // Remove markdown symbols
    $cleanText = preg_replace('/^\s*(\d+\.\s*|[-•]\s*)/m', '', $cleanText); // Remove bullets/numbers
    $cleanText = preg_replace('/\s+/', ' ', $cleanText); // Normalize spaces
    $cleanText = trim($cleanText);

    // Split into lines for bullet display (e.g., if comma or newline separated)
    $nameList = preg_split('/[\n\r]+|(?<=\w)[;,](?=\s*\w)/', $cleanText);
    $nameList = array_filter(array_map('trim', $nameList)); // Remove empty lines and trim

    return view('product-name.display', [
        'generatedNames' => $nameList,
    ]);
}

}
