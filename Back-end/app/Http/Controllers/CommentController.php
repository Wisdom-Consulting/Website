<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

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
    public function store(StoreCommentRequest $request)
    {
        // Add comment
        $user = auth()->user();
        $comment = Comment::create($request->validated(
            [
                'body' => $request->body,
                'user_id' => $user->id,
                'post_id' => $request->post_id,
            ]
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        // Update comment
        $user = auth()->user();
        $comment->update($request->validated(
            [
                'body' => '',
                'user_id' => '',
                'post_id' => '',
            ]
        ));
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
