<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class Comments extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $comment = new Comment([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description'  => $request->get('description'),
            'active'  => $request->get('active')
        ]);
        $comment->save();
        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Comment $comment)
    {
        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->name = $request->get('name');
        $comment->price = $request->get('price');
        $comment->description = $request->get('description');
        $comment->active = $request->get('active');
        $comment->save();
        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
