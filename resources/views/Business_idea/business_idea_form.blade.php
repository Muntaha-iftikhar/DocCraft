<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Business Idea Generator | DocCraft PRO</title>
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
      padding: 40px 30px;
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
      margin-bottom: 30px;
    }

    .form-header h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 5px;
      background: linear-gradient(90deg, white, #E2E8F0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .form-header p {
      color: var(--light);
      opacity: 0.8;
      font-size: 1rem;
      margin: 0;
    }

    form {
      display: grid;
      gap: 20px;
      grid-template-columns: 1fr;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    label.form-label {
      color: var(--light);
      font-weight: 600;
      margin-bottom: 8px;
    }

    input.form-control,
    textarea.form-control {
      background: rgba(255,255,255,0.1);
      border: 1px solid var(--glass-border);
      border-radius: 10px;
      padding: 12px 15px;
      color: white;
      font-size: 1rem;
      transition: all 0.3s ease;
      font-family: 'Inter', sans-serif;
      resize: vertical;
    }

    input.form-control::placeholder,
    textarea.form-control::placeholder {
      color: rgba(255,255,255,0.5);
    }

    input.form-control:focus,
    textarea.form-control:focus {
      outline: none;
      border-color: var(--secondary);
      box-shadow: 0 0 0 3px rgba(253,121,168,0.2);
      background: rgba(255,255,255,0.15);
    }

    .tone-selector {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .tone-btn {
      flex: 1 1 120px;
      cursor: pointer;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid var(--glass-border);
      padding: 10px 15px;
      font-weight: 600;
      color: var(--light);
      text-align: center;
      user-select: none;
      transition: all 0.3s ease;
      font-family: 'Inter', sans-serif;
    }

    .tone-btn:hover {
      background: var(--secondary);
      border-color: var(--secondary);
      color: black;
    }

    .tone-btn.active {
      background: var(--secondary);
      border-color: var(--secondary);
      color: black;
    }

    .hidden-token {
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
      overflow: hidden;
    }

    button.submit-btn {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      border: none;
      border-radius: 10px;
      padding: 15px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 15px rgba(108,92,231,0.3);
      transition: all 0.3s ease;
    }

    button.submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 7px 20px rgba(108,92,231,0.4);
      background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
    }

    button.submit-btn svg {
      transition: transform 0.3s ease;
    }

    button.submit-btn:hover svg {
      transform: translateX(4px);
    }

    @media (max-width: 768px) {
      .container {
        padding: 30px 20px;
      }
      .form-header h2 {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
  <div class="nebula-bg" id="nebulaBg"></div>

  <div class="container">
    <div class="form-header">
      <h2>Business Idea Generator</h2>
      <p>Fill in your details to create business ideas</p>
    </div>

    <form action="{{ route('business.idea.generate') }}" method="POST">
      <div class="hidden-token">
        @csrf
      </div>

      <div class="form-group">
        <label for="interests" class="form-label">Your Interests</label>
        <input type="text" name="interests" id="interests" class="form-control" placeholder="e.g., Technology, Cooking, Fitness" required />
      </div>

      <div class="form-group">
        <label for="skills" class="form-label">Your Skills</label>
        <input type="text" name="skills" id="skills" class="form-control" placeholder="e.g., Writing, Photography, Coding" required />
      </div>

      <div class="form-group">
        <label for="budget" class="form-label">Investment Budget</label>
        <input type="text" name="budget" id="budget" class="form-control" placeholder="e.g., $1,000-$5,000 or Low/Medium/High" required />
      </div>

      <div class="form-group">
        <label for="location" class="form-label">Preferred Location (Optional)</label>
        <input type="text" name="location" id="location" class="form-control" placeholder="e.g., Online, Local, Urban area" />
      </div>

      <div class="form-group">
        <label class="form-label">Presentation Tone</label>
        <div class="tone-selector" role="radiogroup" aria-label="Presentation Tone Options">
          <button type="button" class="tone-btn active" data-tone="Professional" aria-pressed="true">Professional</button>
          <button type="button" class="tone-btn" data-tone="Creative" aria-pressed="false">Creative</button>
          <button type="button" class="tone-btn" data-tone="Casual" aria-pressed="false">Casual</button>
          <button type="button" class="tone-btn" data-tone="Motivational" aria-pressed="false">Motivational</button>
        </div>
        <input type="hidden" id="tone" name="tone" value="Professional" required />
      </div>

      <button type="submit" class="submit-btn">
        Generate Business Ideas
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </form>
  </div>

  <script>
    // Tone button selection logic
    document.querySelectorAll('.tone-btn').forEach(button => {
      button.addEventListener('click', () => {
        document.querySelectorAll('.tone-btn').forEach(btn => {
          btn.classList.remove('active');
          btn.setAttribute('aria-pressed', 'false');
        });
        button.classList.add('active');
        button.setAttribute('aria-pressed', 'true');
        document.getElementById('tone').value = button.getAttribute('data-tone');
      });
    });

    // Nebula particles generation
    document.addEventListener('DOMContentLoaded', () => {
      const nebulaBg = document.getElementById('nebulaBg');
      const particleCount = 15;

      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('nebula-particle');

        const size = Math.random() * 150 + 50;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;

        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;

        const duration = Math.random() * 20 + 10;
        const delay = Math.random() * 10;
        particle.style.animation = `float ${duration}s ${delay}s infinite alternate ease-in-out`;

        particle.style.opacity = Math.random() * 0.3 + 0.1;

        nebulaBg.appendChild(particle);
      }
    });
  </script>
</body>
</html>
