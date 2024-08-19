@extends('main')
@section('title', "| $post->title")
@section('content')
<div class="mx-auto p-4">
    <div>
        <h1 class="text-2xl font-bold my-5 mx-5"> {{ $post->title }}</h1>    
        <p class="text-sm-center mx-5">{{ $post->body }}</p>
    </div>
</div>
    
@endsection