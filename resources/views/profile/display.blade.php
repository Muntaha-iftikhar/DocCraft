<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Summary | DocCraft PRO</title>
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
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
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
        
        .container {
            max-width: 800px;
            width: 100%;
            position: relative;
            z-index: 1;
        }
        
        .card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--glass-border);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 25px;
            text-align: center;
            border-bottom: 1px solid var(--glass-border);
        }
        
        .card-header h3 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .alert-success {
            background-color: rgba(16, 185, 129, 0.2);
            border-color: rgba(16, 185, 129, 0.3);
            color: #00cec9;
            font-weight: 500;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 10px;
        }
        
        .lead {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            padding: 20px;
            line-height: 1.7;
            white-space: pre-line;
            margin-top: 20px;
            color: var(--light);
        }
        
        hr {
            border-color: var(--glass-border);
            margin: 25px 0;
            opacity: 0.5;
        }
        
        .form-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #fdcb6e, #e17055);
            border: none;
            color: var(--dark);
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #fabd4a, #d35400);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, var(--accent), var(--primary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-info:hover {
            background: linear-gradient(135deg, #00b894, var(--primary-dark));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 184, 148, 0.3);
        }
        
        @media (max-width: 768px) {
            .card-header {
                padding: 20px;
            }
            
            .card-header h3 {
                font-size: 1.5rem;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .form-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-warning, .btn-info {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Your Profile Summary</h3>
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <strong><i class="fas fa-check-circle me-2"></i>Generated Profile Summary:</strong>
                </div>
                <p class="lead">{{ $profileSummary }}</p>

                <hr>

                <div class="form-group">
                    <a href="{{ route('profile.form') }}" class="btn btn-warning">
                        <i class="fas fa-sync-alt me-2"></i>Regenerate Summary
                    </a>
                    <button class="btn btn-info" onclick="copyToClipboard()">
                        <i class="fas fa-copy me-2"></i>Copy to Clipboard
                    </button>
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

        function copyToClipboard() {
            var text = document.querySelector(".lead").innerText;
            navigator.clipboard.writeText(text).then(function() {
                alert("Profile summary copied to clipboard!");
            }, function() {
                alert("Failed to copy profile summary.");
            });
        }
    </script>
</body>
</html>