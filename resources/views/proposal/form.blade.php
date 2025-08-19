<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Proposal Generator | DocCraft PRO</title>
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
      0% {
        transform: translateY(0) translateX(0);
      }
      100% {
        transform: translateY(-20px) translateX(20px);
      }
    }

    .proposal-card {
      max-width: 800px;
      margin: 0 auto 40px;
      background: var(--glass);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      position: relative;
      z-index: 1;
      border: 1px solid var(--glass-border);
      padding: 40px 30px;
    }

    .proposal-card::before {
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
      margin-bottom: 30px;
    }

    .form-header h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 5px;
      background: linear-gradient(90deg, white, #e2e8f0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      position: relative;
    }

    .form-header p {
      color: var(--light);
      opacity: 0.8;
      font-size: 1rem;
      margin: 0;
    }

    form {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .form-label {
      color: var(--light);
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    .form-control,
    .form-select,
    textarea.form-control {
      width: 100%;
      padding: 12px 15px;
      font-size: 1rem;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid var(--glass-border);
      color: white;
      transition: all 0.3s ease;
      font-family: 'Inter', sans-serif;
      resize: vertical;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .form-control:focus,
    .form-select:focus,
    textarea.form-control:focus {
      outline: none;
      border-color: var(--secondary);
      box-shadow: 0 0 0 3px rgba(253, 121, 168, 0.2);
      background: rgba(255, 255, 255, 0.15);
    }

    button.btn-generate {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border: none;
      color: white;
      font-weight: 600;
      font-size: 1rem;
      padding: 15px;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
      margin-top: 10px;
    }

    button.btn-generate:hover {
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

    .alert-danger {
      background-color: rgba(255, 105, 108, 0.15);
      border: 1px solid rgba(253, 121, 168, 0.5);
      color: #ff6c6c;
      padding: 15px 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      font-weight: 600;
    }

    @media (max-width: 768px) {
      .proposal-card {
        padding: 30px 20px;
      }
      .form-header h2 {
        font-size: 1.8rem;
      }
    }

    /* Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade {
      animation: fadeIn 0.6s ease-out forwards;
    }
  </style>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
</head>
<body>
  <div class="nebula-bg" id="nebulaBg"></div>

  <div class="proposal-card animate-fade">
    <div class="form-header">
      <h2>Proposal Generator</h2>
      <p>Fill in your details to create a professional proposal</p>
    </div>

    @if ($errors->any())
      <div class="alert-danger">
        <ul style="margin:0; padding-left: 20px;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('proposal.generate') }}" method="POST" class="needs-validation" novalidate>
      <div class="hidden-token">
        @csrf
      </div>

      <label for="title" class="form-label">Proposal Title</label>
      <input type="text" name="title" class="form-control" required placeholder="Enter proposal title" />
      <div class="error-message"></div>

      <label for="client_name" class="form-label">Client Name</label>
      <input type="text" name="client_name" class="form-control" required placeholder="Enter client name" />
      <div class="error-message"></div>

      <label for="project_description" class="form-label">Project Description</label>
      <textarea name="project_description" rows="3" class="form-control" required placeholder="Describe the project"></textarea>
      <div class="error-message"></div>

      <label for="objectives" class="form-label">Objectives</label>
      <textarea name="objectives" rows="3" class="form-control" required placeholder="List objectives"></textarea>
      <div class="error-message"></div>

      <label for="timeline" class="form-label">Timeline</label>
      <input
        type="text"
        name="timeline"
        class="form-control"
        required
        placeholder="e.g., 2 months, Jan 2025 - March 2025"
      />
      <div class="error-message"></div>

      <label for="budget" class="form-label">Budget Estimate</label>
      <input type="text" name="budget" class="form-control" required placeholder="e.g., $5,000" />
      <div class="error-message"></div>

      <label for="requirements" class="form-label">Special Requirements (Optional)</label>
      <textarea name="requirements" rows="2" class="form-control" placeholder="Any special requirements"></textarea>

      <label for="your_name" class="form-label">Your Name / Company</label>
      <input type="text" name="your_name" class="form-control" required placeholder="Your name or company" />
      <div class="error-message"></div>

      <label for="tone" class="form-label">Tone</label>
      <select name="tone" class="form-select" required>
        <option value="" disabled selected>Select tone</option>
        <option value="Formal">Formal</option>
        <option value="Persuasive">Persuasive</option>
        <option value="Friendly">Friendly</option>
      </select>
      <div class="error-message"></div>

      <button type="submit" class="btn-generate">
        <i class="fas fa-magic submit-icon"></i> Generate Proposal
      </button>
    </form>
  </div>

  <script>
    // Form validation
    (function () {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');

      Array.from(forms).forEach((form) => {
        form.addEventListener(
          'submit',
          function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add('was-validated');
          },
          false
        );
      });
    })();

    // Create nebula particles
    document.addEventListener('DOMContentLoaded', function () {
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
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
</body>
</html>

