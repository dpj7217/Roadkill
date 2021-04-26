<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UpdatePostsController extends Controller
{

    /**
     *
     * SHOW FORM TO UPDATE POST
     * @return view posts.update
     *
     *
     */
    public function show($post_id) {
        //if post is found and current user is owner of post
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'You need to login to see this post first');
        } else if (Post::find($post_id) && auth()->user()->id == Post::find($post_id)->user_id) {
            return view('posts.update', [
                'post' => Post::find($post_id)
            ]);
        } else {
            abort(404, 'Post not found');
        }
    }

    /**
     *
     * HANDLE SUBMISSION OF UPDATE FORM
     * @return redirect back to previous page
     *
     */
    public function update($post_id) {
        request()->validate([
            'post_title' => ['required'],
            'post_body' => ['required']
        ]);

        $post = Post::find($post_id);

        $post->user_id = auth()->user()->id;
        $post->image_path = "default_blog_image.jpg";
        $post->title = request('post_title');
        $post->body = request('post_body');

        $post->save();

        return redirect(route('showPost', $post->id));
    }
}
