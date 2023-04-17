<?php

namespace App\Http\Controllers\post;

use App\Models\post\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return Application|Factory|View|\Illuminate\Foundation\Application
//     */
////    public function index()
////    {
////        $userId = Auth::id();
////        $posts = Post::where('user_id', $userId)
////            ->latest('updated_at')
////            ->paginate(5);
////
////        return view('posts.index')->with('posts', $posts);
////    }
//
//    public function index() {
//
//        $posts = Post::all();
//
//       return View::make('posts.index')->with('posts', $posts);
//    }
//
//    public function show(Post $post) {
//        return view('post.show', [
//            'post' => $post
//        ]);
//    }
//
//    public function create() {
//        return view('posts.create');
//    }
//
//    public function store(Request $request) {
//        $formFields = $request->validate([
//            'title' => 'required',
//            'body' => 'required',
//            'cost' => 'required',
//            'image_uri' => 'required',
//        ]);
//
//        if($request->hasFile('image')) {
//            $formFields['image'] = $request->file('image')->store('resources/images', 'public');
//        }
//
//        $formFields['user_id'] = auth()->id();
//
//        Post::create($formFields);
//
//        return redirect('/')->with('message', 'Post created successfully!');
//    }
//
//    public function edit(Post $post) {
//        return view('post.edit', ['post' => $post]);
//    }
//
//    public function update(Request $request, Post $post) {
//        if($post->user_id != auth()->id()) {
//            abort(403, 'Unauthorized Action');
//        }
//
//        $formFields = $request->validate([
//            'title' => 'required',
//            'body' => 'required',
//            'cost' => 'required',
//            'image_uri' => 'required',
//        ]);
//
//        if($request->hasFile('image')) {
//            $formFields['image'] = $request->file('image')->store('resources/images', 'public');
//        }
//
//        $post->update($formFields);
//
//        return back()->with('message', 'Post updated successfully!');
//    }
//
//    public function destroy(Post $post) {
//
//        if($post->user_id != auth()->id()) {
//            abort(403, 'Unauthorized Action');
//        }
//
//        if($post->image_uri && Storage::disk('public')->exists($post->image_uri)) {
//            Storage::disk('public')->delete($post->image_uri);
//        }
//        $post->delete();
//        return redirect('/')->with('message', 'Post deleted successfully');
//    }
//
//    public function manage() {
//        return view('post.manage', ['post' => auth()->user()->post()->get()]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');

    }
}
