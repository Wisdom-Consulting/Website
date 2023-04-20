<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user already liked the post and like if not
        $user = auth()->user();
        $request['user_id'] = $user->id;
        $request->validate(
            [
                'post_id' => 'required',
                'user_id' => 'required'
            ]
        );
        $like = Like::where('post_id', $request->post_id)->where('user_id', $request->user_id)->first();
        if ($like) {
            return null;
        } else {
            $like = Like::create($request->all());
            return $like->load('user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        return $like->delete();
    }
}
