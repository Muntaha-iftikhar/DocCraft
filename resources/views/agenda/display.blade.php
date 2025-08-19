<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Meeting Agenda</title>
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
            background-color: var(--light);
            color: var(--dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .agenda-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 15px;
        }
        
        .agenda-display {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
            border-left: 4px solid var(--primary);
        }
        
        h2 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .btn-download {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-download:hover {
            background: linear-gradient(135deg, #5a6fd1, #6a4092);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
            color: white;
        }
        
        .btn-another {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .btn-another:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .agenda-content {
            white-space: pre-wrap;
            font-family: 'Courier New', Courier, monospace;
            line-height: 1.6;
            color: var(--dark);
            background-color: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>
<div class="agenda-container">
    <h2 class="text-center">Generated Meeting Agenda</h2>

    <div class="agenda-display mb-4">
        <div class="agenda-content">{{ $generatedAgenda }}</div>
    </div>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('agenda.download') }}" class="btn btn-download">
            Download PDF
        </a>
        <a href="{{ route('agenda.form') }}" class="btn-another d-flex align-items-center">
            Generate Another
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>