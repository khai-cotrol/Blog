<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::orderBy('id', 'desc')->get();
        return view('welcome', compact('allPosts'));
    }

    public function post(Request $request, Role $post)
    {
        $post->name = $request->title;
//        $post->post = $request->post;
//        $post->user_id = $request->user_id;
        $post->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->delete();
        $post->delete();
        return redirect()->back();
    }
}
