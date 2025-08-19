<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProposalController extends Controller
{
    public function showForm()
    {
        return view('proposal.form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'client_name' => 'required|string',
            'project_description' => 'required|string',
            'objectives' => 'required|string',
            'timeline' => 'required|string',
            'budget' => 'required|string',
            'requirements' => 'nullable|string',
            'your_name' => 'required|string',
            'tone' => 'required|string',
        ]);

        $prompt = "
Generate a professional business proposal in a {$validated['tone']} tone. Use the following details:

- Proposal Title: {$validated['title']}
- Client Name: {$validated['client_name']}
- Project Description: {$validated['project_description']}
- Objectives: {$validated['objectives']}
- Timeline: {$validated['timeline']}
- Budget Estimate: {$validated['budget']}
- Special Requirements: {$validated['requirements']}
- Submitted By: {$validated['your_name']}

The proposal should be clear, formal, and structured into proper sections like Introduction, Project Overview, Objectives, Timeline, Budget, and Conclusion.
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
        $proposalText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $generatedProposal = trim(str_replace(['```', '*', '#', 'text'], '', $proposalText));

        if (!$generatedProposal) {
            return back()->withErrors(['api_error' => 'Could not generate proposal. Try again.']);
        }

        session(['proposal_text' => $generatedProposal]);

        return view('proposal.display', [
            'proposal' => $generatedProposal,
        ]);
    }
} 