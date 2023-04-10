<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::with('answer')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Add questions

        foreach ($request->questions as $question) {
            $request->question()->create([
                'body' => $question['body'],
            ]);
            // Add answers
            foreach ($question['answers'] as $answer) {
                $request->question->last()->answer()->create([
                    'body' => $answer['body'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
        return $request;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        // Update question
        $question->update([
            'body' => $request->body,
        ]);
        // Update answers
        foreach ($request->answers as $answer) {
            $question->answer()->update([
                'body' => $answer['body'],
                'is_correct' => $answer['is_correct'],
            ]);
        }
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        // Delete question
        $question->delete();
        // Delete answers
        $question->answer()->delete();
    }
}
