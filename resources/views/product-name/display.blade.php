<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Product Names</title>
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
        
        .results-container {
            max-width: 700px;
            margin: 40px auto;
        }
        
        .results-card {
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
            text-align: center;
        }
        
        h3 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .alert-success {
            background-color: rgba(102, 126, 234, 0.1);
            border-color: rgba(102, 126, 234, 0.3);
            color: var(--dark);
            font-weight: 600;
        }
        
        .name-list {
            list-style-type: none;
            padding: 0;
            margin: 25px 0;
            column-count: 2;
            column-gap: 30px;
        }
        
        .name-list li {
            padding: 12px 15px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
            break-inside: avoid;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .btn-new {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-new:hover {
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
        
        @media (max-width: 576px) {
            .name-list {
                column-count: 1;
            }
        }
    </style>
</head>
<body>
<div class="results-container">
    <div class="card results-card">
        <div class="card-header">
            <h3>Generated Product Names</h3>
        </div>
        
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                <strong>Here are your generated product names:</strong>
            </div>
            
            <ul class="name-list">
                @foreach ($generatedNames as $name)
                    <li>{{ $name }}</li>
                @endforeach
            </ul>
            
            <div class="action-buttons">
                <a href="{{ route('product-name.form') }}" class="btn btn-new">
                    Generate New Names
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
        const names = Array.from(document.querySelectorAll('.name-list li'))
            .map(li => li.textContent)
            .join('\n');
        
        navigator.clipboard.writeText(names).then(() => {
            alert('Product names copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy: ', err);
            alert('Failed to copy product names');
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>