<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Outline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            min-height: 100vh;
            padding: 2rem 0;
        }
        
        .outline-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .outline-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.1);
            border-left: 4px solid var(--primary);
            overflow: hidden;
        }
        
        h2 {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            text-align: center;
        }
        
        h2:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .course-meta {
            background: #f5f7ff;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            border: 1px solid #e2e8f0;
        }
        
        .course-meta strong {
            color: var(--dark);
            min-width: 120px;
            display: inline-block;
        }
        
        .outline-content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            line-height: 1.7;
            white-space: pre-wrap;
            font-size: 1.05rem;
        }
        
        .btn-download {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 500;
            padding: 0.9rem 1.75rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }
        
        .btn-download:hover {
            background: linear-gradient(135deg, #5a6fd1, #6a4092);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
            color: white;
        }
        
        .btn-download svg {
            transition: transform 0.3s ease;
        }
        
        .btn-download:hover svg {
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="outline-container">
        <div class="outline-card p-4 p-md-5">
            <h2>Generated Course Outline</h2>
            
            <div class="course-meta">
                <div><strong>Course Title:</strong> {{ $outlineData['course_title'] }}</div>
                <div><strong>Audience:</strong> {{ $outlineData['audience'] }}</div>
                <div><strong>Duration:</strong> {{ $outlineData['duration'] }}</div>
                <div><strong>Main Goal:</strong> {{ $outlineData['main_goal'] }}</div>
            </div>
            
            <div class="outline-content">
                {{ $generatedOutline }}
            </div>
            
            <div class="text-center">
                <a href="{{ route('course.download') }}" class="btn-download">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download as PDF
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>