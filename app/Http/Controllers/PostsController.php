<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{

    /*
    *
    * SHOW ALL POSTS
    *
    * @return view posts/viewAll
    *
    */
    public function index() {
        Log::debug("Entering PostController.index");

        return view('posts.viewAll', [
            'posts' => Post::get(),
        ]);
    }


    /**
     *
     *
     * SHOW SINGLE POST
     * @return view posts/showPost
     *
     **/
    public function show($post_id) {
        Log::debug("Entering PostController.show: " . $post_id);

        if (Post::find($post_id)) {
            return view('posts.showPost', [
                'post' => Post::find($post_id)
            ]);
        } else {
            abort(404, 'Post not found');
        }
    }


    /**
     *
     * DELETE POST
     * @return redirect back
     *
     *
     */
    public function delete($post_id) {
        Log::debug("entering PostsController.delete: " . $post_id);

        //if post is found and ownner of post is currently user
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'You need to be logged in to delete a post');
        } else if (Post::find($post_id) && auth()->user()->id == Post::find($post_id)->user_id) {
            Post::destroy($post_id);
            return redirect()->route('showUserDetails', auth()->user()->id);
        } else {
            abort(404, 'Post not found');
        }
    }

}
