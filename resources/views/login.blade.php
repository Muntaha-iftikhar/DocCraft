<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DocCraft Pro</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon.png') }}">
    <style>
        :root {
            --primary: #6c5ce7;
            --secondary: #a29bfe;
            --accent: #fd79a8;
            --nebula-blue: #0984e3;
            --dark: #2d3436;
            --light: #f5f6fa;
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            color: var(--light);
            position: relative;
            overflow: scroll;
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
        
        .login-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 480px;
            padding: 3rem;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            font-weight: 400;
        }
        
        .login-form {
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .input-field {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            font-size: 0.9375rem;
            transition: all 0.3s ease;
            color: white;
        }
        
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(253, 121, 168, 0.2);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 2.5rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: var(--accent);
        }
        
        .forgot-password a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .forgot-password a:hover {
            color: var(--accent);
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.875rem;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .social-button {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 1.2rem;
            transition: all 0.2s ease;
        }
        
        .social-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        .register-link {
            text-align: center;
            font-size: 0.9375rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .register-link a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
        }
        
        .register-link a:hover {
            color: var(--accent);
            text-decoration: underline;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9375rem;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }
        
        .alert-danger ul {
            list-style-type: none;
            margin-top: 0.5rem;
            padding-left: 1rem;
        }
        
        .alert-danger li {
            margin-bottom: 0.25rem;
            position: relative;
        }
        
        .alert-danger li::before {
            content: "•";
            position: absolute;
            left: -0.75rem;
        }
        
        .alert-success {
            background-color: rgba(25, 135, 84, 0.2);
            color: #51cf66;
            border: 1px solid rgba(25, 135, 84, 0.3);
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 2rem 1.5rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="logo-text">DocCraft Pro</div>
            </div>
            <h1 class="login-title">Welcome back</h1>
            <p class="login-subtitle">Sign in your workspace</p>
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="input-field" 
                       placeholder="you@example.com" required value="{{ old('email') }}">
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" 
                       class="input-field" placeholder="••••••••" required>
            </div>
            
            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="forgot-password">
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
            </div>
            
            <button type="submit" class="login-button">Sign In</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Login failed</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="divider">or continue with</div>
        
        <div class="social-login">
            <a href="#" class="social-button">
                <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-button">
                <i class="fab fa-apple"></i>
            </a>
            <a href="#" class="social-button">
                <i class="fab fa-microsoft"></i>
            </a>
        </div>
        
        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>

    <script>
        // Create nebula particles
        document.addEventListener('DOMContentLoaded', function() {
            const nebulaBg = document.getElementById('nebulaBg');
            const particleCount = 20;
            
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