<?php

namespace App\Http\Controllers\post;

use App\Models\comment\Comment;
use App\Models\post\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PostController
{
    /**
     *
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $posts = Post::latest()->paginate(12);

        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     *
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('posts.create');
    }

    /**
     *
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'cost' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png,gif|max:1024',
        ]);

//        $imagePath = $request->file('image')->store('images');
        $uploadPath = 'public/images';
        $imagePath = $request->file('image')->move($uploadPath);

        $post = $request->all();
        $post['image_uri']=$imagePath;

        Post::create($post);

        return redirect()->route('posts.index')
            ->with('success','New Post created successfully.');
    }

    /**
     *
     *
     * @param Post $post
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(Post $post, Comment $comment): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $post->visit()->hourlyIntervals()->withIp();
        return view('posts.show',compact('post', 'comment'));
    }

    /**
     *
     *
     * @param Post $post
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('posts.edit',compact('post'));
    }

    public function comment(Post $post) {
        return view('posts.comment', ['post' => $post]);
    }

    /**
     *
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cost' => 'required'
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    /**
     *
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }

    public function search(Request $request){
        $search = $request->input('search');

        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();

//        dd($search);

        return view('posts.search', compact('posts'));
    }
}
