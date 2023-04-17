<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->field;
        // Get quizzes by a specific quiz field
        return Quiz::whereHas('quiz_field', function ($query) use ($category) {
            $query->where('id', $category);
        })->with('quiz_field', 'level')->get();

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request->all();
        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'level_id' => 'required|exists:levels,id',
            'quiz_field_id' => 'required|exists:quiz_fields,id',
            'questions' => 'required',
            'questions.*.body' => 'required',
            'questions.*.answers' => 'required',
            'questions.*.answers.*.body' => 'required',
            'questions.*.answers.*.is_correct' => 'required',
        ]);
        $quiz = Quiz::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'quiz_field_id' => $request->quiz_field_id,
            'level_id' => $request->level_id,
        ]);
//        return $quiz;
        foreach ($request->questions as $question) {
            $newQuestion = $quiz->question()->create([
                'body' => $question['body'],
            ]);

            foreach ($question['answers'] as $answer) {
                $newQuestion->answer()->create([
                    'body' => $answer['body'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
        return $quiz->load('question.answer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        // retun quiz with questions and answers
        return $quiz->load('question.answer');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
//        $question_ids = $quiz->question->pluck('id')->toArray();
        $fields = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'questions' => 'required',
            'questions.*.id' => 'required|exists:questions,id',
            'questions.*.body' => 'required',
            'questions.*.answers' => 'required',
            'questions.*.answers.*.id' => 'required|exists:answers,id',
//            'questions.*.answers.*.id' => 'required',
            'questions.*.answers.*.body' => 'required',
            'questions.*.answers.*.is_correct' => 'required',
        ]);
        // Update quiz
        $quiz->update([
            'body' => $request->body,
        ]);

        foreach ($request->questions as $question) {
            $q = $quiz->question()->findOrFail($question['id']);
            $q->update([
                'body' => $question['body'],
            ]);

            foreach ($question['answers'] as $answer) {
                $a = $q->answer()->findOrFail($answer['id']);
                $a->update([
                    'body' => $answer['body'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }

        return $quiz->load('question.answer');
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
