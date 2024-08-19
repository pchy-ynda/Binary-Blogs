@extends('main')
@section('title', '| Create New Post')
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
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-left mt-4 ml-20 p-2">Create New Post</h1>
    <form data-parsley-validate=" " class="ml-12 px-10" action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="border-b border-gray-900/10 pb-12">      
            <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title:</label>
                <div class="mt-2">
                  <div class="flex rounded-md bg-white shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="title" id="title" required data-parsley-required="true" 	
                    maxlength="255" class="form-control w-full block border-0 bg-transparent py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-4">
                <label for="slug" class="block text-sm font-semibold leading-6 text-gray-900">Slug:</label>
                <div class="mt-2">
                  <div class="flex rounded-md bg-white shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="slug" id="slug" required data-parsley-required="true" 	
                    minlength="5" maxlength="255" class="form-control w-full block border-0 bg-transparent py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-4">
                <label for="category_id" class="block text-sm font-semibold leading-6 text-gray-900">Category:</label>
                <div class="mt-2">
                  <div class="flex rounded-md bg-white shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <select name="category_id" required data-parsley-required="true" class="form-control w-full block border-0 bg-transparent py-1.5 pl-1 text-gray-900 sm:text-sm sm:leading-6">
                        @foreach ( $categories as $category )
                          <option value="{{ $category->id }}">{{ $category->name}} </option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="sm:col-span-4">
                <label for="tags" class="block text-sm font-semibold leading-6 text-gray-900">Tags:</label>
                <div class="mt-2 flex rounded-md bg-white shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <select multiple="multiple" name="tags[]" class="select2-multi w-full block border-0 bg-transparent py-1.5 pl-1 text-gray-900 sm:text-sm sm:leading-6">
                      @foreach ( $tags as $tag )
                        <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-span-full">
                    <label for="body" class="block form-control text-sm font-semibold leading-6 text-gray-900">Body:</label>
                    <div class="mt-2">
                    <textarea id="body" name="body" rows="3" required data-parsley-required="true" class="block w-full h-screen resize-none overflow-y-auto rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
              </div>
            </div>
        </div>  
        <div class="mt-6 flex items-center mr-8 gap-x-6">
          <button class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-bold py-2 px-4 rounded">Create Post</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <!-- Include Parsley.js -->
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2-multi').select2();
        });
    </script>

@endsection