<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class AgendaController extends Controller
{
    public function showForm()
    {
        return view('agenda.form');
    }

    public function generateAgenda(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'duration' => 'required|string',
            'participants' => 'required|string',
            'goal' => 'required|string',
            'topics' => 'required|string',
        ]);

        $prompt = "
        You are an expert meeting organizer. Based on the following inputs, generate a professional and well-structured meeting agenda.

        Title: {$validated['title']}
        Date: {$validated['date']}
        Time: {$validated['time']}
        Duration: {$validated['duration']}
        Participants: {$validated['participants']}
        Goal: {$validated['goal']}
        Key Topics: {$validated['topics']}

        Format:
        - Use bullet points or numbered items.
        - Allocate time per topic (optional).
        - Keep the tone professional and clear.
        - Do not return any markdown or special symbols like #, *, `, etc.
        - Return plain text only.
        ";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ]);

        $result = $response->json();
        $generatedAgenda = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if (!$generatedAgenda) {
            return back()->withErrors(['api_error' => 'Agenda generation failed.']);
        }

        session([
            'agenda_data' => $validated,
            'agenda_content' => $generatedAgenda
        ]);

        return view('agenda.display', [
            'agendaData' => $validated,
            'generatedAgenda' => $generatedAgenda
        ]);
    }

    public function downloadPDF()
    {
        $agendaContent = session('agenda_content');

        if (!$agendaContent) {
            return redirect()->route('agenda.form')->with('error', 'No agenda data found.');
        }

        $pdf = Pdf::loadView('agenda.pdf', compact('agendaContent'));
        return $pdf->download('meeting-agenda.pdf');
    }
}
