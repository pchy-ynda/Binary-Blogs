<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;

class CategoryController extends Controller
{   
    // Apply the auth middleware to all methods in this controller
    public function __construct()
    {
 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //display all categories
        $categories = Category::all();
        //a form to create a new category
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        
        //saves a new category to the db
        $category = new Category;
        $category->name = $validatedData['name'];
        $category-> save();

        //redirect back to index page
        return redirect()->route('categories.index');
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
        //
    }
}
