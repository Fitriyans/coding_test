<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function home()
    {
        $posts = Post::with('account')->get();
        return view('home', compact('posts'));
    }

    public function index()
    {
        $posts = Post::with('account')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'username' => 'required',
        ]);

        // Mendapatkan username pengguna yang sedang login
        $username = Auth::user()->username;

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => $username,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'username' => 'required',
        ]);


        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => $request->username,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
