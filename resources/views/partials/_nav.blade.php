<nav class="bg-[#F8EDED] flex justify-between border-gray-800">
    <div class="flex flex-row space-x-8  items-center max-w-screen-xl p-4 sm:overflow-y-auto md:overflow-y-auto">
        <div class="flex justify-between items-center space-x-3 mr-2 rtl:space-x-reverse">
            <img src="https://i.postimg.cc/kG3KKt6h/newspaper-1.png" class="h-8" alt="Blog Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">Binary Blogs</span>
        </div>
        <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
            <li>
                    <a href="/" class="dark:text-black" aria-current="page">Home</a>
            </li>
            <li>
                <a href="/blog" class="text-gray-900">Blog</a>
            </li>
            <li>
                    <a href="/about" class="text-gray-900 ">About</a>
            </li>
            <li>
                    <a href="/contact" class="text-gray-900">Contact</a>
            </li>
        </ul>
    </div>  
    <div class="ml-auto flex py-4 text-sm items-center justify-self relative">

        @if (auth()->check())            
            <button class="mr-10 dropdown-menu flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none" id="accountDropdownButton">
                <span>Hello, {{ Auth::user()->name }}!</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="accountDropdownMenu" class="hidden absolute top-full right-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-4 z-20">
                <a href="{{ route('posts.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Your Posts</a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Categories</a>
                <a href="{{ route('tags.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tags</a>
                <a href="{{  route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile Settings</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
                </form>
            </div>
        @else
            <a href="{{ route('register') }}" class="text-[#DC5F00] font-bold py-1 px-3 rounded mr-5">Sign Up</a>
            <a href="{{ route('login') }}" class="bg-[#FF8225] hover:bg-[#DC5F00] text-white font-bold py-1 px-3 rounded mr-5">Login</a>

        @endif
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('accountDropdownButton');
        const dropdownMenu = document.getElementById('accountDropdownMenu');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown menu if clicked outside
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>