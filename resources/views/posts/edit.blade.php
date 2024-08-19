@extends('main')
@section('title', '| Edit Post')
@section('stylesheets')
<link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#body', 
    plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    menubar: false
  });
</script>
@endsection

@section('content')
    <div class="p-4">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mx-auto">
                <label for="title" class="text-md font-bold my-6 mx-5">Title: </label>
                <input value="{{ old('title', $post->title) }}" name="title" id="title" class=" w-full block text-sm mx-5 px-2 border-gray-400 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6 form-control">
                
                <label for="category_id" class="text-md font-bold my-5 mx-5">Category: </label>
                <select name="category_id" id="category_id" class="mx-5 w-full block border-0 bg-white rounded-md py-1.5 pl-1 text-gray-900 sm:text-sm sm:leading-6 ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                    @endforeach
                </select>
                <label for="body" class="text-md font-bold my-5 mx-5">Body: </label>
                <textarea name="body" id="body" class="block text-sm w-full h-screen resize-none overflow-y-auto mx-5 px-2 border-gray-400 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-400 sm:text-sm sm:leading-6 form-control">{{ old('body', $post->body) }}</textarea>
           </div>
            <div class="mx-auto max-w-sm md:max-w-md h-42 p-4 mt-6 rounded border-2 border-gray-300 bg-[#EFEFEF] text-center">
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
                    <a href="{{ route('posts.show', $post->id) }}" class="font-semibold text-gray-600 hover:text-gray-900 font-xs py-1 px-2 rounded">Cancel</a>
                    <input type="submit" value="Save Changes" class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-xs py-1 px-2 rounded">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <!-- Parsley.js -->
    <script src="{{ asset('js/parsley.min.js') }}"></script> 

@endsection