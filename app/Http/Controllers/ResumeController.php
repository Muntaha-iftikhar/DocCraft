<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;


class ResumeController extends Controller
{
    public function showForm()
    {
        return view('resume.resume_form');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'job_title' => 'required|string',
            'profession' => 'required|string',
            'field' => 'required|string',
            'linkedin' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'education' => 'required|array',
            'education.*.degree' => 'required|string',
            'education.*.institute' => 'required|string',
            'education.*.year' => 'required|string',
            'experience' => 'required|array',
            'experience.*.position' => 'required|string',
            'experience.*.company' => 'required|string',
            'experience.*.year' => 'required|string',
        ]);

        // Format education details for prompt
        $educationDetails = array_map(function($edu) {
            return "• {$edu['degree']} from {$edu['institute']} ({$edu['year']})";
        }, $validated['education']);
        $educationText = implode("\n", $educationDetails);

        // Format work experience details for prompt
        $experienceDetails = array_map(function($exp) {
            return "• {$exp['position']} at {$exp['company']} ({$exp['year']})";
        }, $validated['experience']);
        $experienceText = implode("\n", $experienceDetails);

        // Prepare comprehensive prompt for Gemini API
        $final_prompt = "
Create an ATS-optimized professional resume for {$validated['name']} who is applying for {$validated['job_title']} position in the {$validated['field']} field.

Personal Details:
- Name: {$validated['name']}
- Email: {$validated['email']}
- Phone: {$validated['phone']}
- Address: {$validated['address']}
- LinkedIn: {$validated['linkedin']}

Education Background:
{$educationText}

Work Experience:
{$experienceText}

Generate the resume in PURE JSON format with this exact structure:
{
  \"name\": \"{$validated['name']}\",
  \"position\": \"{$validated['job_title']}\",
  \"contact\": \"{$validated['phone']}\",
  \"email\": \"{$validated['email']}\",
  \"address\": \"{$validated['address']}\",
  \"linkedin\": \"{$validated['linkedin']}\",
  \"objective\": \"A concise 2-3 sentence professional summary highlighting relevant skills and goals\",
  \"education\": [
    {
      \"institute\": \"Institute name\",
      \"degree\": \"Degree name\",
      \"year\": \"2018-2020\"
    }
  ],
  \"workExperience\": [
    {
      \"company\": \"Company name\",
      \"position\": \"Job position\",
      \"description\": \"3-4 bullet points of key responsibilities\\n• Point 1\\n• Point 2\\n• Point 3\",
      \"keyAchievements\": \"3 notable achievements\\n• Achievement 1\\n• Achievement 2\\n• Achievement 3\",
      \"year\": \"2020-2021\"
    }
  ],
  \"skills\": [
    {
      \"title\": \"Technical Skills\",
      \"skills\": [\"Skill 1\", \"Skill 2\", \"Skill 3\"]
    },
    {
      \"title\": \"Soft Skills\",
      \"skills\": [\"Skill 1\", \"Skill 2\", \"Skill 3\"]
    },
    {
      \"title\": \"Tools & Technologies\",
      \"skills\": [\"Tool 1\", \"Tool 2\", \"Tool 3\"]
    }
  ]
}

IMPORTANT INSTRUCTIONS:
1. Include ALL the provided education and work experience entries
2. For each work experience, generate realistic responsibilities and achievements relevant to the position
3. Skills should match the profession ({$validated['profession']}) and field ({$validated['field']})
4. Return ONLY valid JSON without any additional text or explanations
5. Keep descriptions concise but impactful with bullet points
";

        // Make Gemini API call
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('GEMINI_API_ENDPOINT') . '?key=' . env('GEMINI_API_KEY'), [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $final_prompt]
                    ]
                ]
            ]
        ]);

        // Handle API response
        $result = $response->json();
        $generatedText = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;
        $cleanedText = trim(str_replace(['```json', '```'], '', $generatedText));
        $generatedJson = json_decode($cleanedText, true);

        // Validate JSON structure
        if (json_last_error() !== JSON_ERROR_NONE || !isset($generatedJson['skills'])) {
            \Log::error('Invalid JSON from API', [
                'raw' => $generatedText,
                'error' => json_last_error_msg()
            ]);
            return back()->withErrors(['api_error' => 'Failed to generate resume content. Please try again.']);
        }

         // ✅ Save to session for PDF
         session([
          'resume_data' => $validated,
          'generated_data' => $generatedJson,
          'education' => $validated['education'],
          'experience' => $validated['experience']
      ]);

        return view('resume.resume_display', [
          'userData' => session('resume_data'),
          'generated' => session('generated_data'),
          'education' => session('education'),
          'experience' => session('experience')
      ]);
    }
  public function downloadPDF()
  {
      // Fetch from session
      $userData = session('resume_data');
      $generated = session('generated_data');
      $education = session('education');
      $experience = session('experience');
  
      // Check if the session data is available
      if (!$userData || !$generated || !$education || !$experience) {
          return redirect()->back()->with('error', 'Resume data not found in session.');
      }
  
      // Load PDF view with data
      $pdf = Pdf::loadView('resume.resume_pdf', compact('userData', 'generated', 'education', 'experience'));
  
      // Download the PDF file
      return $pdf->download('resume.pdf');
  }
  


   
    
}

