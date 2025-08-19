<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Blog | DocCraft PRO</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap');
        
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
            line-height: 1.6;
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
        
        .blog-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            z-index: 1;
            border: 1px solid var(--glass-border);
        }
        
        .blog-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid var(--glass-border);
        }
        
        .blog-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .blog-header p {
            opacity: 0.8;
            font-size: 1rem;
        }
        
        .blog-content {
            padding: 40px;
        }
        
        .blog-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--light);
        }
        
        .blog-body p {
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }
        
        .blog-body h2, .blog-body h3 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-light);
            margin: 2rem 0 1rem;
        }
        
        .blog-body h2 {
            font-size: 1.8rem;
            border-bottom: 1px solid var(--glass-border);
            padding-bottom: 0.5rem;
        }
        
        .blog-body h3 {
            font-size: 1.5rem;
        }
        
        .blog-actions {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--glass-border);
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
        }
        
        .btn-icon {
            font-size: 1.2rem;
        }
        
        /* Custom scrollbar */
        .blog-body {
            max-height: 60vh;
            overflow-y: auto;
            padding-right: 10px;
        }
        
        .blog-body::-webkit-scrollbar {
            width: 8px;
        }
        
        .blog-body::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.3);
            border-radius: 4px;
        }
        
        .blog-body::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }
        
        .blog-body::-webkit-scrollbar-thumb:hover {
            background: var(--primary-light);
        }
        
        @media (max-width: 768px) {
            .blog-header {
                padding: 25px 20px;
            }
            
            .blog-content {
                padding: 30px 20px;
            }
            
            .blog-header h2 {
                font-size: 1.8rem;
            }
            
            .blog-body {
                max-height: none;
                overflow-y: visible;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="blog-container animate-fade">
        <div class="blog-header">
            <h2>Your Generated Blog Post</h2>
            <p>AI-crafted content ready for publishing</p>
        </div>
        
        <div class="blog-content">
            <div class="blog-body">
                {!! nl2br(e($generatedBlog)) !!}
            </div>
            
            <div class="blog-actions">
                <a href="{{ route('blog.downloadPDF') }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf btn-icon"></i> Download PDF
                </a>
            </div>
        </div>
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