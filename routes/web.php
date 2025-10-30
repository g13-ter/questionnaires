<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

// Main questionnaire routes as per assignment requirements
Route::get('/', [QuestionController::class, 'index'])->name('questionnaire.index');
Route::post('/questionnaire', [QuestionController::class, 'store'])->name('questionnaire.store');
Route::get('/questionnaire/complete', [QuestionController::class, 'surveyComplete'])->name('survey.complete');
