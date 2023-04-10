<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Quiz::with('question.answer')->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'questions' => 'required',
            'questions.*.body' => 'required',
            'questions.*.answers' => 'required',
            'questions.*.answers.*.body' => 'required',
            'questions.*.answers.*.is_correct' => 'required',
        ]);
        // Add quiz
        $quiz = Quiz::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        // Add questions
        foreach ($request->questions as $question) {
            $quiz->question()->create([
                'body' => $question['body'],
            ]);
            // Add answers
            foreach ($question['answers'] as $answer) {
                $quiz->question->last()->answer()->create([
                    'body' => $answer['body'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
        return $quiz;
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        return $quiz;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'questions' => 'required',
            'questions.*.body' => 'required',
            'questions.*.answers' => 'required',
            'questions.*.answers.*.body' => 'required',
            'questions.*.answers.*.is_correct' => 'required',
        ]);
        // Update quiz
        $quiz->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        // Update questions
        foreach ($request->questions as $question) {
            $quiz->question()->update([
                'body' => $question['body'],
            ]);
            // Update answers
            foreach ($question['answers'] as $answer) {
                $quiz->question->last()->answer()->update([
                    'body' => $answer['body'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        // Delete quiz
        $quiz->delete();
    }
}
