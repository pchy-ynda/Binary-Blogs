@extends('main')
@section('title', '| View Post')
@section('content')
    <div class="mx-auto p-4">
        <div>
            <h1 class="text-2xl font-bold my-5 mx-5"> {{ $post->title }}</h1>    
            <p class="text-sm-center mx-5">{{ $post->body }}</p>
            <hr>
            <div class="text-xs">
                @foreach ( $post->tags as $tag)
                    <span class="label"> {{ $tag->name }} </span>
                @endforeach
            </div>
        </div>
        <div class="mx-auto max-w-sm md:max-w-md h-42 p-4 mt-6 rounded border-2 border-gray-300 bg-[#EFEFEF] text-center">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-semibold leading-6 text-gray-900">URL:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                   <a href="{{ route('blog.single', $post->slug)}}">{{ route('blog.single', $post->slug)}}</a></dd>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-semibold leading-6 text-gray-900">Category:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                   <p>{{ $post->category->name}}</p></dd>
            </div>
            <dl class="divide-y divide-gray-100">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-semibold leading-6 text-gray-900">Created At:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    {{ date('M j, Y', strtotime($post->created_at))}}</dd>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-semibold leading-6 text-gray-900">Last Updated:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    {{date('M j, Y', strtotime($post->updated_at)) }}</dd>
            </div>
            </dl>    
            <hr class="my-2">
            <div class="flex gap-6 justify-evenly">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-xs py-1 px-2 rounded">Edit</a>
                <!-- Delete form starts here-->
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete Post" class="font-bold text-red-700 font-xs py-1 px-2 rounded">
                </form>
            </div>
        </div>
@endsection