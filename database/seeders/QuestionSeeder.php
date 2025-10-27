<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'title' => 'What is HTML?',
                'description' => 'Explain what HTML is and what it is used for.'
            ],
            [
                'title' => 'What is the difference between RAM and ROM?',
                'description' => 'Tell us the main differences between RAM and ROM in computers.'
            ],
            [
                'title' => 'What is a computer virus?',
                'description' => 'Describe what a computer virus is and how it works.'
            ]
        ];

        foreach ($questions as $questionData) {
            Question::create($questionData);
        }
    }
}
