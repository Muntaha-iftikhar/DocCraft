<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Ideas Generated</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        
        .ideas-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .ideas-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border-top: 4px solid var(--primary);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem 2rem;
        }
        
        h2 {
            font-weight: 700;
            margin: 0;
            text-align: center;
        }
        
        .card-body {
            padding: 2.5rem;
        }
        
        .ideas-content {
            background: #f9fafc;
            border-radius: 10px;
            padding: 2rem;
            border-left: 4px solid var(--accent);
            white-space: pre-wrap;
            line-height: 1.8;
            font-size: 1.05rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--text);
        }
        
        .btn-try-again {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 2rem;
            text-decoration: none;
        }
        
        .btn-try-again:hover {
            background: linear-gradient(135deg, #5a6fd1, #6a4092);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
            color: white;
        }
        
        .btn-try-again svg {
            transition: transform 0.3s ease;
        }
        
        .btn-try-again:hover svg {
            transform: rotate(-180deg);
        }
    </style>
</head>
<body>
<div class="container ideas-container">
    <div class="ideas-card">
        <div class="card-header">
            <h2>Your Business Ideas</h2>
        </div>
        <div class="card-body">
            @if(session('business_ideas'))
                <div class="ideas-content">
                    {!! nl2br(e(session('business_ideas'))) !!}
                </div>
                
                <div class="text-center">
                    <a href="{{ route('business.idea.form') }}" class="btn-try-again">
                        Generate More Ideas
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 12h20M12 2l10 10-10 10"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="empty-state">
                    <h3>No Business Ideas Yet</h3>
                    <p>Let's generate some amazing business ideas for you!</p>
                    <a href="{{ route('business.idea.form') }}" class="btn-try-again">
                        Start Generating
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>