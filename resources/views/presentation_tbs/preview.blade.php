<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation Preview | DocCraft PRO</title>
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
        
        .preview-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 15px;
            position: relative;
            z-index: 1;
        }
        
        .preview-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1.5rem;
            border-radius: 12px 12px 0 0;
            margin-bottom: 0;
            text-align: center;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-bottom: none;
        }
        
        h2 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
            background: linear-gradient(90deg, white, #E2E8F0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .preview-subtitle {
            opacity: 0.8;
            font-size: 1rem;
            margin-top: 0.5rem;
        }
        
        .preview-body {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 2rem;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--glass-border);
            border-top: none;
        }
        
        .slide-card {
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--primary);
            padding: 1.25rem;
            background: var(--glass);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid var(--glass-border);
        }
        
        .slide-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.2);
            background: rgba(30, 41, 59, 0.7);
        }
        
        .slide-title {
            color: var(--primary-light);
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .slide-content {
            background-color: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            padding: 1rem;
            max-height: 300px;
            overflow-y: auto;
            line-height: 1.7;
            white-space: pre-line;
            color: var(--light);
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .btn-template {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid var(--primary);
            color: var(--primary-light);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        .btn-template:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .btn-download {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
        }
        
        .btn-download:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            box-shadow: 0 7px 20px rgba(108, 92, 231, 0.4);
            transform: translateY(-2px);
        }
        
        .btn-edit {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid var(--light);
            color: var(--light);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-edit:hover {
            background: var(--light);
            color: var(--dark);
        }
        
        .edit-icon {
            color: var(--primary-light);
            cursor: pointer;
            margin-left: 10px;
            transition: all 0.2s ease;
        }
        
        .edit-icon:hover {
            color: var(--secondary);
            transform: scale(1.1);
        }
        
        .no-slides {
            text-align: center;
            padding: 2rem;
            color: var(--light);
            opacity: 0.8;
        }
        
        .edit-form {
            display: none;
            margin-top: 1rem;
        }
        
        .edit-textarea {
            width: 100%;
            min-height: 150px;
            padding: 1rem;
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid var(--glass-border);
            border-radius: 6px;
            resize: vertical;
            color: white;
        }
        
        .edit-textarea:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .edit-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            justify-content: flex-end;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            border-color: rgba(220, 53, 69, 0.3);
            color: #ff6b6b;
            font-weight: 500;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }
        
        /* Custom scrollbar */
        .slide-content::-webkit-scrollbar {
            width: 8px;
        }
        
        .slide-content::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.3);
            border-radius: 0 8px 8px 0;
        }
        
        .slide-content::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }
        
        .slide-content::-webkit-scrollbar-thumb:hover {
            background: var(--primary-light);
        }
        
        @media (max-width: 768px) {
            .preview-container {
                margin: 1rem auto;
                padding: 0 10px;
            }
            
            .preview-header {
                padding: 1.25rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .preview-body {
                padding: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-template, .btn-download, .btn-edit {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Nebula Background Elements -->
    <div class="nebula-bg" id="nebulaBg"></div>
    
    <div class="preview-container">
        <div class="preview-header">
            <h2>Presentation Preview</h2>
            <div class="preview-subtitle">Review and edit your AI-generated slides before downloading</div>
        </div>
        
        <div class="preview-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($slides && count($slides) > 0)
                <div class="slides-container">
                    @foreach($slides as $index => $slide)
                        <div class="slide-card" id="slide-{{ $index }}">
                            <div class="slide-title">
                                <span>Slide {{ $index + 1 }}: {{ $slide['Title'] ?? 'Untitled Slide' }}</span>
                                <i class="fas fa-edit edit-icon" onclick="toggleEdit({{ $index }})"></i>
                            </div>
                            <div class="slide-content" id="content-{{ $index }}">
                                {!! nl2br(e($slide['Content'] ?? 'No content available')) !!}
                            </div>
                            
                            <div class="edit-form" id="edit-form-{{ $index }}">
                                <textarea class="edit-textarea" id="edit-textarea-{{ $index }}">{{ $slide['Content'] ?? '' }}</textarea>
                                <div class="edit-actions">
                                    <button class="btn btn-sm btn-template" onclick="saveEdit({{ $index }})">Save</button>
                                    <button class="btn btn-sm btn-edit" onclick="cancelEdit({{ $index }})">Cancel</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="action-buttons">
                    <a href="{{ route('tbs.templates') }}" class="btn btn-template">
                        <i class="fas fa-file-alt me-2"></i>Choose Template
                    </a>
                    <!--<button class="btn btn-download" onclick="downloadPresentation()">-->
                    <!--    <i class="fas fa-download me-2"></i>Download PPTX-->
                    <!--</button>-->
                    <a href="{{ route('tbs.form') }}" class="btn btn-edit">
                        <i class="fas fa-plus me-2"></i>Create New
                    </a>
                </div>
            @else
                <div class="no-slides">
                    <p class="lead">No slides data to preview.</p>
                    <a href="{{ route('tbs.form') }}" class="btn btn-template mt-3">
                        <i class="fas fa-plus me-2"></i>Create New Presentation
                    </a>
                </div>
            @endif
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

        function toggleEdit(index) {
            const contentDiv = document.getElementById(`content-${index}`);
            const editForm = document.getElementById(`edit-form-${index}`);
            
            if (editForm.style.display === 'block') {
                editForm.style.display = 'none';
                contentDiv.style.display = 'block';
            } else {
                editForm.style.display = 'block';
                contentDiv.style.display = 'none';
            }
        }
        
        function saveEdit(index) {
            const textarea = document.getElementById(`edit-textarea-${index}`);
            const contentDiv = document.getElementById(`content-${index}`);
            
            // Update the displayed content
            contentDiv.innerHTML = textarea.value.replace(/\n/g, '<br>');
            
            // Hide the edit form
            document.getElementById(`edit-form-${index}`).style.display = 'none';
            contentDiv.style.display = 'block';
            
            // Here you would typically send the update to the server
            // For now we'll just show an alert
            alert('Changes saved! (Note: This is a frontend demo. Backend integration would save changes permanently)');
        }
        
        function cancelEdit(index) {
            document.getElementById(`edit-form-${index}`).style.display = 'none';
            document.getElementById(`content-${index}`).style.display = 'block';
        }
        
        function downloadPresentation() {
            // In a real implementation, this would be handled by the server
            // For demo purposes, we'll redirect to the download route
            window.location.href = "{{ route('tbs.download') }}";
        }
    </script>
</body>
</html>