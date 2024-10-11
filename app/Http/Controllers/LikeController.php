<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {   
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }

    public function destroy(Request $request, Post $post)
    {
        // Buscar el "like" del usuario para este post específico
        $like = $request->user()->likes()->where('post_id', $post->id)->first();
    
        // Si existe, lo eliminamos
        if ($like) {
            $like->delete();
        }
    
        return back();
    }
    
}
