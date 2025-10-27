<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

// New Google Forms-like survey route as main page
Route::get('/', [QuestionController::class, 'survey'])->name('survey');
Route::post('/survey', [QuestionController::class, 'submitSurvey'])->name('survey.submit');
Route::get('/survey/complete', [QuestionController::class, 'surveyComplete'])->name('survey.complete');

// Keep old routes for compatibility
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('/questions/{question}/answers', [QuestionController::class, 'storeAnswer'])->name('questions.answers.store');
