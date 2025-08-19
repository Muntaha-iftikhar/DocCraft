<!DOCTYPE html>
<html>
<head>
    <title>Lecture Questions</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h2 { text-align: center; margin-bottom: 20px; }
        ul { list-style-type: square; padding-left: 20px; }
    </style>
</head>
<body>
    <h2>Questions for: {{ $topic }}</h2>
    <ul>
        @foreach($questions as $question)
            <li>{{ $question }}</li>
        @endforeach
    </ul>
</body>
</html>
