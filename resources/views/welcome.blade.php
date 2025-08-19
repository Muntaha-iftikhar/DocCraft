<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocCraft Pro | Create Professional Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon.png') }}">
    <style>
        :root {
            --primary: #6c5ce7;
            --secondary: #a29bfe;
            --dark: #2d3436;
            --light: #f5f6fa;
            --accent: #fd79a8;
            --nebula-blue: #0984e3;
            --nebula-purple: #6c5ce7;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: var(--light);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        .hero-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            z-index: 1;
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
        
        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            background: linear-gradient(90deg, var(--nebula-purple), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
        }
        
        .logo::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--nebula-purple), var(--accent));
            border-radius: 3px;
        }
        
        .main-heading {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            max-width: 800px;
        }
        
        .main-heading span {
            background: linear-gradient(90deg, var(--accent), var(--nebula-blue));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
        }
        
        .tagline {
            font-size: 1.5rem;
            margin-bottom: 3rem;
            max-width: 700px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--nebula-purple), var(--accent));
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }
        
        /* Floating document previews */
        .doc-previews {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 2rem;
            z-index: 1;
        }
        
        .doc-card {
            width: 200px;
            height: 250px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
            transform: rotate(5deg);
            transition: all 0.4s ease;
        }
        
        .doc-card:nth-child(2) {
            transform: rotate(-3deg) translateX(30px);
            z-index: 2;
        }
        
        .doc-card:nth-child(3) {
            transform: rotate(8deg) translateX(-20px);
        }
        
        .doc-card:hover {
            transform: rotate(0deg) scale(1.05);
            z-index: 10;
        }
        
        .doc-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, var(--nebula-purple), var(--accent));
        }
        
        .doc-content {
            padding: 1rem;
            color: var(--dark);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .doc-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--nebula-purple);
        }
        
        .doc-lines {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            flex-grow: 1;
        }
        
        .doc-line {
            height: 4px;
            background: #eee;
            border-radius: 2px;
        }
        
        .doc-line.medium {
            width: 80%;
        }
        
        .doc-line.short {
            width: 60%;
        }
        
        /* Responsive design */
        @media (max-width: 992px) {
            .doc-previews {
                display: none;
            }
            
            .hero-container {
                align-items: center;
                text-align: center;
            }
            
            .main-heading {
                font-size: 2.5rem;
            }
            
            .tagline {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="hero-container">
        <div class="logo">DocCraft Pro</div>
        <h1 class="main-heading">Create <span>Stunning Documents</span> in Minutes</h1>
        <p class="tagline">Your all-in-one solution for professional resumes, presentations, and cover letters. Designed to impress.</p>
        
        <div class="cta-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary">
                <i class="fas fa-user-plus"></i> Sign Up
            </a>
        </div>
        
        <div class="doc-previews">
            <div class="doc-card">
                <div class="doc-content">
                    <div class="doc-title">Resume Template</div>
                    <div class="doc-lines">
                        <div class="doc-line"></div>
                        <div class="doc-line medium"></div>
                        <div class="doc-line short"></div>
                        <div class="doc-line"></div>
                        <div class="doc-line medium"></div>
                        <div class="doc-line"></div>
                        <div class="doc-line short"></div>
                    </div>
                </div>
            </div>
            <div class="doc-card">
                <div class="doc-content">
                    <div class="doc-title">Presentation</div>
                    <div class="doc-lines">
                        <div class="doc-line"></div>
                        <div class="doc-line short"></div>
                        <div class="doc-line medium"></div>
                        <div class="doc-line"></div>
                        <div class="doc-line short"></div>
                        <div class="doc-line"></div>
                    </div>
                </div>
            </div>
            <div class="doc-card">
                <div class="doc-content">
                    <div class="doc-title">Cover Letter</div>
                    <div class="doc-lines">
                        <div class="doc-line medium"></div>
                        <div class="doc-line short"></div>
                        <div class="doc-line"></div>
                        <div class="doc-line short"></div>
                        <div class="doc-line medium"></div>
                        <div class="doc-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Create nebula particles
        document.addEventListener('DOMContentLoaded', function() {
            const nebulaBg = document.getElementById('nebulaBg');
            const particleCount = 30;
            
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
                particle.style.opacity = Math.random() * 0.5 + 0.1;
                
                nebulaBg.appendChild(particle);
            }
        });
    </script>
</body>
</html>