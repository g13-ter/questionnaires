<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    // show all questions
    public function index()
    {
        $questions = Question::all();
        return view('survey', compact('questions'));
    }

    // show thank you page
    public function surveyComplete()
    {
        return view('survey-complete');
    }

    // save answers to database
    public function store(Request $request)
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

        return redirect()->route('survey.complete')->with('success', 'Thank you for answering the questionnaire!');
    }


}
