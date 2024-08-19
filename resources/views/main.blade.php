<!-- extract repetitive elements from all the pages into a single one-->
<!DOCTYPE html>
<html lang="en">
@include('partials._head')
    <body class="py-0 bg-[#F5F5F5]">
        @include('partials._nav')
        
        <div>
            @yield('content')
        </div>
    </body>
    <footer>
        @include('partials._footer')
    </footer>
</html>
