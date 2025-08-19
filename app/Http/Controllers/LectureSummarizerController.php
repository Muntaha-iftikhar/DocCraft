<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class LectureSummarizerController extends Controller
{
    public function index()
    {
        return view('Lecture Summarizer.lecture_summarizer');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:100',
        ]);

        $prompt = "
Generate a summarized lecture for the topic: {$validated['topic']}.

Respond STRICTLY in this exact JSON format:

{
  \"headings\": [\"Heading 1\", \"Heading 2\", \"Heading 3\"],
  \"questions\": [\"Question 1?\", \"Question 2?\", \"Question 3?\", \"Question 4?\"],
  \"assignment\": {
    \"title\": \"Assignment Title\",
    \"description\": \"Assignment description paragraph.\"
  }
}

Formatting Rules:
1. Headings should be 3–4 main points **only**, in simple sentence form (comma-separated, not bullet list).
2. Questions must encourage deep thinking and classroom discussion.
3. Assignment must be interesting and relevant to the topic.
4. Return ONLY valid JSON (no markdown or extra text).
";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        $result = $response->json();
        $generatedText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

        $cleanedText = trim(str_replace(['```json', '```'], '', $generatedText));
        $generated = json_decode($cleanedText, true);

        if (json_last_error() !== JSON_ERROR_NONE || !isset($generated['headings'], $generated['questions'], $generated['assignment'])) {
            \Log::error('Lecture JSON parse error', [
                'raw' => $generatedText,
                'error' => json_last_error_msg()
            ]);
            return back()->withErrors(['api_error' => 'Failed to generate lecture summary.']);
        }

        session([
            'topic' => $validated['topic'],
            'lecture_data' => $generated
        ]);

        return redirect()->back()->with('data', $generated);
    }

    public function downloadQuestions(Request $request)
    {
        $questions = json_decode($request->input('questions'), true);
        $topic = $request->input('topic');

        $pdf = Pdf::loadView('Lecture Summarizer.questions_pdf', [
            'topic' => $topic,
            'questions' => $questions
        ]);

        return $pdf->download('lecture_questions.pdf');
    }

    public function downloadAssignment(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ];

        $pdf = Pdf::loadView('Lecture Summarizer.assignment', $data);
        return $pdf->download('assignment.pdf');
    }
}
