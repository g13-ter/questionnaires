@extends('layouts.app')

@section('title', 'Survey Complete')

@section('content')
<div class="survey-container">
    <div class="completion-section">
        <div class="completion-icon">✅</div>
        <h1>Survey Complete!</h1>
        <p class="completion-message">Thank you for completing the IT Questions Survey. Your responses have been recorded successfully.</p>
        
        <div class="completion-actions">
            <a href="{{ route('questionnaire.index') }}" class="btn">Take Survey Again</a>
        </div>
    </div>
</div>

<style>
.completion-section {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border: 1px solid #ddd;
    margin: 20px 0;
}
.completion-icon {
    font-size: 80px;
    margin-bottom: 20px;
}
.completion-section h1 {
    color: #4CAF50;
    font-size: 32px;
    margin: 20px 0;
    border: none;
}
.completion-message {
    font-size: 16px;
    color: #666;
    margin: 20px 0 40px 0;
    line-height: 1.5;
}
.completion-actions .btn {
    background: #4CAF50;
    color: white;
    padding: 15px 30px;
    text-decoration: none;
    font-size: 16px;
    border-radius: 4px;
    display: inline-block;
}
.completion-actions .btn:hover {
    background: #45a049;
}
</style>
@endsection