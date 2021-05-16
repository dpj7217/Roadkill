<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreatePostsController extends Controller
{

    /**
     *
     * SHOW FORM TO CREATE NEW POST
     * @return view posts/createNew
     *
     */
    public function show() {
        Log::debug("Entering CreatePostsController.show");

        return view('posts.createNew');
    }

    /**
     *
     * HANDLE FORM SUBMISSION FOR POST CREATION
     *
     * @return redirect back to previous page
     *
     */
    public function create() {
        Log::debug("Entering CreatePostsController.create");

        request()->validate([
            'post_title' => ['required'],
            'post_body' => ['required']
        ]);

        $post = new Post();

        $post->user_id = auth()->user()->id;
        $post->image_path = "default_blog_image.jpg";
        $post->title = request('post_title');
        $post->body = request('post_body');

        $post->save();

        return redirect(route('showPost', $post->id));
    }
}
