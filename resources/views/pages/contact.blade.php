@extends('main')
@section('title', '| Contact')
@section('content')
<!--hero section starts here -->
<div class="max-w-full mx-auto flex flex-col items-center justify-center align-center w-screen py-4">
    <h1 class="text-lg font-bold">Contact Us</h1>
    <p class="text-sm mb-4">Reach us out for business inquiries and more!</p>
    <div class="w-full max-w-xs">
        <form action="{{ route('posts.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 form-control">
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email:
            </label>
            <input class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="email" type="email">
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                Subject:
            </label>
            <input class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="subject" type="text">
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                Message:
            </label>
            <textarea class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 leading-tight" id="message" type="text" placeholder="Let us know your message.">
            </textarea>                 
            </div>
            <div class="flex items-center justify-center">
            <button class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
            </div>
        </form>
    </div>
</div>

@endsection
