<?php

namespace App\Http\Controllers;


use App\Models\Post;

class UserController extends Controller
{

    public function homepage()
    {
        $post = Post::all();
        return view('user.userhome', compact('post'));
    }


    public function blogpost()
    {
        $post = Post::all();
        return view('user.blogpost', compact('post'));
    }
    public function post_details($id)
    {
        $post = Post::find($id);
        return view('user.post_details', compact('post'));
    }
}
