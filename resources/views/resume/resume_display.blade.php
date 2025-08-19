<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Resume | DocCraft PRO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            color: var(--light);
            line-height: 1.6;
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
        
        .resume-container {
            width: 80%;
            max-width: 800px;
            margin: 30px auto;
            padding: 40px;
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
            border: 1px solid var(--glass-border);
        }
        
        .resume-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            position: relative;
        }
        
        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 3px;
        }
        
        .header h1 {
            font-size: 36px;
            margin: 0;
            font-weight: 700;
            letter-spacing: -0.5px;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .header p {
            font-size: 18px;
            margin-top: 10px;
            font-weight: 500;
            color: var(--primary-light);
        }
        
        /* Contact Information */
        .contact-info {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
            padding: 15px;
            background: rgba(15, 23, 42, 0.5);
            border-radius: 8px;
            border-left: 4px solid var(--primary);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        .contact-info p {
            margin: 0;
            font-size: 14px;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Sections */
        .section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 22px;
            border-bottom: 2px solid var(--glass-border);
            padding-bottom: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            color: var(--light);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary);
        }
        
        /* Skills Section */
        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .skill-category {
            background: rgba(15, 23, 42, 0.5);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-top: 3px solid var(--primary);
            transition: transform 0.3s ease;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        .skill-category:hover {
            transform: translateY(-5px);
            background: rgba(15, 23, 42, 0.7);
        }
        
        .skill-category h3 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
            color: var(--light);
        }
        
        .skill-list {
            columns: 2;
            -webkit-columns: 2;
            -moz-columns: 2;
            padding-left: 20px;
        }
        
        .skill-list li {
            margin-bottom: 10px;
            position: relative;
            list-style-type: none;
            font-size: 14px;
            color: var(--light);
            opacity: 0.9;
            transition: all 0.3s ease;
        }
        
        .skill-list li:hover {
            color: var(--secondary);
            opacity: 1;
        }
        
        .skill-list li:before {
            content: "▹";
            color: var(--primary);
            position: absolute;
            left: -15px;
            font-weight: bold;
        }
        
        /* Experience & Education Items */
        .work-experience-item, .education-item {
            margin-bottom: 25px;
            padding: 25px;
            background: rgba(15, 23, 42, 0.5);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary);
            transition: transform 0.3s ease;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        .work-experience-item:hover, .education-item:hover {
            transform: translateX(5px);
            background: rgba(15, 23, 42, 0.7);
        }
        
        .experience-header, .education-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }
        
        .experience-position, .education-degree {
            font-weight: 600;
            font-size: 18px;
            margin-right: 15px;
            color: var(--light);
        }
        
        .experience-company, .education-institute {
            font-weight: 500;
            display: block;
            margin-top: 5px;
            color: var(--primary-light);
        }
        
        .experience-period, .education-period {
            color: white;
            font-size: 14px;
            background: var(--primary);
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .experience-description, .education-description {
            margin: 15px 0;
            white-space: pre-line;
            color: var(--light);
            line-height: 1.7;
            opacity: 0.9;
        }
        
        /* Achievements */
        .achievements {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px dashed var(--glass-border);
        }
        
        .achievements h4 {
            margin-bottom: 12px;
            font-size: 16px;
            font-weight: 600;
            color: var(--light);
        }
        
        .achievements ul {
            padding-left: 20px;
        }
        
        .achievements li {
            margin-bottom: 8px;
            position: relative;
            list-style-type: none;
            color: var(--light);
            opacity: 0.9;
        }
        
        .achievements li:before {
            content: "•";
            color: var(--primary);
            position: absolute;
            left: -15px;
            font-size: 20px;
            line-height: 0;
        }
        
        /* Download Button */
        .download-btn {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 12px 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .download-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(108, 92, 231, 0.4);
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .resume-container {
                width: 90%;
                padding: 30px 20px;
            }
            
            .contact-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .skill-list {
                columns: 1;
            }
            
            .experience-header, .education-header {
                flex-direction: column;
            }
            
            .experience-period, .education-period {
                margin-top: 10px;
                align-self: flex-start;
            }
            
            .header h1 {
                font-size: 28px;
            }
            
            .header p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="resume-container">
        <!-- Header Section -->
        <div class="header">
            <h1>{{ $generated['name'] ?? $userData['name'] }}</h1>
            <p>{{ $generated['position'] ?? $userData['job_title'] }}</p>
        </div>

        <!-- Contact Information -->
        <div class="contact-info">
            <p><i class="fas fa-phone"></i> {{ $generated['contact'] ?? $userData['phone'] }}</p>
            <p><i class="fas fa-envelope"></i> {{ $generated['email'] ?? $userData['email'] }}</p>
            <p><i class="fas fa-map-marker-alt"></i> {{ $generated['address'] ?? $userData['address'] }}</p>
            @if(isset($generated['linkedin']) || isset($userData['linkedin']))
                <p><i class="fab fa-linkedin"></i> {{ $generated['linkedin'] ?? $userData['linkedin'] }}</p>
            @endif
        </div>

        <!-- Objective -->
        <div class="section">
            <h2 class="section-title">Professional Summary</h2>
            <p>{{ $generated['objective'] ?? 'Experienced professional seeking new opportunities' }}</p>
        </div>

        <!-- Skills Section -->
        <div class="section">
            <h2 class="section-title">Skills</h2>
            @if(isset($generated['skills']))
                <div class="skills-container">
                    @foreach($generated['skills'] as $skillGroup)
                        <div class="skill-category">
                            <h3>{{ $skillGroup['title'] }}</h3>
                            <ul class="skill-list">
                                @foreach($skillGroup['skills'] as $skill)
                                    <li>{{ $skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No skills information available</p>
            @endif
        </div>

        <!-- Work Experience Section -->
        <div class="section">
            <h2 class="section-title">Work Experience</h2>
            @if(isset($generated['workExperience']))
                @foreach($generated['workExperience'] as $experience)
                    <div class="work-experience-item">
                        <div class="experience-header">
                            <div>
                                <span class="experience-position">{{ $experience['position'] }}</span>
                                @if(isset($experience['company']))
                                    <span class="experience-company">at {{ $experience['company'] }}</span>
                                @endif
                            </div>
                            <div class="experience-period">{{ $experience['year'] }}</div>
                        </div>
                        
                        @if(isset($experience['description']))
                            <div class="experience-description">
                                {{ $experience['description'] }}
                            </div>
                        @endif
                        
                        @if(isset($experience['keyAchievements']))
                            <div class="achievements">
                                <h4>Key Achievements:</h4>
                                <ul>
                                    @foreach(explode("\n", $experience['keyAchievements']) as $achievement)
                                        @if(trim($achievement))
                                            <li>{{ trim(str_replace(['•', '-'], '', $achievement)) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                @foreach($experience as $exp)
                    <div class="work-experience-item">
                        <div class="experience-header">
                            <div>
                                <span class="experience-position">{{ $exp['position'] }}</span>
                                <span class="experience-company">at {{ $exp['company'] }}</span>
                            </div>
                            <div class="experience-period">{{ $exp['year'] }}</div>
                        </div>
                        <div class="experience-description">
                            AI-generated description not available for this position.
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Education Section -->
        <div class="section">
            <h2 class="section-title">Education</h2>
            @if(isset($generated['education']))
                @foreach($generated['education'] as $education)
                    <div class="education-item">
                        <div class="education-header">
                            <div>
                                <span class="education-degree">{{ $education['degree'] }}</span>
                                <span class="education-institute">from {{ $education['institute'] }}</span>
                            </div>
                            <div class="education-period">{{ $education['year'] }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($education as $edu)
                    <div class="education-item">
                        <div class="education-header">
                            <div>
                                <span class="education-degree">{{ $edu['degree'] }}</span>
                                <span class="education-institute">from {{ $edu['institute'] }}</span>
                            </div>
                            <div class="education-period">{{ $edu['year'] }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    <a href="{{ route('resume.download') }}" class="download-btn">
        <i class="fas fa-file-pdf"></i> Download PDF
    </a>

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