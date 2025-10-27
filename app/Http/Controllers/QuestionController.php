<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of all questions.
     */
    public function index()
    {
        $questions = Question::withCount('answers')->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Display the specified question with its answers.
     */
    public function show(Question $question)
    {
        $question->load('answers');
        return view('questions.show', compact('question'));
    }

    /**
     * Display the survey form with all questions.
     */
    public function survey()
    {
        $questions = Question::all();
        return view('survey', compact('questions'));
    }

    /**
     * Display the survey completion page.
     */
    public function surveyComplete()
    {
        return view('survey-complete');
    }

    /**
     * Store answers for all questions from survey form.
     */
    public function submitSurvey(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string|max:1000',
        ]);

        foreach ($request->answers as $questionId => $answerText) {
            Answer::create([
                'question_id' => $questionId,
                'answer_text' => $answerText,
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
            ]);
        }

        return redirect()->route('survey.complete');
    }

    /**
     * Store a newly created answer for a question.
     */
    public function storeAnswer(Request $request, Question $question)
    {
        $request->validate([
            'answer_text' => 'required|string|max:1000',
            'user_name' => 'nullable|string|max:255',
            'user_email' => 'nullable|email|max:255',
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_text,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
        ]);

        return redirect()->route('questions.show', $question)
            ->with('success', 'Your answer has been submitted successfully!');
    }
}
