<form method="POST" action="{{ route('course.generate') }}">
    @csrf
    <input type="text" name="topic" placeholder="Enter topic" required>
    <button type="submit">Generate</button>
</form>
