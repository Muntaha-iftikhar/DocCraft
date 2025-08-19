<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Name Ideas | DocCraft Pro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary: #667eea;
            --primary-dark: #5649c0;
            --secondary: #00cec9;
            --light: #f5f6fa;
            --dark: #2d3436;
            --text: #636e72;
            --border: #dfe6e9;
            --success: #48bb78;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: var(--dark);
        }
        
        .results-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }
        
        .results-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        }
        
        .results-header {
            padding: 30px;
            text-align: center;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
        }
        
        .results-header h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .results-header p {
            opacity: 0.9;
        }
        
        .results-content {
            padding: 30px;
        }
        
        .success-message {
            background: rgba(72, 187, 120, 0.1);
            color: var(--success);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid rgba(72, 187, 120, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .names-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .name-card {
            background: var(--light);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }
        
        .name-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .name-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .name-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 10px;
        }
        
        .name-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }
        
        .action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }
        
        .copy-btn {
            background: var(--primary);
            color: white;
            border: none;
        }
        
        .save-btn {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        .results-actions {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--border);
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        
        .btn-icon {
            font-size: 1.2rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--text);
        }
        
        @media (max-width: 768px) {
            .names-list {
                grid-template-columns: 1fr;
            }
            
            .results-header {
                padding: 25px 20px;
            }
            
            .results-content {
                padding: 25px 20px;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="results-container animate-fade">
        <div class="results-header">
            <h2>Your Business Name Ideas</h2>
            <p>We've generated these creative names just for you</p>
        </div>
        
        <div class="results-content">
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                <span>Successfully generated {{ count(session('business_names')) }} unique business names</span>
            </div>
            
            @if (session('business_names'))
                <div class="names-list">
                    @foreach (session('business_names') as $name)
                        <div class="name-card">
                            <div class="name-text">{{ $name }}</div>
                            <div class="name-actions">
                                <button class="action-btn copy-btn" data-name="{{ $name }}">
                                    <i class="far fa-copy"></i> Copy
                                </button>
                                <button class="action-btn save-btn">
                                    <i class="far fa-heart"></i> Save
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-lightbulb" style="font-size: 3rem; color: var(--text); opacity: 0.3; margin-bottom: 20px;"></i>
                    <p>No business names generated yet.</p>
                </div>
            @endif
            
            <div class="results-actions">
                <a href="{{ route('business.form') }}" class="btn btn-primary">
                    <i class="fas fa-undo btn-icon"></i> Generate More Names
                </a>
            </div>
        </div>
    </div>

    <script>
        // Copy functionality
        document.addEventListener('DOMContentLoaded', () => {
            const copyButtons = document.querySelectorAll('.copy-btn');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const name = button.getAttribute('data-name');
                    navigator.clipboard.writeText(name);
                    
                    // Change button text temporarily
                    const originalText = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i> Copied!';
                    
                    setTimeout(() => {
                        button.innerHTML = originalText;
                    }, 2000);
                });
            });
        });
    </script>
</body>
</html>