<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class BlogController extends Controller
{
    public function showForm()
    {
        return view('blog.form');
    }

    public function generateBlog(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'audience' => 'required|string',
            'keywords' => 'nullable|string',
            'tone' => 'required|string',
            'word_count' => 'nullable|integer',
        ]);

        $prompt = "
        You are a professional blog writer.
        Write an original, engaging, and SEO-optimized blog post.

        Title: {$validated['title']}
        Audience: {$validated['audience']}
        Tone: {$validated['tone']}";

        if ($validated['keywords']) {
            $prompt .= "\nKeywords: {$validated['keywords']}";
        }

        if ($validated['word_count']) {
            $prompt .= "\nWord Count: Around {$validated['word_count']} words.";
        }

        $prompt .= "
        Instructions:
        - Hook the reader with a strong intro.
        - Use clear subheadings.
        - Informative content. No fluff.
        - No markdown or special characters like #, *, `, etc.
        - Return only plain text blog content.
        ";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);

        $result = $response->json();
        $generatedText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $cleanBlog = strip_tags($generatedText);
        $cleanBlog = preg_replace('/[`#*_>]/', '', $cleanBlog);

        if (!$cleanBlog) {
            return back()->withErrors(['api_error' => 'Blog generation failed.']);
        }

        session([
            'blog_data' => $validated,
            'blog_content' => $cleanBlog
        ]);

        return view('blog.display', [
            'blogData' => $validated,
            'generatedBlog' => $cleanBlog,
        ]);
    }

    public function downloadPDF()
    {
        $blogContent = session('blog_content');

        if (!$blogContent) {
            return redirect()->route('blog.form')->with('error', 'No blog data found.');
        }

        $pdf = Pdf::loadView('blog.pdf', compact('blogContent'));
        return $pdf->download('generated-blog.pdf');
    }
}
