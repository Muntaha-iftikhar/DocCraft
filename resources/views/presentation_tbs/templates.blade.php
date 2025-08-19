<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose a Template | DocCraft PRO</title>
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
    
    .template-header {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      padding: 3rem 0;
      margin-bottom: 3rem;
      position: relative;
      z-index: 1;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--glass-border);
    }
    
    .template-title {
      font-weight: 800;
      margin: 0;
      font-size: 2.5rem;
      background: linear-gradient(90deg, white, #E2E8F0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: -0.5px;
    }
    
    .template-subtitle {
      opacity: 0.8;
      font-weight: 400;
      font-size: 1.2rem;
      margin-top: 0.5rem;
    }
    
    .template-container {
      max-width: 1400px;
      padding: 0 20px;
      position: relative;
      z-index: 1;
      margin: 0 auto;
    }
    
    .template-card {
      background: var(--glass);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 16px;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.2, 0, 0.1, 1);
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      height: 100%;
      display: flex;
      flex-direction: column;
      border: 1px solid var(--glass-border);
      position: relative;
    }
    
    .template-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(108, 92, 231, 0.3);
      background: rgba(30, 41, 59, 0.7);
      border-color: rgba(139, 92, 246, 0.3);
    }
    
    .template-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(to bottom, var(--primary), var(--accent));
    }
    
    .card-img-top {
      height: 220px;
      object-fit: cover;
      border-bottom: 1px solid var(--glass-border);
    }
    
    .card-body {
      padding: 1.75rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    
    .card-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--light);
      margin-bottom: 1rem;
      text-align: center;
    }
    
    .btn-template {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border: none;
      color: white;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 10px;
      transition: all 0.3s ease;
      margin-top: auto;
      font-size: 1.05rem;
      box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    
    .btn-template:hover {
      background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
      transform: translateY(-3px);
      box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
    }
    
    .fallback-img {
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.7), rgba(15, 23, 42, 0.5));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--light);
      font-weight: 500;
      height: 220px;
      font-size: 1.1rem;
      border-bottom: 1px solid var(--glass-border);
    }
    
    .template-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 2rem;
      padding-bottom: 4rem;
    }
    
    .back-btn {
      position: absolute;
      left: 2rem;
      top: 2rem;
      background: rgba(255,255,255,0.1);
      border: 1px solid var(--glass-border);
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      z-index: 2;
    }
    
    .back-btn:hover {
      background: rgba(255,255,255,0.2);
      transform: translateX(-3px);
    }
    
    @media (max-width: 992px) {
      .template-title {
        font-size: 2rem;
      }
      
      .template-subtitle {
        font-size: 1rem;
      }
      
      .template-header {
        padding: 2.5rem 0;
      }
    }
    
    @media (max-width: 768px) {
      .template-title {
        font-size: 1.8rem;
      }
      
      .template-header {
        padding: 2rem 0;
      }
      
      .back-btn {
        left: 1rem;
        top: 1rem;
      }
      
      .template-grid {
        grid-template-columns: 1fr 1fr;
      }
    }
    
    @media (max-width: 576px) {
      .template-grid {
        grid-template-columns: 1fr;
      }
      
      .template-title {
        font-size: 1.6rem;
      }
      
      .template-header {
        padding: 3rem 0 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- Nebula Background Elements -->
  <div class="nebula-bg" id="nebulaBg"></div>
  
  <a href="{{ route('tbs.preview') }}" class="back-btn">
    <i class="fas fa-arrow-left"></i>
  </a>
  
  <div class="template-header text-center">
    <div class="container">
      <h1 class="template-title">Presentation Templates</h1>
      <p class="template-subtitle mb-0">Select your preferred design templates</p>
    </div>
  </div>

  <div class="container template-container">
    <div class="template-grid">
      @foreach($templates as $template)
        <div class="d-flex align-items-stretch">
          <div class="card template-card shadow-sm">
            @if(file_exists(public_path('template_previews/' . pathinfo($template['file'], PATHINFO_FILENAME) . '.jpg')))
              <img 
                src="{{ asset('template_previews/' . pathinfo($template['file'], PATHINFO_FILENAME) . '.jpg') }}" 
                class="card-img-top" 
                alt="{{ $template['name'] }}" 
                loading="lazy"
              />
            @else
              <div class="fallback-img">
                <span>Template Preview</span>
              </div>
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $template['name'] }}</h5>
              <form action="{{ route('tbs.download') }}" method="POST" class="mt-auto">
                @csrf
                <input type="hidden" name="template" value="{{ $template['file'] }}" />
                <button type="submit" class="btn btn-template w-100">
                  <i class="fas fa-magic"></i> Use This Template
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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