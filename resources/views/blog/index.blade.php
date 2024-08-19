@extends('main')
@section('title', '| Blog')
@section('content')

<div class="mx-auto max-w-full px-6 lg:px-8">
    <div class="mx-auto max-w-7xl lg:mx-0 mt-4">
        <h2 class="text-lg font-bold tracking-tight text-gray-900 sm:text-xl">From the blog</h2>
        <p class="text-md leading-8 text-gray-600">Explore diverse topics from Computer Science, FinTech, Financial Education, AI, and any more.</p>
        <hr class="max-w-full my-4">
    </div>
    <div class="mx-auto grid max-w-5xl grid-cols-1 gap-x-8 gap-y-16  sm:grid-cols-1 md:grid-cols-2 md:overflow-y-auto lg:mx-0 lg:max-w-none lg:grid-cols-3">
    @foreach ( $posts as $post )
        <article class="flex max-w-md flex-col items-start justify-between rounded shadow-lg p-4 bg-white">
            <div class="flex items-center gap-x-4 text-xs">
                <time class="text-gray-500">{{ date('M j, Y', strtotime($post->created_at)) }}</time>
                <span class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name}}</span>
            </div>
                <div class="group relative">
                <h3 class="mt-3 text-md font-semibold leading-6 text-gray-900 hover:text-gray-500">
                    <a href="{{ route('blog.single', $post->slug) }}">
                    {{ $post->title }}
                    </a>
                </h3>
                <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600">{{ substr($post->body, 0, 100) }} {{ strlen($post->body) > 100 ? "...": ""}}</p>
            </div>
        </article>
    @endforeach
    </div>
</div>

@endsection