<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ComentarioController extends Controller
{

    use ValidatesRequests;

    public function store(Request $request, User $user, Post $post)
    {
        $this->validate($request,['comentario'=>'required|max:255']);

        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario

        ]);

        return back()->with('mensaje','Comentario realizado correctamente');
    }
}
