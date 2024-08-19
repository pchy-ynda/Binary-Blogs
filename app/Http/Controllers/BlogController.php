<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests;

class BlogController extends Controller {
    public function getIndex(){
        $posts = Post::paginate(10);
        return view('blog.index', compact('posts'));
    }
    public function getSingle($slug){
            //fetch slug from the DB
        $post= Post::where("slug", '=', $slug)->first();
            //return the view and pass it in the post object
        if (!$post) {
            return redirect()->route('blog.index')->with('error', 'Post not found');
        }
        return view('blog.single', compact('post'));
        }
}