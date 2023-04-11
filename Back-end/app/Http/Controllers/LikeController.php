<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

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
    public function store(StoreLikeRequest $request)
    {
//        dd($request->all());
        // Validate the request data against the necessary rules
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        // Set the user_id value to the authenticated user's ID
        $validatedData['user_id'] = auth()->user()->id;

        // Create a new Like instance using the validated data
        $like = Like::create($validatedData);

        return $like;
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
