<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | DocCraft Pro</title>
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
            /*overflow: hidden;*/
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
        
        .signup-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 520px;
            padding: 3rem;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .signup-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
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
        
        .signup-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .signup-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            font-weight: 400;
        }
        
        .signup-form {
            margin-bottom: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
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
            padding: 0.875rem 1rem;
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
        
        select.input-field {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }
        
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .signup-button {
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
            margin-top: 1rem;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .signup-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
        }
        
        .login-link {
            text-align: center;
            font-size: 0.9375rem;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 1.5rem;
        }
        
        .login-link a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
        }
        
        .login-link a:hover {
            color: var(--accent);
            text-decoration: underline;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9375rem;
        }
        
        .alert-success {
            background-color: rgba(25, 135, 84, 0.2);
            color: #51cf66;
            border: 1px solid rgba(25, 135, 84, 0.3);
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
        
        @media (max-width: 576px) {
            .signup-container {
                padding: 2rem 1.5rem;
            }
            
            .signup-title {
                font-size: 1.5rem;
            }
            
            .grid-2 {
                grid-template-columns: 1fr;
                gap: 1.25rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="signup-container">
        <div class="signup-header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="logo-text">DocCraft Pro</div>
            </div>
            <h1 class="signup-title">Create Your Account</h1>
            <p class="signup-subtitle">Join us to create your content</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="signup-form">
            @csrf
            
            <div class="grid-2">
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="input-field" 
                           placeholder="John" required value="{{ old('first_name') }}">
                </div>
                
                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="input-field" 
                           placeholder="Doe" required value="{{ old('last_name') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="input-field" required value="{{ old('dob') }}">
            </div>
            
            <div class="form-group">
                <label for="education" class="form-label">Education Level</label>
                <select id="education" name="education" class="input-field" required>
                    <option value="">Select Education</option>
                    <option value="Matric" {{ old('education') == 'Matric' ? 'selected' : '' }}>Matric</option>
                    <option value="Intermediate" {{ old('education') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Bachelor" {{ old('education') == 'Bachelor' ? 'selected' : '' }}>Bachelor</option>
                    <option value="Master" {{ old('education') == 'Master' ? 'selected' : '' }}>Master</option>
                    <option value="PhD" {{ old('education') == 'PhD' ? 'selected' : '' }}>PhD</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="input-field" 
                       placeholder="+1 234 567 890" required value="{{ old('phone') }}">
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="input-field" 
                       placeholder="you@example.com" required value="{{ old('email') }}">
            </div>
            
            <div class="grid-2">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                           class="input-field" placeholder="••••••••" required>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                           class="input-field" placeholder="••••••••" required>
                </div>
            </div>
            
            <button type="submit" class="signup-button">Create Account</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Registration failed</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
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