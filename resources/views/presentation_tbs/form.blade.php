<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation Generator | DocCraft PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            color: #f5f6fa;
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
        
        .presentation-container {
            max-width: 700px;
            margin: 20px auto;
            position: relative;
            z-index: 1;
        }
        
        .presentation-card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--glass-border);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .presentation-card:hover {
            box-shadow: 0 15px 50px rgba(108, 92, 231, 0.3);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 25px;
            text-align: center;
            border-bottom: 1px solid var(--glass-border);
        }
        
        h2 {
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
        
        .form-label {
            font-weight: 600;
            color: var(--light);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            color: white;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(253, 121, 168, 0.2);
            color: white;
        }
        
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a29bfe'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 1em;
        }
        
        .form-select option {
            background: var(--darker);
            color: white;
        }
        
        .btn-generate {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 10px;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1.1rem;
            margin-top: 10px;
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
        }
        
        .form-group {
            margin-bottom: 1.75rem;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-light);
        }
        
        @media (max-width: 768px) {
            .presentation-container {
                margin: 10px auto;
            }
            
            .card-header {
                padding: 20px;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .card-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="presentation-container">
        <div class="card presentation-card">
            <div class="card-header">
                <h2>Create Presentation</h2>
    <p class="mb-0 mt-2" style="opacity: 0.8; font-size: 1rem;">Design stunning slides with AI-powered templates for any audience</p>
            </div>
            
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif

                <form action="{{ route('tbs.generate') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="topic" class="form-label">Presentation Topic</label>
                        <input type="text" name="topic" id="topic" class="form-control" value="{{ old('topic') }}" required placeholder="Enter your presentation topic">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="audience" class="form-label">Target Audience</label>
                                <select name="audience" id="audience" class="form-select" required>
                                    <option value="" disabled {{ old('audience') ? '' : 'selected' }}>Select audience</option>
                                    <option value="students" {{ old('audience') == 'students' ? 'selected' : '' }}>Students</option>
                                    <option value="teachers" {{ old('audience') == 'teachers' ? 'selected' : '' }}>Teachers</option>
                                    <option value="business" {{ old('audience') == 'business' ? 'selected' : '' }}>Business Professionals</option>
                                    <option value="general" {{ old('audience') == 'general' ? 'selected' : '' }}>General Audience</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slides" class="form-label">Number of Slides</label>
                                <div class="position-relative">
                                    <input type="number" name="slides" id="slides" class="form-control" min="3" max="15" value="{{ old('slides', 5) }}" required>
                                    <i class="fas fa-sliders-h input-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="detail" class="form-label">Detail Level</label>
                        <select name="detail" id="detail" class="form-select" required>
                            <option value="" disabled {{ old('detail') ? '' : 'selected' }}>Select detail level</option>
                            <option value="simple" {{ old('detail') == 'simple' ? 'selected' : '' }}>Simple Overview</option>
                            <option value="detailed" {{ old('detail') == 'detailed' ? 'selected' : '' }}>Detailed Analysis</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-generate">
                        <i class="fas fa-magic"></i> Generate Presentation Slides
                    </button>
                </form>
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