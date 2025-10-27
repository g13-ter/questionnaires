@extends('layouts.app')

@section('title', 'IT Questions Survey')

@section('content')
<div class="survey-container">
    <div class="survey-header">
        <h1>IT Questions Survey</h1>
        <p class="survey-description">Please enter your name and email, then answer all questions below.</p>
    </div>

    @if(session('success'))
        <div class="success-msg">
            ✅ {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('survey.submit') }}" method="POST" id="surveyForm">
        @csrf
        
        <!-- User Information Section -->
        <div class="info-section">
            <h2>Your Information</h2>
            
            <div class="form-group">
                <label for="user_name">Name</label>
                <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" required placeholder="Enter your full name">
                @error('user_name')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="email" name="user_email" id="user_email" value="{{ old('user_email') }}" required placeholder="Enter your email address">
                @error('user_email')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Questions Section -->
        <div class="questions-section">
            <h2>Questions</h2>
            @foreach($questions as $index => $question)
                <div class="question-card">
                    <div class="question-header">
                        <span class="question-number">{{ $index + 1 }}.</span>
                        <h3>{{ $question->title }}</h3>
                    </div>
                    
                    <p class="question-description">{{ $question->description }}</p>
                    
                    <div class="form-group">
                        <textarea 
                            name="answers[{{ $question->id }}]" 
                            id="answer_{{ $question->id }}" 
                            rows="4" 
                            placeholder="Type your answer here..."
                            required>{{ old('answers.' . $question->id) }}</textarea>
                        @error('answers.' . $question->id)
                            <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Submit Section -->
        <div class="submit-section">
            <button type="submit" class="submit-btn">Submit</button>
            <p class="submit-note">Please fill all required fields.</p>
        </div>
    </form>


</div>

<script>
// Auto-save functionality
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('user_name');
    const emailInput = document.getElementById('user_email');
    
    // Load saved information
    if (localStorage.getItem('surveyName')) {
        nameInput.value = localStorage.getItem('surveyName');
    }
    if (localStorage.getItem('surveyEmail')) {
        emailInput.value = localStorage.getItem('surveyEmail');
    }
    
    // Save as user types
    nameInput.addEventListener('input', function() {
        localStorage.setItem('surveyName', this.value);
    });
    
    emailInput.addEventListener('input', function() {
        localStorage.setItem('surveyEmail', this.value);
    });
    
    // Clear saved data on successful submit
    document.getElementById('surveyForm').addEventListener('submit', function() {
        // Form validation
        const textareas = document.querySelectorAll('textarea[required]');
        let allFilled = true;
        
        textareas.forEach(function(textarea) {
            if (!textarea.value.trim()) {
                allFilled = false;
                textarea.style.borderColor = '#ff4444';
                textarea.focus();
            } else {
                textarea.style.borderColor = '#ccc';
            }
        });
        
        if (!allFilled) {
            alert('Please fill in all required fields before submitting.');
            return false;
        }
    });
});
</script>
@endsection