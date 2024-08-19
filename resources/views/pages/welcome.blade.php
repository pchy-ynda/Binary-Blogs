@extends('main')
@section('title', '| Home')
@section('content')
<!--hero section starts here -->
<div class="max-w-md md:max-w-md h-42 p-4 mt-6 rounded border-2 border-gray-300 mx-auto bg-[#EFEFEF]">
    <h1 class="mb-4 text-lg font-bold text-black text-left font-sans">
        Welcome to Binary Blogs!
    </h1>
    <p class="text-sm text-left text-gray-600 font-sans mb-3">
        Thank you for visiting. Feel free to explore different contents and view the most popular post!
    </p>
    <a href="#" class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-semibold py-1 px-4 rounded">
        Popular Post
    </a>
</div>
<!--news section starts here -->
<div class="grid grid-rows-1 grid-cols-3 gap-5 mt-5">
    @foreach ( $posts as $post)
        <div class="ml-10 col-span-2 bg-[#EFEFEF] px-4 py-2">
            <h2 class="text-lg-left font-semibold">{{ $post->title }}</h2>
            <p class="text-sm text-gray-600 mb-3">{{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? "...": "" }}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="bg-[#FF8225] hover:bg-[#DC5F00] text-white text-xs py-1 px-2 rounded">
                Read More
            </a>
        </div>
    @endforeach

    <div class="rounded col-span-1 mr-5 sm:mr-1 shadow-lg p-4 h-20 w-40 bg-white max-w-xs">
        <div class="flex flex-start gap-2">
            <img src="https://i.ibb.co/PhCW4Xh/businessmen.png" alt="businessmen" class="h-6">
            <h3 class="font-bold text-lg">About Us</h3>
        </div>
        <a href="/about" target="_blank" class="bg-[#FF8225] text-white text-xs py-1 px-4 rounded">Visit</a>
    </div>
</div>

@endsection
