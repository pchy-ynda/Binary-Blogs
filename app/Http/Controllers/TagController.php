<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{   
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // Store a new Tag instance and save it to the database
        $tag = new Tag;
        $tag->name = $validatedData['name'];
        $tag-> save();

        //Redirect to another page
        return redirect()->route('tags.index');       

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();

        $tag->delete();
        return redirect()->route('tags.index');
    }
}
