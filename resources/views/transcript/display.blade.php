<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Transcript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --accent: #ff7e5f;
            --light: #f8f9fa;
            --dark: #2d3748;
            --text: #4a5568;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            padding: 20px;
        }
        
        .transcript-container {
            max-width: 800px;
            margin: 40px auto;
        }
        
        .transcript-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 25px;
            border-radius: 12px 12px 0 0;
            margin-bottom: 0;
        }
        
        h2 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
            text-align: center;
        }
        
        .meta-info {
            background: white;
            padding: 25px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .meta-item {
            margin-bottom: 8px;
            font-size: 1rem;
        }
        
        .meta-label {
            font-weight: 600;
            color: var(--primary);
        }
        
        .transcript-content {
            background: white;
            padding: 30px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            white-space: pre-line;
            line-height: 1.8;
        }
        
        .action-buttons {
            margin-top: 30px;
            text-align: center;
        }
        
        .btn-download {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-download:hover {
            background: linear-gradient(135deg, #5a6fd1, #6a4092);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
            color: white;
        }
        
        .btn-copy {
            background: white;
            border: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-left: 15px;
        }
        
        .btn-copy:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.2);
        }
    </style>
</head>
<body>
<div class="transcript-container">
    <div class="transcript-header">
        <h2>Generated Transcript</h2>
    </div>
    
    <div class="meta-info">
        <div class="meta-item">
            <span class="meta-label">Meeting Title:</span> {{ $transcriptData['title'] }}
        </div>
        <div class="meta-item">
            <span class="meta-label">Date:</span> {{ $transcriptData['date'] }}
        </div>
        <div class="meta-item">
            <span class="meta-label">Time:</span> {{ $transcriptData['time'] }}
        </div>
        <div class="meta-item">
            <span class="meta-label">Participants:</span> {{ $transcriptData['participants'] }}
        </div>
    </div>
    
    <div class="transcript-content">
        {!! nl2br(e($generatedTranscript)) !!}
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('transcript.download') }}" class="btn btn-download">
            Download as PDF
        </a>
        <button class="btn btn-copy" onclick="copyToClipboard()">
            Copy Transcript
        </button>
    </div>
</div>

<script>
    function copyToClipboard() {
        const transcript = document.querySelector('.transcript-content').textContent;
        navigator.clipboard.writeText(transcript).then(() => {
            alert('Transcript copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy: ', err);
            alert('Failed to copy transcript');
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>