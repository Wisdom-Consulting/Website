<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserQuizScore;
use Illuminate\Http\Request;

class UserQuizScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user();
        // get score per quiz for each user
        $user = User::with(['quizzes' => function($query) {
            $query->select('title', 'score');
        }])->find($user_id->id);

        return $user->quizzes->pluck('pivot.score', 'title');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // add score
        $user = auth()->user();
        // Check if the user has already taken the quiz
        $userQuiz = $user->quizzes()->where('quiz_id', $request->quiz_id)->first();
        if ($userQuiz) {
            return response()->json(['message' => 'You have already taken this quiz'], 400);
        }else{
            // include timestamp
            $user->quizzes()->attach($request->quiz_id, [
                'score' => $request->score,
                'created_at' => now(),
                'updated_at' => now()]);
            return true;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserQuizScore $userQuizScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserQuizScore $userQuizScore)
    {
        // update score
        $user = auth()->user();
        $user->quizzes()->updateExistingPivot($request->quiz_id, ['score' => $request->score]);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserQuizScore $userQuizScore)
    {
        //
    }
}
