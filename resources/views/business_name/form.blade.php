<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Business Name Generator | DocCraft PRO</title>
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

        .container {
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

        .container::before {
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
            margin-top: 0;
            font-size: 1rem;
        }

        form.form-content {
            padding: 0 40px 40px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label.form-label {
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

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg fill='white' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
            padding-right: 40px;
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

        .submit-icon {
            font-size: 1.2rem;
        }

        .hidden-token {
            position: absolute;
            opacity: 0;
            height: 0;
            width: 0;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            form.form-content {
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/kNc3EKNf5dMv4tKlRIX4TqxLyjpUz5G6+o+wx6hROPhcgXkiq540mIWhhIIaAzQ2fYPZQ+t/7QvYw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <div class="nebula-bg" id="nebulaBg"></div>
    <div class="container animate-fade">
        <div class="form-header">
            <h2>Business Name Generator</h2>
            <p>Create the perfect name for your business</p>
        </div>

        <form action="{{ route('business.generate') }}" method="POST" class="form-content">
            <!-- Hidden CSRF Token (visually hidden but still functional) -->
            <div class="hidden-token">
                @csrf
            </div>

            <div class="form-group">
                <label for="industry" class="form-label">Industry / Business Type</label>
                <input type="text" id="industry" name="industry" class="form-control" placeholder="e.g. Restaurant, Tech Startup" required>
            </div>

            <div class="form-group">
                <label for="audience" class="form-label">Target Audience</label>
                <input type="text" id="audience" name="audience" class="form-control" placeholder="e.g. Young professionals, Families" required>
            </div>

            <div class="form-group">
                <label for="keywords" class="form-label">Keywords (Optional)</label>
                <input type="text" id="keywords" name="keywords" class="form-control" placeholder="e.g. Fresh, Organic, Fast">
            </div>

            <div class="form-group">
                <label for="style" class="form-label">Preferred Style</label>
                <select name="style" id="style" class="form-control" required>
                    <option value="" disabled selected>Select a style</option>
                    <option value="Catchy">Catchy</option>
                    <option value="Modern">Modern</option>
                    <option value="Traditional">Traditional</option>
                    <option value="Unique">Unique</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-lightbulb submit-icon"></i> Generate Names
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
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';

                // Random position
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';

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

