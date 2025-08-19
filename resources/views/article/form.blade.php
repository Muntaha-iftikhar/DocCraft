<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Generator</title>
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
        
        .article-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .article-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 25px 30px;
            text-align: center;
        }
        
        h2 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .article-body {
            padding: 30px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%234a5568' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px 12px;
        }
        
        textarea.form-control {
            min-height: 120px;
        }
        
        .btn-generate {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1.1rem;
            margin-top: 10px;
        }
        
        .btn-generate:hover {
            background: linear-gradient(135deg, #5a6fd1, #6a4092);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
        }
        
        .form-group {
            margin-bottom: 1.75rem;
        }
        
        .optional-badge {
            background-color: #e2e8f0;
            color: var(--text);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 4px;
            margin-left: 8px;
        }
    </style>
</head>
<body>
<div class="article-container">
    <div class="article-header">
        <h2>Generate Your Article</h2>
    </div>
    
    <div class="article-body">
        <form action="{{ route('article.generate') }}" method="POST">
            @csrf

            <!-- Article Title -->
            <div class="form-group">
                <label for="title" class="form-label">
                    Article Title 
                    <span class="optional-badge">Optional</span>
                </label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter your article title">
            </div>

            <!-- Topic/Subject -->
            <div class="form-group">
                <label for="subject" class="form-label">Topic/Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required placeholder="What is your article about?">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Target Audience -->
                    <div class="form-group">
                        <label for="audience" class="form-label">Target Audience</label>
                        <select class="form-control" id="audience" name="audience" required>
                            <option value="" disabled selected>Select audience</option>
                            <option value="general_public" {{ old('audience') == 'general_public' ? 'selected' : '' }}>General Public</option>
                            <option value="marketing_professionals" {{ old('audience') == 'marketing_professionals' ? 'selected' : '' }}>Marketing Professionals</option>
                            <option value="small_business_owners" {{ old('audience') == 'small_business_owners' ? 'selected' : '' }}>Small Business Owners</option>
                            <option value="students" {{ old('audience') == 'students' ? 'selected' : '' }}>Students</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Tone -->
                    <div class="form-group">
                        <label for="tone" class="form-label">Tone</label>
                        <select class="form-control" id="tone" name="tone" required>
                            <option value="" disabled selected>Select tone</option>
                            <option value="formal" {{ old('tone') == 'formal' ? 'selected' : '' }}>Formal</option>
                            <option value="informal" {{ old('tone') == 'informal' ? 'selected' : '' }}>Informal</option>
                            <option value="professional" {{ old('tone') == 'professional' ? 'selected' : '' }}>Professional</option>
                            <option value="friendly" {{ old('tone') == 'friendly' ? 'selected' : '' }}>Friendly</option>
                            <option value="educational" {{ old('tone') == 'educational' ? 'selected' : '' }}>Educational</option>
                            <option value="persuasive" {{ old('tone') == 'persuasive' ? 'selected' : '' }}>Persuasive</option>
                            <option value="inspirational" {{ old('tone') == 'inspirational' ? 'selected' : '' }}>Inspirational</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Article Length -->
            <div class="form-group">
                <label for="length" class="form-label">
                    Article Length 
                    <span class="optional-badge">Optional</span>
                </label>
                <select class="form-control" id="length" name="length">
                    <option value="" disabled selected>Select length</option>
                    <option value="short" {{ old('length') == 'short' ? 'selected' : '' }}>Short (500-800 words)</option>
                    <option value="medium" {{ old('length') == 'medium' ? 'selected' : '' }}>Medium (800-1500 words)</option>
                    <option value="long" {{ old('length') == 'long' ? 'selected' : '' }}>Long (1500-3000 words)</option>
                </select>
            </div>

            <!-- SEO Keywords -->
            <div class="form-group">
                <label for="keywords" class="form-label">
                    SEO Keywords 
                    <span class="optional-badge">Optional</span>
                </label>
                <input type="text" class="form-control" id="keywords" name="keywords" value="{{ old('keywords') }}" placeholder="Comma separated keywords">
            </div>

            <!-- Article Outline -->
            <div class="form-group">
                <label for="outline" class="form-label">
                    Article Outline 
                    <span class="optional-badge">Optional</span>
                </label>
                <textarea class="form-control" id="outline" name="outline" rows="4" placeholder="Enter any specific outline or structure you'd like">{{ old('outline') }}</textarea>
            </div>

            <button type="submit" class="btn btn-generate">
                Generate Article
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>