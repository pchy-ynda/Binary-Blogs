<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    // Apply the auth middleware to all methods in this controller
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //create a variable and store all the blog posts from DB into it
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //return a view and pass into the variable above
        return view('posts.index')->with('posts', $posts);
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug,except,id',
            'category_id' => 'required|numeric',
            'tags' => 'array',
            'tags.*' => 'numeric', // Validate each tag ID as a number
            'body' => 'required',
        ]);

        // Store a new Post instance and save it to the database
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->category_id = $validatedData['category_id'];
        $post->body = $validatedData['body'];
        $post-> save();

        $post->tags()->sync($request->tags, false);

        //Redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    public function show(string $id)
    {   
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Find the post id in the DB and save as a var
        $post = Post::find($id);
        
        $categories = Category::all();
        $cats = $categories->pluck('name', 'id'); // This generates an associative array with id as key and name as value

        //Return the view and pass in the var we previously created
        return view('posts.edit')->with('post', $post)->with('categories', $cats);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validate data
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'category_id' => 'required|integer',
        'body' => 'required',
        ]);

        //Grab the post object row from the DB
        $post = Post::find($id);
        $post->title = $validatedData['title'];
        $post->category_id = $validatedData['category_id'];
        $post->body = $validatedData['body'];

        //Save it to the DB
        $post->save();

        //Redirect to blog page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        $post->tags()->detach();
        return redirect()->route('posts.index');
    }
}
