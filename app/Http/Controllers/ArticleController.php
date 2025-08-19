<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class ArticleController extends Controller
{
    public function showForm()
    {
        // Return the form view for article generation
        return view('article.form');
    }

    public function generateArticle(Request $request)
{
    // Validate user inputs
    $validated = $request->validate([
        'title' => 'nullable|string',
        'subject' => 'required|string',
        'audience' => 'required|string',
        'tone' => 'required|string',
        'length' => 'nullable|string',
        'keywords' => 'nullable|string',
        'outline' => 'nullable|string',
    ]);

    // Initialize the prompt
    $prompt = "
    You are a professional writer.
    Write a high-quality, SEO-optimized article.

    Title: " . ($validated['title'] ?? 'Untitled') . "
    Subject: " . $validated['subject'] . "
    Audience: " . $validated['audience'] . "
    Tone: " . $validated['tone'] . "
    ";

    // Add optional fields to the prompt if they exist
    if (!empty($validated['keywords'])) {
        $prompt .= "\nKeywords: " . $validated['keywords'];
    }

    if (!empty($validated['length'])) {
        $prompt .= "\nLength: " . $validated['length'];
    }

    if (!empty($validated['outline'])) {
        $prompt .= "\nOutline: " . $validated['outline'];
    }

    $prompt .= "
    Instructions:
    - Provide clear, informative content with actionable insights.
    - Ensure the tone matches the specified preference.
    - Use subheadings and structure the content logically.
    - No fluff, ensure readability.
    ";

    // Make the request to the Gemini API
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
        'contents' => [[
            'parts' => [['text' => $prompt]]
        ]]
    ]);

    // Check if the response contains valid data
    $result = $response->json();
    $generatedText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
    $cleanArticle = strip_tags($generatedText);
    $cleanArticle = preg_replace('/[`#*_>]/', '', $cleanArticle);

    // Handle case where the generation failed
    if (!$cleanArticle) {
        return back()->withErrors(['api_error' => 'Article generation failed.']);
    }

    // Store the article data and content in the session
    session([
        'article_data' => $validated,
        'article_content' => $cleanArticle
    ]);

    // Return the view to show the generated article
    return view('article.show', [
        'articleData' => $validated,
        'generatedArticle' => $cleanArticle,
    ]);
}


    public function downloadPDF()
    {
        // Retrieve the article content from the session
        $articleContent = session('article_content');

        // Check if the content exists in the session
        if (!$articleContent) {
            return redirect()->route('article.form')->with('error', 'No article data found.');
        }

        // Load the PDF view and generate the PDF
        $pdf = Pdf::loadView('article.pdf', [
            'articleData' => session('article_data'),
            'articleContent' => $articleContent
        ]);

        // Download the generated PDF
        return $pdf->download('generated-article.pdf');
    }
}
