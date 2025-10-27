@extends('layouts.app')

@section('title', 'IT Questions')

@section('content')
<h2>Information Technology Questions</h2>
<p>Click on any question to view details and submit your answer.</p>

@if($questions->count() > 0)
    @foreach($questions as $question)
        <div class="question-box">
            <h3>{{ $question->title }}</h3>
            <p>{{ $question->description }}</p>
            <p><strong>Answers:</strong> {{ $question->answers_count }}</p>
            <a href="{{ route('questions.show', $question) }}" class="btn">View Question</a>
        </div>
    @endforeach
@else
    <p>No questions available.</p>
@endif
@endsection