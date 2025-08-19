<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover Letter Preview | DocCraft PRO</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
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
        
        .cover-letter-preview {
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
        
        .preview-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 40px;
            text-align: center;
            border-bottom: 1px solid var(--glass-border);
        }
        
        .preview-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .preview-header p {
            opacity: 0.8;
            font-size: 1.1rem;
        }
        
        .letter-content {
            padding: 40px;
        }
        
        .sender-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid var(--glass-border);
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-icon {
            color: var(--primary-light);
            font-size: 1.2rem;
            min-width: 24px;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--light);
            min-width: 80px;
        }
        
        .info-value {
            color: var(--light);
            opacity: 0.9;
        }
        
        .letter-body {
            margin-top: 30px;
            white-space: pre-line;
            line-height: 1.8;
            color: var(--light);
            opacity: 0.95;
        }
        
        .letter-body p {
            margin-bottom: 15px;
        }
        
        .letter-actions {
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
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
        }
        
        .btn-icon {
            font-size: 1.2rem;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        @media (max-width: 768px) {
            .preview-header {
                padding: 30px 20px;
            }
            
            .letter-content {
                padding: 30px 20px;
            }
            
            .sender-info {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            body {
                padding: 20px 15px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="cover-letter-preview animate-fade">
        <div class="preview-header">
            <h1>Your Cover Letter</h1>
            <p>Professionally crafted with AI precision</p>
        </div>
        
        <div class="letter-content">
            <div class="sender-info">
                <div class="info-item">
                    <i class="fas fa-user info-icon"></i>
                    <span class="info-label">Name:</span>
                    <span class="info-value">{{ $coverData['name'] }}</span>
                </div>
                
                <div class="info-item">
                    <i class="fas fa-envelope info-icon"></i>
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $coverData['email'] }}</span>
                </div>
                
                <div class="info-item">
                    <i class="fas fa-phone info-icon"></i>
                    <span class="info-label">Phone:</span>
                    <span class="info-value">{{ $coverData['phone'] }}</span>
                </div>
                
                <div class="info-item">
                    <i class="fas fa-briefcase info-icon"></i>
                    <span class="info-label">Position:</span>
                    <span class="info-value">{{ $coverData['job_title'] }}</span>
                </div>
                
                <div class="info-item">
                    <i class="fas fa-building info-icon"></i>
                    <span class="info-label">Company:</span>
                    <span class="info-value">{{ $coverData['company_name'] }}</span>
                </div>
            </div>
            
            <div class="letter-body">
                {!! nl2br(e($letterContent)) !!}
            </div>
            
            <div class="letter-actions">
                <a href="{{ route('coverLetter.pdf') }}" class="btn btn-primary">
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