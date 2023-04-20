<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $user = auth()->user();
        $request['user_id'] = $user->id;
        $request->validate(
            [
                'body' => 'required',
                'user_id' => 'required'
            ]
        );
//        return json_encode($request->all(), 400);
        $post = Post::create($request->all());
        return $post->load('user')->load('likes.user')->load('comments.user');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post->load('likes.user')->load('comments.user')->load('user');
    }

    public function deleteLike(Post $post)
    {
        $user = auth()->user();

            $likes = $post->likes()->where('user_id', $user->id)->get();
            if($likes->count() > 0) {
                return $post->likes()->where('user_id', $user->id)->delete();
            }
            else {
                return response()->json(['error' => 'Like not found'], 404);
            }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $user = auth()->user();
        $request['user_id'] = $user->id;
        $request->validate(
            [
                'body' => 'required',
                'user_id' => 'required'
            ]
        );
        $post->update($request->all());
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
