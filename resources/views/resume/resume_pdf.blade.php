<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>Resume</title>-->
<!--    <style>-->
<!--        :root {-->
<!--            --primary: #667eea;-->
<!--            --secondary: #764ba2;-->
<!--            --light: #f8f9fa;-->
<!--            --lighter: #f0f4ff;-->
<!--            --dark: #2d3748;-->
<!--            --text: #4a5568;-->
<!--            --text-light: #718096;-->
<!--            --border: #e2e8f0;-->
<!--        }-->
        
<!--        body {-->
<!--            font-family: DejaVu Sans, sans-serif;-->
<!--            font-size: 14px;-->
<!--            line-height: 1.6;-->
<!--            color: var(--dark);-->
<!--            background-color: #fff;-->
<!--            margin: 0;-->
<!--            padding: 20px;-->
<!--        }-->
        
<!--        h1 {-->
<!--            color: var(--dark);-->
<!--            font-size: 28px;-->
<!--            margin-bottom: 5px;-->
<!--            border-bottom: 3px solid var(--primary);-->
<!--            padding-bottom: 10px;-->
<!--        }-->
        
<!--        h2 {-->
<!--            color: var(--secondary);-->
<!--            font-size: 20px;-->
<!--            margin-bottom: 10px;-->
<!--            margin-top: 25px;-->
<!--            border-bottom: 1px solid var(--border);-->
<!--            padding-bottom: 5px;-->
<!--        }-->
        
<!--        h3 {-->
<!--            color: var(--dark);-->
<!--            font-size: 16px;-->
<!--            margin-bottom: 8px;-->
<!--            margin-top: 15px;-->
<!--        }-->
        
<!--        .contact-info {-->
<!--            margin-bottom: 20px;-->
<!--            color: var(--text);-->
<!--        }-->
        
<!--        .section {-->
<!--            margin-top: 20px;-->
<!--        }-->
        
<!--        ul {-->
<!--            margin: 0;-->
<!--            padding-left: 18px;-->
<!--        }-->
        
<!--        .experience-item {-->
<!--            margin-bottom: 20px;-->
<!--        }-->
        
<!--        .job-title {-->
<!--            font-weight: bold;-->
<!--            color: var(--dark);-->
<!--        }-->
        
<!--        .company {-->
<!--            color: var(--secondary);-->
<!--            font-weight: 500;-->
<!--        }-->
        
<!--        .period {-->
<!--            color: var(--text-light);-->
<!--            font-style: italic;-->
<!--        }-->
        
<!--        .job-description {-->
<!--            margin-top: 8px;-->
<!--            color: var(--text);-->
<!--        }-->
        
<!--        .skills-category {-->
<!--            margin-bottom: 15px;-->
<!--        }-->
        
<!--        .skill-list li {-->
<!--            margin-bottom: 5px;-->
<!--            position: relative;-->
<!--        }-->
        
<!--        .skill-list li:before {-->
<!--            content: "▹";-->
<!--            color: var(--primary);-->
<!--            position: absolute;-->
<!--            left: -15px;-->
<!--        }-->
        
<!--        .summary {-->
<!--            background-color: var(--lighter);-->
<!--            padding: 15px;-->
<!--            border-left: 4px solid var(--primary);-->
<!--            margin-bottom: 20px;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <h1>{{ $userData['name'] ?? 'Name not provided' }}</h1>-->
    
<!--    <div class="contact-info">-->
<!--        <p>Email: {{ $userData['email'] ?? 'Email not provided' }} | -->
<!--           Phone: {{ $userData['phone'] ?? 'Phone not provided' }} | -->
<!--           @if(isset($userData['address'])) {{ $userData['address'] }} @endif-->
<!--        </p>-->
<!--    </div>-->

<!--    <div class="section summary">-->
<!--        <h2>Summary</h2>-->
<!--        <p>{{ $generated['objective'] ?? 'No summary provided' }}</p>-->
<!--    </div>-->

<!--    <div class="section">-->
<!--        <h2>Education</h2>-->
<!--        @foreach($education as $edu)-->
<!--            <div class="experience-item">-->
<!--                <p>-->
<!--                    <span class="job-title">{{ $edu['degree'] }}</span> - -->
<!--                    <span class="company">{{ $edu['institute'] }}</span> -->
<!--                    <span class="period">({{ $edu['year'] }})</span>-->
<!--                </p>-->
<!--            </div>-->
<!--        @endforeach-->
<!--    </div>-->

<!--    <div class="section">-->
<!--        <h2>Work Experience</h2>-->
<!--        @if(isset($generated['workExperience']) && count($generated['workExperience']) > 0)-->
<!--            @foreach($generated['workExperience'] as $exp)-->
<!--                <div class="experience-item">-->
<!--                    <p>-->
<!--                        <span class="job-title">{{ $exp['position'] ?? 'Position' }}</span> at -->
<!--                        <span class="company">{{ $exp['company'] ?? 'Company' }}</span> -->
<!--                        <span class="period">({{ $exp['year'] ?? 'Year not provided' }})</span>-->
<!--                    </p>-->
<!--                    @if(!empty($exp['description']))-->
<!--                        <div class="job-description">{!! nl2br(e($exp['description'])) !!}</div>-->
<!--                    @endif-->
<!--                    @if(!empty($exp['keyAchievements']))-->
<!--                        <div class="job-description">-->
<!--                            <strong>Key Achievements:</strong><br>-->
<!--                            {!! nl2br(e($exp['keyAchievements'])) !!}-->
<!--                        </div>-->
<!--                    @endif-->
<!--                </div>-->
<!--            @endforeach-->
<!--        @else-->
<!--            @foreach($experience as $exp)-->
<!--                <div class="experience-item">-->
<!--                    <p>-->
<!--                        <span class="job-title">{{ $exp['position'] }}</span> at -->
<!--                        <span class="company">{{ $exp['company'] }}</span> -->
<!--                        <span class="period">({{ $exp['year'] }})</span>-->
<!--                    </p>-->
<!--                </div>-->
<!--            @endforeach-->
<!--        @endif-->
<!--    </div>-->

<!--    <div class="section">-->
<!--        <h2>Skills</h2>-->
<!--        @foreach($generated['skills'] as $skillCategory)-->
<!--            <div class="skills-category">-->
<!--                <h3>{{ $skillCategory['title'] }}</h3>-->
<!--                <ul class="skill-list">-->
<!--                    @foreach($skillCategory['skills'] as $skill)-->
<!--                        <li>{{ $skill }}</li>-->
<!--                    @endforeach-->
<!--                </ul>-->
<!--            </div>-->
<!--        @endforeach-->
<!--    </div>-->
<!--</body>-->
<!--</html>-->



<!---------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8">-->
<!--  <title>Resume</title>-->
<!--  <style>-->
<!--    :root {-->
<!--      --primary: #4e73df;-->
<!--      --accent: #1cc88a;-->
<!--      --text: #2e2e2e;-->
<!--      --muted: #6c757d;-->
<!--      --bg-light: #f8f9fc;-->
<!--      --badge: #eef2ff;-->
<!--    }-->

<!--    body {-->
<!--      font-family: 'Segoe UI', sans-serif;-->
<!--      font-size: 11px;-->
<!--      color: var(--text);-->
<!--      background: #fff;-->
<!--      padding: 25px;-->
<!--      max-width: 800px;-->
<!--      margin: auto;-->
<!--      line-height: 1.4;-->
<!--    }-->

<!--    h1 {-->
<!--      font-size: 20px;-->
<!--      margin-bottom: 4px;-->
<!--      color: var(--primary);-->
<!--    }-->

<!--    h2 {-->
<!--      font-size: 12px;-->
<!--      color: var(--primary);-->
<!--      border-bottom: 1px solid var(--bg-light);-->
<!--      margin-top: 20px;-->
<!--      margin-bottom: 6px;-->
<!--      text-transform: uppercase;-->
<!--    }-->

<!--    h3 {-->
<!--      font-size: 11px;-->
<!--      margin: 3px 0;-->
<!--      font-weight: bold;-->
<!--    }-->

<!--    .contact-info {-->
<!--      font-size: 10px;-->
<!--      color: var(--muted);-->
<!--      margin-bottom: 12px;-->
<!--    }-->

<!--    .summary {-->
<!--      background: var(--bg-light);-->
<!--      padding: 8px 10px;-->
<!--      border-left: 3px solid var(--primary);-->
<!--      font-size: 10px;-->
<!--      margin-bottom: 16px;-->
<!--    }-->

<!--    .container {-->
<!--      display: flex;-->
<!--      gap: 30px;-->
<!--    }-->

<!--    .left, .right {-->
<!--      flex: 1;-->
<!--    }-->

<!--    .section {-->
<!--      margin-bottom: 10px;-->
<!--    }-->

<!--    .job-title {-->
<!--      font-weight: bold;-->
<!--    }-->

<!--    .company {-->
<!--      color: var(--accent);-->
<!--    }-->

<!--    .period {-->
<!--      font-style: italic;-->
<!--      font-size: 10px;-->
<!--      color: var(--muted);-->
<!--    }-->

<!--    .job-description {-->
<!--      margin-top: 3px;-->
<!--      font-size: 10px;-->
<!--    }-->

<!--    ul {-->
<!--      padding-left: 16px;-->
<!--      margin: 0;-->
<!--    }-->

<!--    li {-->
<!--      margin-bottom: 3px;-->
<!--    }-->

<!--    .badge {-->
<!--      display: inline-block;-->
<!--      background: var(--badge);-->
<!--      color: var(--text);-->
<!--      font-size: 10px;-->
<!--      padding: 2px 6px;-->
<!--      margin: 2px 4px 2px 0;-->
<!--      border-radius: 3px;-->
<!--    }-->
<!--  </style>-->
<!--</head>-->
<!--<body>-->

<!--  <h1>{{ $userData['name'] ?? 'Name not provided' }}</h1>-->
<!--  <div class="contact-info">-->
<!--    Email: {{ $userData['email'] ?? 'Not provided' }} |-->
<!--    Phone: {{ $userData['phone'] ?? 'Not provided' }} |-->
<!--    {{ $userData['address'] ?? '' }}-->
<!--  </div>-->

<!--  <div class="summary">-->
<!--    <strong>Summary:</strong> {{ $generated['objective'] ?? 'No summary provided' }}-->
<!--  </div>-->

<!--  <div class="container">-->
    <!-- Left Column -->
<!--    <div class="left">-->
<!--      <h2>Experience</h2>-->
<!--      @foreach($generated['workExperience'] as $exp)-->
<!--        <div class="section">-->
<!--          <h3>{{ $exp['position'] ?? 'Position' }}</h3>-->
<!--          <div><span class="company">{{ $exp['company'] ?? 'Company' }}</span> | <span class="period">{{ $exp['year'] ?? '' }}</span></div>-->
<!--          @if(!empty($exp['description']))-->
<!--            <div class="job-description">{{ $exp['description'] }}</div>-->
<!--          @endif-->
<!--          @if(!empty($exp['keyAchievements']))-->
<!--            <div class="job-description"><strong>Achievements:</strong> {{ $exp['keyAchievements'] }}</div>-->
<!--          @endif-->
<!--        </div>-->
<!--      @endforeach-->
<!--    </div>-->

    <!-- Right Column -->
<!--    <div class="right">-->
<!--      <h2>Education</h2>-->
<!--      @foreach($education as $edu)-->
<!--        <div class="section">-->
<!--          <h3>{{ $edu['degree'] }}</h3>-->
<!--          <div>{{ $edu['institute'] }} | <span class="period">{{ $edu['year'] }}</span></div>-->
<!--        </div>-->
<!--      @endforeach-->

<!--      <h2>Skills</h2>-->
<!--      @foreach($generated['skills'] as $category)-->
<!--        <div class="section">-->
<!--          <h3>{{ $category['title'] }}</h3>-->
<!--          @foreach($category['skills'] as $skill)-->
<!--            <span class="badge">{{ $skill }}</span>-->
<!--          @endforeach-->
<!--        </div>-->
<!--      @endforeach-->
<!--    </div>-->
<!--  </div>-->

<!--</body>-->
<!--</html>-->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resume</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-size: 10.5pt;
      color: #000000;
      background: #ffffff;
      padding: 0.5in;
      max-width: 8.5in;
      margin: 0 auto;
      line-height: 1.4;
    }

    h1 {
      font-size: 16pt;
      margin-bottom: 4px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    h2 {
      font-size: 11pt;
      font-weight: 600;
      /*border-bottom: 1px solid #dddddd;*/
      margin-top: 14pt;
      margin-bottom: 6pt;
      padding-bottom: 2pt;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    h3 {
      font-size: 10.5pt;
      margin: 4px 0 2px 0;
      font-weight: 600;
    }

    .contact-info {
      font-size: 9.5pt;
      color: #333333;
      margin-bottom: 12px;
    }

    .summary {
      padding: 1px 0;
      font-size: 10pt;
      /*margin-bottom: 5pt;*/
    }

    .container {
      display: flex;
      gap: 24px;
    }

    .left, .right {
      flex: 1;
    }

    .section {
      margin-bottom: 4px;
    }

    .job-title {
      font-weight: 600;
    }

    .company {
      font-weight: 500;
    }

    .period {
      font-size: 9.5pt;
      color: #444444;
    }

    .job-description {
      margin-top: 4px;
      font-size: 10pt;
    }

    ul {
      padding-left: 18px;
      margin: 6px 0;
    }

    li {
      margin-bottom: 3px;
      font-size: 10pt;
    }

    .badge {
      display: inline-block;
      background: #f5f5f5;
      color: #000000;
      font-size: 9pt;
      padding: 2px 6px;
      margin: 2px 4px 2px 0;
      border-radius: 2px;
    }

    /* ATS optimization */
    .page-break {
      page-break-after: always;
    }
    
    /* Ensure no fancy elements that might confuse ATS */
    a {
      color: #000000;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>{{ $userData['name'] ?? 'Name not provided' }}</h1>
  <div class="contact-info">
    {{ $userData['email'] ?? 'Not provided' }} | 
    {{ $userData['phone'] ?? 'Not provided' }} | 
    {{ $userData['address'] ?? '' }}
  </div>

  <div class="summary">
    {{ $generated['objective'] ?? 'No summary provided' }}
  </div>

  <div class="container">
    <!-- Left Column -->
    <div class="left">
      <h2>Professional Experience</h2>
      @foreach($generated['workExperience'] as $exp)
        <div class="section">
          <h3>{{ $exp['position'] ?? 'Position' }}</h3>
          <div>
            <span class="company">{{ $exp['company'] ?? 'Company' }}</span> | 
            <span class="period">{{ $exp['year'] ?? '' }}</span>
          </div>
          @if(!empty($exp['description']))
            <div class="job-description">{{ $exp['description'] }}</div>
          @endif
          @if(!empty($exp['keyAchievements']))
            <ul>
              @foreach(explode("\n", $exp['keyAchievements']) as $achievement)
                @if(trim($achievement))
                  <li>{{ trim($achievement) }}</li>
                @endif
              @endforeach
            </ul>
          @endif
        </div>
      @endforeach
    </div>

    <!-- Right Column -->
    <div class="right">
      <h2>Education</h2>
      @foreach($education as $edu)
        <div class="section">
          <h3>{{ $edu['degree'] }}</h3>
          <div>{{ $edu['institute'] }}</div>
          <div class="period">{{ $edu['year'] }}</div>
        </div>
      @endforeach

      <h2>Skills</h2>
      @foreach($generated['skills'] as $category)
        <div class="section">
          <h3>{{ $category['title'] }}</h3>
          @foreach($category['skills'] as $skill)
            <span class="badge">{{ $skill }}</span>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>

</body>
</html>
