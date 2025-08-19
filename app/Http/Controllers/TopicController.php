<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseOutlineController extends Controller
{
    public function showForm()
    {
        return view('Course_Outline.form');
    }

    public function generateOutline(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:255',
        ]);

        // Prepare AI prompt
        $prompt = "
You are an educational AI. Given a topic, return a JSON object with:

1. 'headings': A list of related subtopics or headings.
2. 'assignment_name': A creative assignment title.
3. 'description': A short paragraph about the assignment.
4. 'questions': 3 to 4 deep and useful questions about the topic.

Topic: {$validated['topic']}

Return response in this JSON format:
{
  \"headings\": [\"heading1\", \"heading2\", ...],
  \"assignment_name\": \"...\",
  \"description\": \"...\",
  \"questions\": [\"q1\", \"q2\", \"q3\"]
}
        ";

        // Call to AI API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);

        $result = $response->json();
        $text = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if (!$text || !json_validate($text)) {
            return back()->withErrors(['api_error' => 'Invalid or empty AI response.']);
        }

        $data = json_decode($text, true);

        session(['outline_data' => $data]);

        return view('Course_Outline.display', [
            'topic' => $validated['topic'],
            'data' => $data
        ]);
    }

    public function downloadPDF()
    {
        $data = session('outline_data');

        if (!$data) {
            return redirect()->route('course.form')->with('error', 'No data found.');
        }

        $pdf = Pdf::loadView('Course_Outline.pdf', compact('data'));
        return $pdf->download('assignment-summary.pdf');
    }
}
