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
            'course_title' => 'required|string',
            'audience' => 'required|string',
            'duration' => 'required|string',
            'modules' => 'required|integer|min:1|max:20',
            'main_goal' => 'required|string',
        ]);

        $prompt = "
        You are an expert education course designer.

        Create a complete course outline with the following details:

        Course Title: {$validated['course_title']}
        Target Audience: {$validated['audience']}
        Course Duration: {$validated['duration']}
        Number of Modules: {$validated['modules']}
        Main Learning Goal: {$validated['main_goal']}

        The output should include:

        - Module Number
        - Module Title
        - 1-2 line Description for each module

        The modules should start from basic concepts and gradually move towards advanced topics.
        End with a project, certification, or final review module if possible.
        Use clear, simple, and professional language.
        Return only plain text without any markdown or special formatting.
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

        $cleanOutline = strip_tags($generatedText);
        $cleanOutline = preg_replace('/[`#*_>]/', '', $cleanOutline);

        if (!$cleanOutline) {
            return back()->withErrors(['api_error' => 'Course outline generation failed.']);
        }

        session([
            'outline_data' => $validated,
            'course_outline' => $cleanOutline
        ]);

        return view('Course_Outline.display', [
            'outlineData' => $validated,
            'generatedOutline' => $cleanOutline,
        ]);
    }

    public function downloadPDF()
    {
        $courseOutline = session('course_outline');

        if (!$courseOutline) {
            return redirect()->route('course.form')->with('error', 'No course data found.');
        }

        $pdf = Pdf::loadView('Course_Outline.pdf', compact('courseOutline'));
        return $pdf->download('generated-course-outline.pdf');
    }
}
