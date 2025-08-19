<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Email | DocCraft PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            color: var(--light);
            display: flex;
            align-items: center;
            padding: 20px;
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
        
        .email-display-container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .email-card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--glass-border);
            overflow: hidden;
            padding: 2.5rem;
        }
        
        h2 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            font-size: 1.8rem;
            background: linear-gradient(90deg, var(--primary-light), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        h2:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            bottom: -8px;
            left: 0;
        }
        
        .email-content {
            padding: 1.5rem;
            line-height: 1.7;
            white-space: pre-wrap;
            background: rgba(15, 23, 42, 0.5);
            border-radius: 8px;
            border-left: 3px solid var(--secondary);
            color: var(--light);
            font-size: 1rem;
            margin-bottom: 2rem;
        }
        
        .btn-another {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .btn-another:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
            color: white;
        }
        
        .text-center {
            text-align: center;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .email-card {
                padding: 1.5rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .email-content {
                padding: 1rem;
                font-size: 0.95rem;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 15px;
            }
            
            .email-card {
                padding: 1.25rem;
            }
            
            h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="container py-4">
        <div class="email-display-container">
            <div class="email-card">
                <h2>Generated Email</h2>
                
                <div class="email-content">
                    {!! nl2br(e($email)) !!}
                </div>
                
                <div class="text-center">
                    <a href="{{ route('email.form') }}" class="btn-another">
                        <i class="fas fa-envelope"></i> Generate Another Email
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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