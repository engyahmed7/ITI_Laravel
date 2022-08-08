<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        // $posts = Post::all();
        return view('posts.index')->with(['posts' => $posts]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->enabled = $request->enabled;
        $post->user_id = $request->user_id;
        $post->published_at = $request->published_at;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with(['posts' => $post, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        Post::where('id', $id)->update(['title' => $title, 'body' => $body]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/posts');
    }

    // public function restore($id)
    // {
    //     Post::withTrashed()->find($id)->restore();
    //     return back();
    // }
    // public function restoreAll()
    // {
    //     Post::onlyTrashed()->restore();
    //     return back();
    // }

    public function Deleted_Posts()
    {
        $post = Post::onlyTrashed()->get();
        return view('posts.restore')->with('posts', $post);
    }

    public function delete_final($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->route('posts.index');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('posts.index');
    }

    public function restoreAll()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('posts.index');
    }



}