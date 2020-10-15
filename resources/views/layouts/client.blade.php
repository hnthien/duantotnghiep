<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('client')</title>
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>
   
    <header class="header">
        @include('header');
    </header>
   
        @yield('content')
   
    <footer>
       @include('footer');
    </footer>
</body>

</html>