<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meeting Transcript</title>
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --text: #2d3748;
            --light-gray: #f8f9fa;
        }
        
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: var(--text);
            margin: 1.5cm;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary);
        }
        
        h2 {
            color: var(--primary);
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .meta {
            margin-bottom: 25px;
            background-color: var(--light-gray);
            padding: 12px 15px;
            border-radius: 5px;
            border-left: 4px solid var(--secondary);
        }
        
        .meta p {
            margin: 5px 0;
            font-size: 11px;
        }
        
        .meta strong {
            color: var(--secondary);
            min-width: 90px;
            display: inline-block;
        }
        
        .transcript {
            white-space: pre-line;
            font-size: 11px;
            line-height: 1.7;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            font-size: 9px;
            text-align: center;
            color: #666;
        }
        
        @page {
            margin: 1.5cm;
            size: A4;
        }
        
        @page :first {
            margin-top: 2cm;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>MEETING TRANSCRIPT</h2>
    </div>

    <div class="meta">
        <p><strong>Meeting Title:</strong> {{ session('transcript_data.title') }}</p>
        <p><strong>Date:</strong> {{ session('transcript_data.date') }}</p>
        <p><strong>Time:</strong> {{ session('transcript_data.time') }}</p>
        <p><strong>Participants:</strong> {{ session('transcript_data.participants') }}</p>
    </div>

    <div class="transcript">
        {!! nl2br(e($transcriptContent)) !!}
    </div>

    <div class="footer">
        <p>Generated on {{ date('F j, Y \a\t g:i A') }} | Confidential</p>
    </div>

</body>
</html>