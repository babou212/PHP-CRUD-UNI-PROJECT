<?php

namespace App\Http\Controllers\post;

use App\Models\post\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController
{
    /**
     *
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $posts = Post::latest()->paginate(6);

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
            'description' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }

    /**
     *
     *
     * @param Post $post
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('posts.show',compact('post'));
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

//    /**
//     *
//     *
//     * @param Post $post
//     * @return Application|Factory|\Illuminate\Foundation\Application|View
//     */
//    public function comment(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
//    {
//        return view('posts.comment',compact('post'));
//    }

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

//    /**
//     *
//     *
//     * @param Request $request
//     * @param Post $post
//     * @return RedirectResponse
//     */
//    public function addComment(Request $request, Post $post): RedirectResponse
//    {
//        $request->validate([
//            'comment' => 'required',
//        ]);
//
//        $postComment = $request->input('comment');
//
//        $post->comment($postComment);
//
//        return redirect()->route('posts.index')
//            ->with('success','Comment added successfully');
//    }

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
}
