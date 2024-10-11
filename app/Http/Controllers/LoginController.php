<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function index() 
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        $user = auth()->user();

        if(!auth()->attempt($request->only('email','password'),$request->remember))
        {
            return back()->with('mensaje','Credenciales Incorrectas');
        }
        return redirect()->route('posts.index',auth()->user()->username);
    }
}
