<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Preview</title>
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
        
        .preview-container {
            max-width: 900px;
            margin: 40px auto;
        }
        
        .preview-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        h2 {
            color: var(--primary);
            font-weight: 700;
            font-size: 2rem;
        }
        
        .article-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 20px;
        }
        
        h3 {
            font-weight: 700;
            margin: 0;
            font-size: 1.6rem;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .meta-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .meta-item {
            flex: 1;
            min-width: 150px;
        }
        
        .meta-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        
        .meta-value {
            color: var(--text);
            font-size: 1rem;
        }
        
        .article-content {
            line-height: 1.8;
            color: var(--dark);
            white-space: pre-wrap;
            margin-bottom: 30px;
        }
        
        .btn-download {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-right: 15px;
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
        }
        
        .btn-copy:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.2);
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
<div class="preview-container">
    <div class="preview-header">
        <h2>Generated Article Preview</h2>
    </div>
    
    <div class="card article-card">
        <div class="card-header">
            <h3>{{ $articleData['title'] ?? 'Untitled Article' }}</h3>
        </div>
        
        <div class="card-body">
            <div class="meta-info">
                <div class="meta-item">
                    <div class="meta-label">Topic</div>
                    <div class="meta-value">{{ $articleData['subject'] }}</div>
                </div>
                
                <div class="meta-item">
                    <div class="meta-label">Audience</div>
                    <div class="meta-value">{{ ucfirst(str_replace('_', ' ', $articleData['audience'])) }}</div>
                </div>
                
                <div class="meta-item">
                    <div class="meta-label">Tone</div>
                    <div class="meta-value">{{ ucfirst($articleData['tone']) }}</div>
                </div>
                
                <div class="meta-item">
                    <div class="meta-label">Length</div>
                    <div class="meta-value">{{ $articleData['length'] ? ucfirst($articleData['length']) : 'Not specified' }}</div>
                </div>
            </div>
            
            <div class="article-content">
                <h4 class="mb-4" style="color: var(--secondary);">Article Content</h4>
                <div style="white-space: pre-wrap;">{{ $generatedArticle }}</div>
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('article.download') }}" class="btn btn-download">
                    Download as PDF
                </a>
                <button class="btn btn-copy" onclick="copyToClipboard()">
                    Copy to Clipboard
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
        const content = document.querySelector('.article-content div').textContent;
        navigator.clipboard.writeText(content).then(() => {
            alert('Article content copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>