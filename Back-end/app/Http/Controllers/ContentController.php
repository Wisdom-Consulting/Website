<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
        $articlePerPage = 5;
        $content = Content::with('category')
            ->with('user')
            ->simplePaginate($articlePerPage);
        $pagesCount = Content::count() / $articlePerPage;
        return [
            'content' => $content,
            'pagesCount' => ceil($pagesCount)
        ];
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);
        return Content::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return Content::with('category')->with('user')->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);
        $content->update($request->all());
        return $content;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        return $content->delete();
    }
}
