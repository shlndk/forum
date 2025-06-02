<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'question' => 'What is the capital of France?',
            'answer' => 'Paris',
        ]);
        Question::create([
            'question' => 'What is the capital of Italy?',
            'answer' => 'Rome',
        ]);
        Question::create([
            'question' => 'What is the capital of Japan?',
            'answer' => 'Tokyo',
        ]);
        Question::create([
            'question' => 'What is the capital of Germany?',
            'answer' => 'Berlin',
        ]);
        Question::create([
            'question' => 'What is the capital of Spain?',
            'answer' => 'Madrid',
        ]);
        Question::create([
            'question' => 'What is the capital of Canada?',
            'answer' => 'Ottawa',
        ]);
        Question::create([
            'question' => 'What is the capital of Australia?',
            'answer' => 'Canberra',
        ]);
        Question::create([
            'question' => 'What is the capital of Brazil?',
            'answer' => 'Brasília',
        ]);

    }
}
