<?php

namespace App\Http\Controllers;

use App\Models\QuizField;
use Illuminate\Http\Request;

class QuizFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return QuizField::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
        ]);
        return QuizField::create($fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizField $quizField)
    {
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuizField $quizField)
    {
        $fields = $request->validate([
            'name' => 'required',
        ]);
        $quizField->update($fields);
        return $quizField;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizField $quizField)
    {
        $quizField->delete();
        return response()->json(null, 204);
    }
}
