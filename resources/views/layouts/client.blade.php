<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('client')</title>
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <link href="{{ URL::asset('css') }}/login.css" rel="stylesheet" />
    <script src="{{ URL::asset('js') }}/images.js"></script>
</head>

<body>
   
    <header class="header">
        @include('header')
    </header>
   
        @yield('content')
   
    <footer>
       @include('footer')
    </footer>
</body>

</html>