<?php 

namespace App\Http\Controllers;
use App\Models\Post;

class PagesController extends Controller {
    #process variable data or params
    #talk to model and receive data from model and compile it
    #pass data to the correct view

    public function getIndex() {
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }
    public function getAbout() {
        return view('pages.about');
    }
    public function getContact() {
        return view('pages.contact');
    }
    
}

