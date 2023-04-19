<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::with('likes.user')->with('comments.user')->with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $user = auth()->user();
        $validated = $request->validated(
            [
                'body' => 'required',
                'user_id' => $user->id,
            ]
        );
        return Post::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post->load('likes.user');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated(
            [
                'title' => '',
                'body' => '',
                'user_id' => 'required',
            ]
        );
        $post->update($validated);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $post;
    }
}
