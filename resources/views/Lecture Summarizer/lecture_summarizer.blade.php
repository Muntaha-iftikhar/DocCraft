<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Summarizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3">Lecture Summarizer</h2>

    <!-- Input Form -->
    <form method="POST" action="{{ route('lecture.generate') }}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="topic" class="form-control" placeholder="Enter topic name" value="{{ old('topic') }}" required>
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
        @error('topic')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        @if(session('errors'))
            <div class="alert alert-danger mt-2">{{ session('errors')->first('api_error') }}</div>
        @endif
    </form>

    @if(session('data'))
        @php $data = session('data'); @endphp

        <!-- Headings -->
        <div class="card my-3">
            <div class="card-header">Lecture Headings</div>
            <div class="card-body">
                <p>{{ implode(', ', $data['headings']) }}</p>
            </div>
        </div>

        <!-- Questions -->
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Questions</span>
                <form method="POST" action="{{ route('lecture.downloadQuestions') }}">
                    @csrf
                    <input type="hidden" name="questions" value='@json($data["questions"])'>
                    <input type="hidden" name="topic" value="{{ session('topic') }}">
                    <button class="btn btn-sm btn-outline-success" type="submit">Download PDF</button>
                </form>
            </div>
            <div class="card-body">
                <ul>
                    @foreach($data['questions'] as $question)
                        <li>{{ $question }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Assignment -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Assignment</span>
                <form method="POST" action="{{ route('lecture.downloadAssignment') }}">
                    @csrf
                    <input type="hidden" name="title" value="{{ $data['assignment']['title'] }}">
                    <input type="hidden" name="description" value="{{ $data['assignment']['description'] }}">
                    <button class="btn btn-sm btn-outline-danger" type="submit">Download PDF</button>
                </form>
            </div>
            <div class="card-body">
                <h5>{{ $data['assignment']['title'] }}</h5>
                <p>{{ $data['assignment']['description'] }}</p>
            </div>
        </div>
    @endif
</div>

</body>
</html>
