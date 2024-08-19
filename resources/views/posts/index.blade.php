@extends('main')
@section('title', '| All Posts')
@section('content')

<div class="flex flex-row justify-between p-5 mx-5">
    <h1 class="text-2xl font-bold">All Posts</h1>
    <a href="{{ route('posts.create') }}" class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-xs py-1 px-2 rounded">Create New Post</a>
</div>
<hr>
<table class="ml-10 ml-10 p-8 text-sm text-left text-gray-700 w-full max-w-xl mx-auto divide-y divide-gray-300 rounded-lg">
    <thead class="text-md text-black bg-gray-50">
        <tr>
        <th>#</th>
        <th>Title</th>
        <th>Body</th>
        <th class="whitespace-nowrap">Created At</th>
        <th class="whitespace-nowrap">Updated At</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody class="font-light text-xs-left bg-white border-b">
        @foreach ($posts as $post)
            <tr>
                <th class="px-6 py-4 font-medium text-gray-700 text-wrap">{{ $post->id }}</th>
                <td class="whitespace-nowrap">{{  $post->title }}</td>
                <td>
                    {{ substr($post->body, 0, 100) }} 
                    {{ strlen($post->body)>100 ? "..." :"" }}
                </td>
                <td class="whitespace-nowrap">{{date('M j, Y', strtotime($post->created_at)) }}</td>
                <td class="whitespace-nowrap">{{date('M j, Y', strtotime($post->updated_at)) }}</td>
                <td class="flex py-5 gap-4">
                    <a href="{{ route('posts.edit', $post->id) }}"  class="border border-gray-600  bg-white hover:bg-gray-300 text-black font-xs py-1 px-2 rounded">Edit</a>
                    <a href="{{ route('posts.show', $post->id) }}"  class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-xs py-1 px-2 rounded">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="items-center mx-auto">
    {!! $posts->links() !!}
</div>
@endsection