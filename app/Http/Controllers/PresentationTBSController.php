<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PresentationTBSController extends Controller
{
    // Show the input form
    public function showForm()
    {
        return view('presentation_tbs.form');
    }

    // Generate slide content from Gemini API and save in session
    public function generate(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'audience' => 'required|string',
            'slides' => 'required|integer|min:3|max:15',
            'detail' => 'required|in:simple,detailed',
        ]);

        $prompt = <<<PROMPT
Create a {$request->detail} presentation on the topic "{$request->topic}" for {$request->audience}.
Make {$request->slides} slides.
Return STRICT JSON format ONLY:
[{
  "title": "string",
  "content": "string (bullet points with '\\n- ' for simple, paragraph for detailed)"
}]
PROMPT;

        try {
            $client = new Client();
            $response = $client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . env('GEMINI_API_KEY'), [
                'json' => [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]]
                    ]
                ],
                'timeout' => 30
            ]);

            $body = json_decode($response->getBody(), true);
            $text = $body['candidates'][0]['content']['parts'][0]['text'] ?? '';
            $cleanJson = $this->sanitize($text);
            $slides = json_decode($cleanJson, true);

            if (!is_array($slides)) {
                throw new \Exception('Invalid slide data format.');
            }

            // ✅ Convert keys to match OpenTBS template placeholders
            $slides = array_map(function ($slide) {
                return [
                    'Title' => $slide['title'] ?? '',
                    'Content' => $slide['content'] ?? '',
                ];
            }, $slides);

            if (count($slides) !== (int)$request->slides) {
                throw new \Exception('Slide count mismatch.');
            }

            session(['tbs_slides' => $slides]);

            return redirect()->route('tbs.preview');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to generate slides: ' . $e->getMessage());
        }
    }

    // Sanitize Gemini JSON response to extract clean JSON array
    private function sanitize(string $json): string
    {
        $json = trim($json);
        $json = preg_replace('/^[^\[{]+/', '', $json);  // Remove characters before first [ or {
        $json = preg_replace('/[^\]}]+$/', '', $json);  // Remove characters after last ] or }
        return $json;
    }

    // Preview generated slide data
    public function preview()
    {
        $slides = session('tbs_slides');
        if (!$slides) {
            return redirect()->route('tbs.form')->with('error', 'No presentation data found. Generate first.');
        }
        return view('presentation_tbs.preview', compact('slides'));
    }
    
    
    
    public function showTemplates()
        {
            $slides = session('tbs_slides');
            if (!$slides) {
                return redirect()->route('tbs.form')->with('error', 'No slide data found.');
            }
        
            // Define available templates (filename and display name)
            $templates = [
                ['file' => 'simple_template.pptx', 'name' => 'simple theme'],
                ['file' => 'modern_template.pptx', 'name' => 'modern theme'],
                ['file' => 'clean_corporate_template.pptx', 'name' => 'clean theme'],
                ['file' => 'creative_dark_template.pptx', 'name' => 'Dark theme'],
            ];
        
            return view('presentation_tbs.templates', compact('templates'));
        }






    // Generate and download PPTX using OpenTBS
   public function download(Request $request)
{
    $slides = session('tbs_slides');
    if (!$slides) {
        return back()->with('error', 'No slides data found.');
    }

    $request->validate([
        'template' => 'required|string',
    ]);

    include_once base_path('vendor/tinybutstrong/tinybutstrong/tbs_class.php');
    include_once base_path('vendor/tinybutstrong/opentbs/tbs_plugin_opentbs.php');

    $TBS = new \clsTinyButStrong();
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

    // ✅ Use selected template
    $templatePath = storage_path('app/templates/' . $request->template);
    if (!file_exists($templatePath)) {
        return back()->with('error', 'Selected template not found.');
    }

    $TBS->LoadTemplate($templatePath, OPENTBS_ALREADY_UTF8);

    // Remove extra slides if needed
    $totalSlides = $TBS->PlugIn(OPENTBS_COUNT_SLIDES);
    $neededSlides = count($slides);
    if ($neededSlides < $totalSlides) {
        $TBS->PlugIn(OPENTBS_DELETE_SLIDES, range($neededSlides + 1, $totalSlides));
    }

    // Merge slide content
    foreach ($slides as $index => $slideData) {
        $slideNum = $index + 1;
        $TBS->PlugIn(OPENTBS_SELECT_SLIDE, $slideNum);
        $TBS->MergeField('a', $slideData);
    }

    $outputFile = storage_path('app/public/generated_openTBS_presentation.pptx');
    $TBS->Show(OPENTBS_FILE, $outputFile);

    return response()->download($outputFile)->deleteFileAfterSend();
}

}
