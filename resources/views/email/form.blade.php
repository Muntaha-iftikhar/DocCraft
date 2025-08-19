<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Generator | DocCraft PRO</title>
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
        
        .email-container {
            max-width: 700px;
            width: 100%;
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
        
        .card-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        h2 {
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(90deg, var(--primary-light), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }
        
        .card-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--light);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            color: white;
            width: 100%;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(253, 121, 168, 0.2);
            color: white;
            outline: none;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a29bfe'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 1em;
        }
        
        .btn-generate {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .btn-generate:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            border-color: rgba(220, 53, 69, 0.3);
            color: #ff6b6b;
            font-weight: 500;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            margin-bottom: 1.5rem;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-light);
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }
        
        .form-row > .form-group {
            padding-right: 10px;
            padding-left: 10px;
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        @media (max-width: 768px) {
            .email-card {
                padding: 1.5rem;
            }
            
            .form-row > .form-group {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            h2 {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 15px;
            }
            
            .email-card {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="email-container">
        <div class="email-card">
            <div class="card-header">
                <h2>Email Generator</h2>
                <p>Create professional emails tailored to your needs</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('email.generate') }}" method="POST">
                @csrf
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="recipient_name" class="form-label">Recipient Name</label>
                        <input type="text" name="recipient_name" id="recipient_name" class="form-control" placeholder="John Smith" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="recipient_title" class="form-label">Recipient Title</label>
                        <input type="text" name="recipient_title" id="recipient_title" class="form-control" placeholder="Marketing Director" required>
                        <i class="fas fa-id-badge input-icon"></i>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Acme Corp" required>
                        <i class="fas fa-building input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_info" class="form-label">Contact Email/Phone</label>
                        <input type="text" name="contact_info" id="contact_info" class="form-control" placeholder="john@example.com" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="project_name" class="form-label">Project Name</label>
                    <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Website Redesign Project" required>
                    <i class="fas fa-project-diagram input-icon"></i>
                </div>
                
                <div class="form-group">
                    <label for="purpose" class="form-label">Email Purpose</label>
                    <input type="text" name="purpose" id="purpose" class="form-control" placeholder="Project proposal discussion" required>
                    <i class="fas fa-bullseye input-icon"></i>
                </div>
                
                <div class="form-group">
                    <label for="details" class="form-label">Project Details</label>
                    <textarea name="details" id="details" class="form-control" placeholder="Describe the project details and context..." required></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="tone" class="form-label">Email Tone</label>
                        <select name="tone" id="tone" class="form-control" required>
                            <option value="Professional">Professional</option>
                            <option value="Friendly">Friendly</option>
                            <option value="Formal">Formal</option>
                        </select>
                        <i class="fas fa-comment-dots input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="your_name" class="form-label">Your Name</label>
                        <input type="text" name="your_name" id="your_name" class="form-control" placeholder="Your Name" required>
                        <i class="fas fa-signature input-icon"></i>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-generate">
                    <i class="fas fa-magic"></i> Generate Email
                </button>
            </form>
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