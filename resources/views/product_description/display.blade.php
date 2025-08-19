<!DOCTYPE html>
<html>
<head>
    <title>Product Description</title>
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
        
        .card {
            border: none;
            border-left: 4px solid var(--primary);
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
        }
        
        h2 {
            color: var(--secondary);
            font-weight: 600;
            position: relative;
            margin-bottom: 2rem;
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
        
        .btn-back {
            background-color: var(--secondary);
            border-color: var(--secondary);
            color: white;
            font-weight: 500;
            padding: 0.5rem 1.75rem;
            transition: all 0.3s ease;
        }
        
        .btn-back:hover {
            background-color: #5d3a8a;
            border-color: #5d3a8a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(118, 75, 162, 0.2);
        }
        
        .description-content {
            line-height: 1.8;
            font-size: 1.05rem;
        }
        
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="text-center">Generated Product Description</h2>
            
            <div class="card shadow-lg p-4 p-md-5 mb-4">
                <div class="description-content">
                    {!! nl2br(e($description)) !!}
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('product.description.form') }}" class="btn btn-back">
                    Generate Another Description
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>