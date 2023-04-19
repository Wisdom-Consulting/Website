<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load comments by post
        $postId = request()->post_id;
        return Comment::where('post_id', $postId)->with('user:id,name,image')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Add comment
        $user = auth()->user();
        $request['user_id'] = $user->id;
        $data = $request->validate(
            [
                'body' => 'required',
                'user_id' => 'required',
                'post_id' => 'required'
            ]
        );
        return Comment::create($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Update comment
        $user = auth()->user();
        $request['user_id'] = $user->id;
        $request->validate(
            [
                'body' => '',
                'user_id' => '',
                'post_id' => ''
            ]
        );
        $comment->update($request->all());
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // Delete comment
        return $comment->delete();
    }
}
