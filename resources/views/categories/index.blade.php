@extends('main')
@section('title', '| All Categories')
@section('content')
<div class="text-xl font-bold ml-10 py-3">
    <h1>Categories</h1>
</div>
<div class="relative flex justify-evenly">
    
    <table class="table-auto ml-10 ml-10 py-3 text-sm text-left text-gray-700 w-full max-w-xl mx-auto divide-y divide-gray-300 rounded">
        <thead class="text-md text-black bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $category )
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                    {{ $category->id }}
                </th>
                <td class="px-6 py-4">
                   {{ $category->name }}
                </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('categories.store') }}" method="POST" class="max-w-full mr-10 bg-white shadow-sm rounded px-8 pt-6 pb-8 mb-4 form-control">
        @csrf
        <div class="text-xl font-bold py-3">
            <h1>New Category</h1>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                Name:
            </label>
            <input class="block rounded-md border-0 py-1.5 text-sm text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="category" name="name" type="text">
        </div>
        <div class="flex items-center justify-center">
        <button class="bg-[#FF8225] hover:bg-[#DC5F00] w-full text-sm text-white font-semibold py-1 px-4 rounded">
            Create New Category
        </button>
        </div>
    </form>
</div>

@endsection