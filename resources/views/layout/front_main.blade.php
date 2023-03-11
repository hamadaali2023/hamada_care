<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('layout.front_head')
</head>

<body>
    <header>
        @include('layout.front_header')
    </header>    
    @yield('content')
    @include('layout.front_footer')
</body>

</html>