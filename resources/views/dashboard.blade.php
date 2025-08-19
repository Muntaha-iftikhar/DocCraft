<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocCraft PRO | Content Creation Suite</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap');
        
        :root {
            --primary: #8B5CF6;
            --primary-light: #A78BFA;
            --primary-dark: #6D28D9;
            --secondary: #EC4899;
            --accent: #10B981;
            --dark: #0F172A;
            --darker: #020617;
            --dark-light: #1E293B;
            --text: #E2E8F0;
            --text-light: #94A3B8;
            --text-lighter: #CBD5E1;
            --border: #334155;
            --card-bg: #1E293B;
            --card-hover: #334155;
            --footer-bg: #0F172A;
            --glass: rgba(30, 41, 59, 0.5);
            --glass-border: rgba(255, 255, 255, 0.1);
            --nebula-purple: rgba(139, 92, 246, 0.15);
            --nebula-pink: rgba(236, 72, 153, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            background-color: var(--darker);
            min-height: 100vh;
            color: var(--text);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
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
        
        /* Premium Glass Header */
        .header {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 1rem 2rem;
            color: white;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--glass-border);
        }

        .header-container {
            max-width: 1440px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
            position: relative;
        }

        .nav-link:hover {
            color: white;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .user-nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .user-profile:hover {
            background: rgba(255,255,255,0.2);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-name {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .logout-btn {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.3);
            transform: translateY(-1px);
        }

        /* Premium Hero Section with Nebula Effects */
        .hero {
            padding: 6rem 2rem 4rem;
            text-align: center;
            position: relative;
            background: linear-gradient(to bottom, var(--darker), var(--dark));
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -300px;
            right: -300px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--nebula-purple) 0%, transparent 70%);
            z-index: 1;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -300px;
            left: -300px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--nebula-pink) 0%, transparent 70%);
            z-index: 1;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            letter-spacing: -1px;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-light);
            margin-bottom: 2.5rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        .search-bar {
            max-width: 600px;
            margin: 0 auto 3rem;
            position: relative;
            z-index: 2;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1.5rem;
            padding-left: 3.5rem;
            border-radius: 12px;
            border: 1px solid var(--border);
            font-size: 1rem;
            background-color: var(--dark-light);
            color: var(--text);
            transition: all 0.3s;
            box-shadow: 0 5px 30px rgba(0,0,0,0.2);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .search-input::placeholder {
            color: var(--text-light);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 5px 30px rgba(139, 92, 246, 0.3);
        }

        .search-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            z-index: 3;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 0 2rem 4rem;
            max-width: 1440px;
            margin: 0 auto;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-lighter);
            letter-spacing: -0.5px;
        }

        .view-all {
            color: var(--primary-light);
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .view-all:hover {
            color: var(--primary);
        }

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        /* Premium Glass Cards with Nebula Effects */
        .tool-card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.2, 0, 0.1, 1);
            border: 1px solid var(--glass-border);
            position: relative;
            overflow: hidden;
        }

        .tool-card:hover {
            transform: translateY(-8px);
            background: var(--card-hover);
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.3);
            border-color: rgba(139, 92, 246, 0.3);
        }

        .tool-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
        }

        .tool-card::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, var(--nebula-purple) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tool-card:hover::after {
            opacity: 0.6;
        }

        .tool-icon {
            width: 56px;
            height: 56px;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.4);
            transition: all 0.3s;
            position: relative;
            z-index: 2;
        }

        .tool-card:hover .tool-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 6px 25px rgba(139, 92, 246, 0.5);
        }

        .tool-card h3 {
            color: var(--text-lighter);
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }

        .tool-card p {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            font-size: 1rem;
            position: relative;
            z-index: 2;
        }

        .tool-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-light);
            font-weight: 500;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s;
            position: relative;
            z-index: 2;
        }

        .tool-btn:hover {
            color: var(--primary);
        }

        .tool-btn i {
            transition: transform 0.3s;
        }

        .tool-btn:hover i {
            transform: translateX(5px);
        }

        /* Premium Category Tabs */
        .category-tabs {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 2rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
        }

        .category-tab {
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s;
            color: var(--text-light);
        }

        .category-tab.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-color: var(--primary);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .category-tab:hover:not(.active) {
            border-color: var(--primary-light);
            color: var(--primary-light);
            background: rgba(139, 92, 246, 0.1);
        }

        /* Premium Stats Section with Nebula Effects */
        .stats-container {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 16px;
            padding: 3rem;
            margin: 3rem 0;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.3);
        }

        .stats-container::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        }

        .stats-container::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--nebula-pink) 0%, transparent 70%);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            position: relative;
            z-index: 2;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Premium Footer */
        .footer {
            background: var(--footer-bg);
            color: white;
            padding: 4rem 2rem 2rem;
            border-top: 1px solid var(--border);
            position: relative;
            z-index: 2;
        }

        .footer-container {
            max-width: 1440px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            margin-bottom: 1.5rem;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .footer-logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
        }

        .footer-about {
            max-width: 300px;
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
        }

        .social-link:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.3);
        }

        .footer-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            letter-spacing: -0.5px;
            color: var(--text-lighter);
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-link {
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-link:hover {
            color: var(--primary-light);
            transform: translateX(5px);
        }

        .footer-bottom {
            max-width: 1440px;
            margin: 3rem auto 0;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .footer-legal {
            display: flex;
            gap: 1.5rem;
        }

        .footer-legal-link {
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-legal-link:hover {
            color: var(--primary-light);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .nav-links {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 1rem;
            }
            
            .nav-links {
                display: none;
            }

            .hero {
                padding: 4rem 1rem 2rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .main-content {
                padding: 0 1rem 3rem;
            }

            .stats-container {
                padding: 2rem 1.5rem;
            }
            
            .footer-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .user-name {
                display: none;
            }

            .logout-btn span {
                display: none;
            }

            .logout-btn i {
                margin: 0;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
            }
            
            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .footer-legal {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Hidden class for filtering */
        .hidden {
            display: none;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-light);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <!-- Premium Glass Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <div class="logo-icon">DC</div>
                <span>DocCraft PRO</span>
            </div>
            
            <nav class="nav-links">
                <a href="#" class="nav-link"><i class="fas fa-home"></i> Home</a>
                <a href="#" class="nav-link"><i class="fas fa-rocket"></i> Features</a>
                <a href="#" class="nav-link"><i class="fas fa-lightbulb"></i> Templates</a>
                <a href="#" class="nav-link"><i class="fas fa-question-circle"></i> Help</a>
            </nav>
            
            <div class="user-nav">
                <div class="user-profile">
                    <div class="user-avatar">U</div>
                    <span class="user-name">User</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sign Out</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Premium Hero Section with Nebula Effects -->
    <section class="hero">
        <div class="hero-container">
            <h1>Ultimate AI Content Creation Suite</h1>
            <p>Professional-grade content generation tools with dark mode elegance. Transform your ideas into polished content instantly.</p>
            
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search tools (e.g., 'resume', 'blog post')" id="searchInput">
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Premium Category Tabs -->
        <div class="category-tabs">
            <div class="category-tab active" data-category="all">All Tools</div>
            <div class="category-tab" data-category="writing">Writing</div>
            <div class="category-tab" data-category="marketing">Marketing</div>
            <div class="category-tab" data-category="business">Business</div>
            <div class="category-tab" data-category="social">Social Media</div>
            <div class="category-tab" data-category="productivity">Productivity</div>
        </div>

        <!-- Premium Tools Section -->
        <div class="section-header">
            <h2 class="section-title">Content Tools</h2>
            <div class="view-all" id="toolCount">15 Tools available</div>
        </div>

        <div class="tools-grid" id="toolsContainer">
            <!-- Tool 1: Presentation -->
            <div class="tool-card" data-categories="productivity,business">
                <div class="tool-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <h3>Presentation Pro</h3>
                <p>Design stunning slides that tell your story with impact. Choose from beautiful templates or start from scratch.</p>
                <a href="{{ route('tbs.form') }}" class="tool-btn">
                    Start creating <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 2: Resume -->
            <div class="tool-card" data-categories="writing,business">
                <div class="tool-icon">
                    <i class="fas fa-file-user"></i>
                </div>
                <h3>Resume Builder</h3>
                <p>Craft a professional resume that gets you noticed. Our AI-powered tools help highlight your best qualities.</p>
                <a href="{{ route('resume.form') }}" class="tool-btn">
                    Build resume <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 3: Cover Letter -->
            <div class="tool-card" data-categories="writing,business">
                <div class="tool-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h3>Cover Letter Creator</h3>
                <p>Generate personalized cover letters that complement your resume and impress recruiters.</p>
                <a href="{{ route('cover.form') }}" class="tool-btn">
                    Create letter <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 4: Blog Post -->
            <div class="tool-card" data-categories="writing,marketing,social">
                <div class="tool-icon">
                    <i class="fas fa-blog"></i>
                </div>
                <h3>Blog Post Generator</h3>
                <p>Write high-quality blog posts in minutes with AI-generated content. Create compelling articles effortlessly.</p>
                <a href="{{ route('blog.form') }}" class="tool-btn">
                    Generate post <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 5: Business Name -->
            <div class="tool-card" data-categories="business,marketing">
                <div class="tool-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Business Name Generator</h3>
                <p>Generate creative and catchy business names with AI in seconds. Perfect for startups and entrepreneurs.</p>
                <a href="{{ route('business.form') }}" class="tool-btn">
                    Generate names <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 6: Product Description -->
            <div class="tool-card" data-categories="marketing,business">
                <div class="tool-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <h3>Product Description</h3>
                <p>Generate engaging and tailored product descriptions using AI. Ideal for eCommerce and marketers.</p>
                <a href="{{ route('product.description.form') }}" class="tool-btn">
                    Generate now <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 7: Proposal Generator -->
            <div class="tool-card" data-categories="business,writing">
                <div class="tool-icon">
                    <i class="fas fa-file-signature"></i>
                </div>
                <h3>Proposal Generator</h3>
                <p>Create professional business proposals quickly with AI. Save time and impress clients effortlessly.</p>
                <a href="{{ route('proposal.form') }}" class="tool-btn">
                    Generate <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Tool 8: Business Idea -->
            <div class="tool-card" data-categories="business">
                <div class="tool-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Business Idea Generator</h3>
                <p>Get creative business ideas tailored to your interests, skills, and budget with AI.</p>
                <a href="{{ route('business.idea.form') }}" class="tool-btn">
                    Get ideas <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 9: Email Generator -->
            <div class="tool-card" data-categories="writing,business,marketing">
                <div class="tool-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Generator</h3>
                <p>Generate professional emails for any purpose using AI instantly.</p>
                <a href="{{ route('email.form') }}" class="tool-btn">
                    Generate email <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Tool 10: Course Outline -->
            <div class="tool-card" data-categories="writing,productivity">
                <div class="tool-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Course Outline Generator</h3>
                <p>Create structured course outlines tailored to your audience and goals using AI.</p>
                <a href="{{ route('course.form') }}" class="tool-btn">
                    Generate outline <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Tool 11: Article Generator -->
            <div class="tool-card" data-categories="writing,marketing,social">
                <div class="tool-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3>Article Generator</h3>
                <p>Generate informative, structured articles on any topic with the help of AI.</p>
                <a href="{{ route('article.form') }}" class="tool-btn">
                    Generate article <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 12: Meeting Agenda -->
            <div class="tool-card" data-categories="business,productivity">
                <div class="tool-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>Meeting Agenda</h3>
                <p>Generate professional meeting agendas based on your input and download as PDF.</p>
                <a href="{{ route('agenda.form') }}" class="tool-btn">
                    Create agenda <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 13: Transcript Generator -->
            <div class="tool-card" data-categories="productivity,business">
                <div class="tool-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Transcript Generator</h3>
                <p>Create professional transcripts from your meeting notes instantly using AI.</p>
                <a href="{{ route('transcript.form') }}" class="tool-btn">
                    Generate transcript <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Tool 14: Profile Summary -->
            <div class="tool-card" data-categories="writing,business">
                <div class="tool-icon">
                    <i class="fas fa-id-card"></i>
                </div>
                <h3>Profile Summary</h3>
                <p>Generate a professional profile summary based on your job role, skills, and experience.</p>
                <a href="{{ route('profile.form') }}" class="tool-btn">
                    Generate summary <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- lecture summarizer -->
             <div class="tool-card" data-categories="writing">
                <div class="tool-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3>Lecture Summarizer</h3>
                <p>Summarize long lectures and generate key points, questions, and summaries from any topic.</p>
                <a href="{{ route('lecture.index') }}" class="tool-btn">
                    Summarize Lecture <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            

            <!-- Tool 15: Product Name Generator -->
            <div class="tool-card" data-categories="marketing,business">
                <div class="tool-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Product Name Generator</h3>
                <p>Generate catchy and creative product names tailored to your product type and industry.</p>
                <a href="{{ route('product-name.form') }}" class="tool-btn">
                    Generate names <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Premium Stats Section with Nebula Effects -->
        <div class="stats-container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Premium Tools</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Pro Users</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1M+</div>
                    <div class="stat-label">Documents Created</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">AI Assistance</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Premium Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <div class="footer-logo-icon">DC</div>
                    <span>DocCraft PRO</span>
                </div>
                <p class="footer-about">
                    The ultimate dark mode AI content creation suite with 15+ professional tools for marketers, 
                    entrepreneurs, and creators.
                </p>
                <div class="footer-social">
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h3 class="footer-heading">Tools</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link"><i class="fas fa-star"></i> Writing Tools</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-star"></i> Business Tools</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-star"></i> Marketing Tools</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-star"></i> Productivity</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-star"></i> All Features</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3 class="footer-heading">Resources</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link"><i class="fas fa-book"></i> Documentation</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-video"></i> Tutorials</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-blog"></i> Blog</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-users"></i> Community</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-headset"></i> Support</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3 class="footer-heading">Company</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link"><i class="fas fa-info-circle"></i> About Us</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-briefcase"></i> Careers</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-envelope"></i> Contact</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-newspaper"></i> Press</a></li>
                    <li><a href="#" class="footer-link"><i class="fas fa-handshake"></i> Partners</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div>&copy; 2023 DocCraft PRO. All rights reserved.</div>
            <div class="footer-legal">
                <a href="#" class="footer-legal-link">Privacy Policy</a>
                <a href="#" class="footer-legal-link">Terms of Service</a>
                <a href="#" class="footer-legal-link">Cookie Policy</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Create nebula particles
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

            // Get all elements
            const tabs = document.querySelectorAll('.category-tab');
            const tools = document.querySelectorAll('.tool-card');
            const searchInput = document.getElementById('searchInput');
            const toolCount = document.getElementById('toolCount');
            
            // Initialize with all tools visible
            updateToolCount(tools.length);
            
            // Category Tab Functionality
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Update active tab
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    
                    const category = tab.dataset.category;
                    filterTools(category, searchInput.value.toLowerCase());
                });
            });
            
            // Search Functionality
            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();
                const activeCategory = document.querySelector('.category-tab.active').dataset.category;
                filterTools(activeCategory, searchTerm);
            });
            
            // Filter tools by category and search term
            function filterTools(category, searchTerm = '') {
                let visibleCount = 0;
                
                tools.forEach(tool => {
                    const toolTitle = tool.querySelector('h3').textContent.toLowerCase();
                    const toolDesc = tool.querySelector('p').textContent.toLowerCase();
                    const toolCategories = tool.dataset.categories.split(',');
                    
                    const matchesSearch = searchTerm === '' || 
                        toolTitle.includes(searchTerm) || 
                        toolDesc.includes(searchTerm);
                    
                    const matchesCategory = category === 'all' || 
                        toolCategories.includes(category);
                    
                    if (matchesSearch && matchesCategory) {
                        tool.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        tool.classList.add('hidden');
                    }
                });
                
                updateToolCount(visibleCount);
            }
            
            // Update visible tool count
            function updateToolCount(count) {
                toolCount.textContent = `${count} Premium ${count === 1 ? 'Tool' : 'Tools'}`;
            }
            
            // Initial animation for tool cards
            tools.forEach((card, index) => {
                card.style.transitionDelay = `${index * 0.05}s`;
            });
        });
    </script>
</body>
</html>