<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Name Generator</title>
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
        
        .product-generator {
            max-width: 600px;
            margin: 40px auto;
        }
        
        .product-card {
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
<div class="product-generator">
    <div class="card product-card">
        <div class="card-header">
            <h3>Product Name Generator</h3>
        </div>
        
        <div class="card-body">
            <form action="{{ route('product-name.generate') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="product_type" class="form-label">Product Type</label>
                    <input type="text" name="product_type" id="product_type" class="form-control" required placeholder="e.g., Smartwatch, Protein Powder, Mobile App">
                </div>

                <div class="form-group">
                    <label for="industry" class="form-label">Industry</label>
                    <input type="text" name="industry" id="industry" class="form-control" required placeholder="e.g., Technology, Fitness, Finance">
                </div>

                <div class="form-group">
                    <label for="audience" class="form-label">
                        Target Audience 
                        <span class="optional-badge">Optional</span>
                    </label>
                    <input type="text" name="audience" id="audience" class="form-control" placeholder="e.g., Teenagers, Entrepreneurs, Seniors">
                </div>

                <div class="form-group">
                    <label for="tone" class="form-label">Naming Tone</label>
                    <select name="tone" id="tone" class="form-control" required>
                        <option value="" disabled selected>Select a tone</option>
                        <option value="professional">Professional</option>
                        <option value="fun">Fun & Playful</option>
                        <option value="innovative">Innovative</option>
                        <option value="luxury">Luxury</option>
                        <option value="modern">Modern</option>
                        <option value="eco">Eco-Friendly</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-generate">
                    Generate Product Names
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>