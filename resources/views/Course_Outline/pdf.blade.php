<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Course Outline</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, sans-serif;
            line-height: 1.4;
            color: #333;
            background-color: #f9f6fc;
            margin: 0;
            padding: 15px;
            font-size: 12px;
        }
        .page {
            width: 100%;
            height: 100%;
            background: white;
            box-shadow: 0 2px 8px rgba(106, 48, 147, 0.1);
            padding: 25px;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eae0f5;
        }
        h1 {
            color: #5e3a8e;
            font-weight: 600;
            margin: 5px 0;
            font-size: 18px;
            letter-spacing: 0.5px;
        }
        .course-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 11px;
            color: #666;
        }
        pre {
            white-space: pre-wrap;
            font-family: 'Segoe UI', Roboto, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            background-color: #fcfaff;
            padding: 15px;
            margin: 0;
            border-radius: 3px;
            border-left: 3px solid #7d5ba6;
        }
        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 10px;
            color: #999;
            padding-top: 10px;
            border-top: 1px solid #eae0f5;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <h1>COURSE OUTLINE</h1>
            <div class="course-info">
                <span>Course Code: [CODE]</span>
                <span>Semester: [SEMESTER]</span>
                <span>Credit Hours: [CREDITS]</span>
            </div>
        </div>
        
        <pre>{{ $courseOutline }}</pre>
        
        <div class="footer">
            [Institution Name] | [Department] | © 2023
        </div>
    </div>
</body>
</html>