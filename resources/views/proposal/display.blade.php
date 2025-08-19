<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Proposal</title>
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
            color: var(--text);
        }
        
        .proposal-container {
            border: none;
            border-left: 4px solid var(--primary);
            background-color: white;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            transition: transform 0.3s ease;
        }
        
        .proposal-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }
        
        h2 {
            color: var(--secondary);
            font-weight: 600;
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        h2:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }
        
        .proposal-content {
            line-height: 1.8;
            font-size: 1.05rem;
            color: var(--dark);
        }
        
        .proposal-content p {
            margin-bottom: 1.2rem;
        }
        
        .btn-another {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 500;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-another:hover {
            background: linear-gradient(135deg, #5a6fd1, #6a4092);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(118, 75, 162, 0.3);
        }
        
        .error-message {
            color: #e53e3e;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="proposal-container p-4 p-md-5 mb-4">
                <h2>Generated Proposal</h2>
                
                @if(session('proposal_text'))
                    <div class="proposal-content">
                        {!! nl2br(e(session('proposal_text'))) !!}
                    </div>
                @else
                    <p class="error-message">No proposal found. Please try again.</p>
                @endif
                
                <div class="text-center mt-5">
                    <a href="{{ route('proposal.form') }}" class="btn btn-another">
                        Generate Another Proposal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>