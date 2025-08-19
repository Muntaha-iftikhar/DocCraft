<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description Generator | DocCraft PRO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6c5ce7;
            --primary-light: #a29bfe;
            --primary-dark: #4b3cb3;
            --secondary: #fd79a8;
            --accent: #00cec9;
            --dark: #2d3436;
            --darker: #1e272e;
            --light: #f5f6fa;
            --glass: rgba(30, 41, 59, 0.5);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            padding: 40px 20px;
            color: var(--light);
            position: relative;
            overflow-x: hidden;
        }

        /* Nebula Background Elements */
        .nebula-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .nebula-particle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(166, 142, 255, 0.8) 0%, rgba(166, 142, 255, 0) 70%);
            filter: blur(1px);
            animation: float infinite alternate ease-in-out;
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); }
            100% { transform: translateY(-20px) translateX(20px); }
        }

        .product-description-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            z-index: 1;
            border: 1px solid var(--glass-border);
        }

        .product-description-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        }

        .form-header {
            text-align: center;
            padding: 40px 40px 20px;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-header p {
            color: var(--light);
            opacity: 0.8;
        }

        .form-content {
            padding: 0 40px 40px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--light);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(253, 121, 168, 0.2);
            background: rgba(255, 255, 255, 0.15);
        }

        .submit-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        }

        .hidden-token {
            position: absolute;
            opacity: 0;
            height: 0;
            width: 0;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .form-content {
                padding: 0 20px 30px;
            }

            .form-header {
                padding: 30px 20px 15px;
            }

            .form-header h2 {
                font-size: 1.8rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="product-description-container animate-fade">
        <div class="form-header">
            <h2>Product Description Generator</h2>
            <p>Fill in your details to create a compelling product description</p>
        </div>
        
        <form action="{{ route('product.description.generate') }}" method="POST" class="form-content">
            <!-- Hidden CSRF Token (visually hidden but still functional) -->
            <div class="hidden-token">
                @csrf
            </div>
            
            <div class="form-group">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" required placeholder="Enter product name">
            </div>
            
            <div class="form-group">
                <label class="form-label">Product Type / Category</label>
                <input type="text" name="product_type" class="form-control" required placeholder="e.g., Electronics, Fashion, Home Decor">
            </div>
            
            <div class="form-group">
                <label class="form-label">Target Audience</label>
                <input type="text" name="target_audience" class="form-control" required placeholder="e.g., Young professionals, Parents, Tech enthusiasts">
            </div>
            
            <div class="form-group">
                <label class="form-label">Key Features (comma-separated)</label>
                <textarea name="features" class="form-control" rows="4" required placeholder="Enter key features separated by commas"></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Tone</label>
                <select name="tone" class="form-control" required>
                    <option value="" disabled selected>Select a tone</option>
                    <option value="Professional">Professional</option>
                    <option value="Friendly">Friendly</option>
                    <option value="Persuasive">Persuasive</option>
                    <option value="Casual">Casual</option>
                    <option value="Exciting">Exciting</option>
                </select>
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-magic submit-icon"></i> Generate Description
            </button>
        </form>
    </div>

    <script>
        // Create nebula particles
        document.addEventListener('DOMContentLoaded', function() {
            const nebulaBg = document.getElementById('nebulaBg');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('nebula-particle');
                
                // Random size between 50px and 200px
                const size = Math.random() * 150 + 50;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random animation duration and delay
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 10;
                particle.style.animation = `float ${duration}s ${delay}s infinite alternate ease-in-out`;
                
                // Random opacity
                particle.style.opacity = Math.random() * 0.3 + 0.1;
                
                nebulaBg.appendChild(particle);
            }
        });
    </script>
</body>
</html>
