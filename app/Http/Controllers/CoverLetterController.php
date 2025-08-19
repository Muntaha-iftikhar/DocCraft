<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class CoverLetterController extends Controller
{
    public function showForm()
    {
        return view('cover_letter.form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'job_title' => 'required|string',
            'company_name' => 'required|string',
            'industry' => 'required|string',
            'profession' => 'required|string',
            'experience' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // AI prompt
        $prompt = "
Generate a short professional, concise cover letter based on the following details:
- Name: {$validated['name']}
- Email: {$validated['email']}
- Phone: {$validated['phone']}
- Address: {$validated['address']}
- Job Title: {$validated['job_title']}
- Company: {$validated['company_name']}
- Industry: {$validated['industry']}
- Profession: {$validated['profession']}
- Experience: {$validated['experience']}
- Notes: {$validated['notes']}

Make it one page, ATS-friendly, and personalized for the job title and company.
Return only the letter content.
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
        $generatedText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $letterContent = trim(str_replace(['```', 'text'], '', $generatedText));

        if (!$letterContent) {
            return back()->withErrors(['api_error' => 'Failed to generate cover letter. Try again.']);
        }

        session([
            'cover_data' => $validated,
            'cover_letter' => $letterContent,
        ]);

        return view('cover_letter.display', [
            'coverData' => $validated,
            'letterContent' => $letterContent,
        ]);
    }

    public function downloadPDF()
    {
        $coverData = session('cover_data');
        $letterContent = session('cover_letter');

        if (!$coverData || !$letterContent) {
            return redirect()->route('coverLetter.form')->with('error', 'Data not found.');
        }

        $pdf = Pdf::loadView('cover_letter.pdf', compact('coverData', 'letterContent'));
        return $pdf->download('cover-letter.pdf');
    }
}
