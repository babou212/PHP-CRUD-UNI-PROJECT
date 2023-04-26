<?php

namespace App\Http\Controllers\comment;

use App\Http\Controllers\Controller;
use App\Models\comment\Comment;
use App\Models\post\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body'=>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return redirect()->route('posts.index')
            ->with('success','Comment added successfully');
    }

    /**
     *
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
}
