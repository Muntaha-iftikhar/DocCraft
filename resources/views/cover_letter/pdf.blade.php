<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Professional Cover Letter - {{ $coverData['name'] }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 11pt;
            line-height: 1.4;
            color: #333;
            margin: 1.2cm;
            padding: 0;
        }
        
        .header {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #667eea;
        }
        
        .sender-name {
            font-size: 14pt;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 3px;
        }
        
        .contact-info {
            font-size: 9pt;
            color: #555;
            margin-bottom: 3px;
        }
        
        .date {
            text-align: right;
            font-size: 9pt;
            margin-bottom: 15px;
        }
        
        .recipient {
            margin-bottom: 15px;
        }
        
        .recipient-name {
            font-weight: 600;
            font-size: 10pt;
        }
        
        .company-name {
            font-weight: 500;
            color: #667eea;
            font-size: 10pt;
        }
        
        .letter-body {
            margin-top: 10px;
            white-space: pre-line;
            font-size: 10.5pt;
        }
        
        .letter-body p {
            margin-bottom: 10px;
            text-align: justify;
        }
        
        .closing {
            margin-top: 20px;
        }
        
        .signature-name {
            font-weight: 600;
            margin-top: 15px;
        }
        
        @media print {
            body {
                margin: 1cm;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="sender-name">{{ $coverData['name'] }}</div>
        <div class="contact-info">
            {{ $coverData['email'] }} | {{ $coverData['phone'] }}
            @if(!empty($coverData['address']))
                | {{ $coverData['address'] }}
            @endif
        </div>
    </div>
    
    <div class="date">
        {{ date('F j, Y') }}
    </div>
    
    <div class="recipient">
        <div class="recipient-name">Hiring Manager</div>
        <div class="company-name">{{ $coverData['company_name'] }}</div>
    </div>
    
    <div class="letter-body">
        {!! nl2br(e($letterContent)) !!}
    </div>
    
    <div class="closing">
        Sincerely,<br>
        <div class="signature-name">{{ $coverData['name'] }}</div>
    </div>
</body>
</html>