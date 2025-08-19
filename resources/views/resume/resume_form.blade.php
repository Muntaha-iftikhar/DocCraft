<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder | DocCraft Pro</title>
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
        
        .resume-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            padding: 40px;
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
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .form-header p {
            color: var(--light);
            opacity: 0.8;
        }
        
        .resume-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--light);
        }
        
        .form-group input, 
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            color: white;
        }
        
        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .form-group input:focus, 
        .form-group textarea:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(253, 121, 168, 0.2);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .section-title {
            font-size: 20px;
            color: var(--light);
            margin: 25px 0 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--glass-border);
        }
        
        .education-group, 
        .experience-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            background: rgba(30, 41, 59, 0.3);
            border: 1px solid var(--glass-border);
        }
        
        .add-btn {
            background: rgba(255, 255, 255, 0.1);
            color: var(--primary-light);
            border: 1px dashed var(--primary);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        .add-btn:hover {
            background: rgba(108, 92, 231, 0.2);
            border-color: var(--primary-light);
        }
        
        .file-upload {
            position: relative;
        }
        
        .file-upload input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        
        .file-upload label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            border: 2px dashed var(--glass-border);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            background: rgba(30, 41, 59, 0.3);
        }
        
        .file-upload label:hover {
            border-color: var(--primary);
            background: rgba(108, 92, 231, 0.1);
        }
        
        .file-upload-icon {
            font-size: 40px;
            color: var(--primary-light);
            margin-bottom: 15px;
        }
        
        .file-upload-text {
            font-weight: 500;
            margin-bottom: 5px;
            color: var(--light);
        }
        
        .file-upload-hint {
            font-size: 14px;
            color: var(--light);
            opacity: 0.7;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .submit-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
        }
        
        @media (max-width: 600px) {
            .resume-container {
                padding: 30px 20px;
            }
            
            .education-group,
            .experience-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="resume-container">
        <div class="form-header">
            <h2>Build Your Professional Resume</h2>
            <p>Fill in your details to create a resume that stands out</p>
        </div>
        
        <form method="POST" action="{{ route('resume.generate') }}" enctype="multipart/form-data" class="resume-form">
            @csrf
            
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="+1234567890" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="john@example.com" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="City, Country">
            </div>
            
            <div class="form-group">
                <label for="job_title">Current Job Title</label>
                <input type="text" id="job_title" name="job_title" placeholder="e.g. Software Engineer">
            </div>
            
            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" id="profession" name="profession" placeholder="e.g. Web Development">
            </div>
            
            <div class="form-group">
                <label for="field">Industry/Field</label>
                <input type="text" id="field" name="field" placeholder="e.g. Information Technology">
            </div>
            
            <div class="form-group">
                <label for="linkedin">LinkedIn Profile</label>
                <input type="url" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/yourprofile">
            </div>
            
            <div class="form-group file-upload">
                <input type="file" id="image" name="image" accept="image/*">
                <label for="image">
                    <div class="file-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="file-upload-text">Upload Profile Photo</div>
                    <div class="file-upload-hint">(Optional) JPG or PNG, max 2MB</div>
                </label>
            </div>
            
            <h3 class="section-title">Educational Details</h3>
            <div id="education-wrapper">
                <div class="education-group">
                    <input type="text" name="education[0][degree]" placeholder="Degree Name (e.g. Matriculation)" required>
                    <input type="text" name="education[0][institute]" placeholder="Institute (e.g. Govt School)" required>
                    <input type="text" name="education[0][year]" placeholder="Year (e.g. 2018-2020)" required>
                </div>
            </div>
            <button type="button" class="add-btn" onclick="addEducation()">
                <i class="fas fa-plus"></i> Add More Education
            </button>
            
            <h3 class="section-title">Work Experience</h3>
            <div id="experience-wrapper">
                <div class="experience-group">
                    <input type="text" name="experience[0][position]" placeholder="Position (e.g. Data Analyst)" required>
                    <input type="text" name="experience[0][company]" placeholder="Company Name" required>
                    <input type="text" name="experience[0][year]" placeholder="Year (e.g. 2020-2021)" required>
                </div>
            </div>
            <button type="button" class="add-btn" onclick="addExperience()">
                <i class="fas fa-plus"></i> Add More Experience
            </button>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-file-download"></i> Generate Resume
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

        let eduIndex = 1;
        let expIndex = 1;

        function addEducation() {
            let wrapper = document.getElementById('education-wrapper');
            let html = `
                <div class="education-group">
                    <input type="text" name="education[${eduIndex}][degree]" placeholder="Degree Name" required>
                    <input type="text" name="education[${eduIndex}][institute]" placeholder="Institute" required>
                    <input type="text" name="education[${eduIndex}][year]" placeholder="Year" required>
                </div>`;
            wrapper.insertAdjacentHTML('beforeend', html);
            eduIndex++;
        }

        function addExperience() {
            let wrapper = document.getElementById('experience-wrapper');
            let html = `
                <div class="experience-group">
                    <input type="text" name="experience[${expIndex}][position]" placeholder="Position" required>
                    <input type="text" name="experience[${expIndex}][company]" placeholder="Company Name" required>
                    <input type="text" name="experience[${expIndex}][year]" placeholder="Year" required>
                </div>`;
            wrapper.insertAdjacentHTML('beforeend', html);
            expIndex++;
        }
    </script>
</body>
</html>