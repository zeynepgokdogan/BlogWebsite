<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function addpost()
    {
        return view('user.addpost');
    }

    public function user_post(Request $request)
    {
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->name = $name;
        $post->user_id = $userid;
        $post->usertype = $usertype;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();
        return redirect()->back()->with('message', 'Post added succesfully');
    }

    public function my_post()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = Post::where('user_id', '=', $userid)->get();
        return view('user.mypost', compact('data'));
    }
    public function mypost_delete($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Post deleted Succesfully.');
    }

    public function mypost_edit($id)
    {
        $post = Post::find($id);
        return view('user.editpost', compact('post'));
    }

    public function mypost_update(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->route('my_post')->with('message', 'Post update succesfully.');
    }
}
