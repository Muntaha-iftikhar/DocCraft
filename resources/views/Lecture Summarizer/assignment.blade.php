<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>{{ $title }}</title>-->
<!--    <style>-->
<!--        body {-->
<!--            font-family: DejaVu Sans, sans-serif;-->
<!--            padding: 40px;-->
<!--            background: #fdfdfd;-->
<!--            color: #333;-->
<!--            line-height: 1.7;-->
<!--        }-->
<!--        h2 {-->
<!--            font-size: 24px;-->
<!--            margin-bottom: 15px;-->
<!--            color: #222;-->
<!--        }-->
<!--        p {-->
<!--            font-size: 16px;-->
<!--            text-align: justify;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <h3>Baba Guru Nanak University <b>Nankana Sahib</b></h3>-->
<!--    <h2>{{ $title }}</h2>-->
<!--    <p></p>-->
<!--</body>-->
<!--</html>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Assignment Template</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Times New Roman', serif;
    line-height: 1.6;
    color: #000;
    background-color: white;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: white;
}

/* Header Section */
.header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 30px;
}

.logo {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}


.university-name {
    font-size: 1.5em;
    font-weight: bold;
    color: #000;
    text-transform: uppercase;
}

.university-tagline {
    font-size: 1em;
    color: #7f8c8d;
    font-style: italic;
    margin-bottom: 20px;
}

/* Course Information */
.course-info {
    margin-bottom: 30px;
    padding: 0;
    background: none;
}

.course-info h2 {
    font-size: 1.3em;
    margin-bottom: 15px;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 20px;
}

.info-item {
    padding: 0;
    background: none;
}

.info-label {
    font-weight: bold;
    color: #000;
    font-size: 0.9em;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.info-value {
    color: #000;
    font-size: 1.1em;
}

/* Assignment Section */
.assignment-section {
    margin-top: 30px;
}

.assignment-title {
    font-size: 1.8em;
    color: #000;
    text-align: center;
    margin-bottom: 20px;
    padding: 20px 0;
    font-weight: bold;
    text-transform: uppercase;
    background: none;
}

.assignment-description {
    padding: 0;
    background: none;
    margin-top: 20px;
}

.assignment-description h3 {
    color: #000;
    font-size: 1.4em;
    margin-bottom: 15px;
    padding-bottom: 10px;
    font-weight: bold;
    /* Remove underline */
    border-bottom: none;
}

.description-content {
    font-size: 1.1em;
    line-height: 1.8;
    color: #000;
    text-align: justify;
}

/* Footer */
.footer {
    margin-top: 40px;
    text-align: center;
    padding-top: 20px;
    font-size: 0.9em;
    color: #000;
    border-top: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .university-name {
        font-size: 1.8em;
    }

    .assignment-title {
        font-size: 1.6em;
    }
}

/* Print Styles */
@media print {
    body {
        background: white;
        padding: 0;
    }

    .container {
        box-shadow: none;
        max-width: none;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <!--<div class="logo">-->
            <!--    <img src="{{ asset('images/favicon/favicon.png') }}" alt="University Logo">-->
            <!--</div>-->

            <h1 class="university-name">Baba Guru Nanak University Nanakana Sahib</h1>
        </div>

        <!-- Course Information -->
        <div class="course-info">
            <h2>Course Information</h2>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Course Name</div>
                    <div class="info-value">Computer Science Fundamentals</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Course Code</div>
                    <div class="info-value">CS-101</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Lecturer Name</div>
                    <div class="info-value">Dr. John Smith</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Semester</div>
                    <div class="info-value">Fall 2024</div>
                </div>
            </div>
        </div>
        
        <hr>
        <!-- Assignment Section -->
        <div class="assignment-section">
            <div class="assignment-title">
                {{ $title }}
            </div>
            
            <div class="assignment-description">
                <!--<h3>Assignment Description</h3>-->
                <div class="description-content">
                    {{ $description }}
                </div>
            </div>
        </div>


        <!-- Footer -->
        <div class="footer">
            <p>© 2025 Baba Guru Nanak University, All rights reserved.</p>
        </div>
    </div>
</body>
</html>