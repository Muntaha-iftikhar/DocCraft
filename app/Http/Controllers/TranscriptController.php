<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class TranscriptController extends Controller
{
    public function showForm()
    {
        return view('transcript.form');
    }

    public function generateTranscript(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'participants' => 'required|string',
            'notes' => 'required|string',
        ]);

        $prompt = "
You are a professional meeting transcriber.
Generate a formal and coherent transcript from the following meeting details and notes.

Meeting Title: {$validated['title']}
Date: {$validated['date']}
Time: {$validated['time']}
Participants: {$validated['participants']}

Meeting Notes:
{$validated['notes']}

Instructions:
- Write the transcript in a realistic and flowing conversation style.
- Attribute statements to participants (assume names from the list).
- Avoid using markdown or special characters.
- Keep the tone professional and the formatting clean.
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
        $cleanTranscript = strip_tags($generatedText);
        $cleanTranscript = preg_replace('/[`#*_>]/', '', $cleanTranscript);

        if (!$cleanTranscript) {
            return back()->withErrors(['api_error' => 'Transcript generation failed.']);
        }

        session([
            'transcript_data' => $validated,
            'transcript_content' => $cleanTranscript
        ]);

        return view('transcript.display', [
            'transcriptData' => $validated,
            'generatedTranscript' => $cleanTranscript,
        ]);
    }

    public function downloadPDF()
    {
        $transcriptContent = session('transcript_content');

        if (!$transcriptContent) {
            return redirect()->route('transcript.form')->with('error', 'No transcript data found.');
        }

        $pdf = Pdf::loadView('transcript.pdf', compact('transcriptContent'));
        return $pdf->download('meeting-transcript.pdf');
    }
}
