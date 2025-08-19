<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Agenda PDF</title>
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --accent: #ff7e5f;
            --light: #f8f9fa;
            --dark: #2d3748;
            --text: #4a5568;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 40px;
            color: var(--dark);
            background-color: white;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--primary);
        }
        
        h1 {
            color: var(--primary);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .meta-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 15px;
            color: var(--text);
            font-size: 14px;
        }
        
        .agenda-container {
            margin-top: 20px;
            padding: 25px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background-color: white;
        }
        
        .agenda-content {
            white-space: pre-wrap;
            font-family: 'Courier New', Courier, monospace;
            font-size: 15px;
            line-height: 1.7;
            color: var(--dark);
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 12px;
            color: var(--text);
        }
        
        .logo {
            height: 50px;
            margin-bottom: 15px;
        }
        
        /* For better PDF printing */
        @page {
            size: A4;
            margin: 20mm;
        }
        
        @media print {
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <!-- Replace with your logo if available -->
        <div class="logo">[Your Company Logo]</div>
        <h1>Meeting Agenda</h1>
        <div class="meta-info">
            <span>Date: {{ $meetingDate ?? '[Date]' }}</span>
            <span>Time: {{ $meetingTime ?? '[Time]' }}</span>
            <span>Location: {{ $meetingLocation ?? '[Location]' }}</span>
        </div>
    </div>

    <div class="agenda-container">
        <div class="agenda-content">{{ $agendaContent }}</div>
    </div>

    <div class="footer">
        <p>Generated on {{ now()->format('F j, Y') }} | {{ config('app.name') ?? 'Meeting Agenda Generator' }}</p>
    </div>

</body>
</html>