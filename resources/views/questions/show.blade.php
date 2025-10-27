@extends('layouts.app')

@section('title', $question->title)

@section('content')
<p><a href="{{ route('questions.index') }}" class="btn">← Back to Questions</a></p>

<div class="question-box">
    <h2>{{ $question->title }}</h2>
    <p>{{ $question->description }}</p>
</div>

@if(session('success'))
    <div class="success-msg">
        {{ session('success') }}
    </div>
@endif

<h3>Submit Your Answer</h3>
<form action="{{ route('questions.answers.store', $question) }}" method="POST" id="answerForm">
    @csrf
    
    <label>Your Answer:</label>
    <textarea name="answer_text" rows="4" required>{{ old('answer_text') }}</textarea>
    @error('answer_text')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Your Name (optional):</label>
    <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" placeholder="Enter your name once, we'll remember it">

    <label>Your Email (optional):</label>
    <input type="email" name="user_email" id="user_email" value="{{ old('user_email') }}" placeholder="Enter your email once, we'll remember it">

    <p style="font-size: 12px; color: #666; margin: 10px 0;">
        💡 <strong>Tip:</strong> Your name and email will be saved automatically for future answers. 
        <a href="#" id="clearInfo" style="color: #007bff;">Clear saved info</a>
    </p>

    <br>
    <button type="submit" class="btn">Submit Answer</button>
</form>

<script>
// Remember user information in browser storage
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('user_name');
    const emailInput = document.getElementById('user_email');
    const form = document.getElementById('answerForm');
    const clearButton = document.getElementById('clearInfo');
    
    // Load saved information when page loads
    if (localStorage.getItem('userName') && !nameInput.value) {
        nameInput.value = localStorage.getItem('userName');
    }
    if (localStorage.getItem('userEmail') && !emailInput.value) {
        emailInput.value = localStorage.getItem('userEmail');
    }
    
    // Save information when form is submitted
    form.addEventListener('submit', function() {
        if (nameInput.value) {
            localStorage.setItem('userName', nameInput.value);
        }
        if (emailInput.value) {
            localStorage.setItem('userEmail', emailInput.value);
        }
    });
    
    // Also save when user types (for better UX)
    nameInput.addEventListener('blur', function() {
        if (this.value) {
            localStorage.setItem('userName', this.value);
        }
    });
    
    emailInput.addEventListener('blur', function() {
        if (this.value) {
            localStorage.setItem('userEmail', this.value);
        }
    });
    
    // Clear saved information
    clearButton.addEventListener('click', function(e) {
        e.preventDefault();
        localStorage.removeItem('userName');
        localStorage.removeItem('userEmail');
        nameInput.value = '';
        emailInput.value = '';
        alert('Your saved information has been cleared!');
    });
});
</script>

<h3>All Answers ({{ $question->answers->count() }})</h3>

@if($question->answers->count() > 0)
    @foreach($question->answers as $answer)
        <div class="answer-box">
            <p>{{ $answer->answer_text }}</p>
            <small>
                By: {{ $answer->user_name ?: 'Anonymous' }} 
                on {{ $answer->created_at->format('M j, Y') }}
            </small>
        </div>
    @endforeach
@else
    <p>No answers yet. Be the first to answer!</p>
@endif
@endsection