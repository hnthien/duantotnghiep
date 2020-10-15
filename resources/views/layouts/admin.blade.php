<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images')}}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('admin')</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>
    <div class="row ">
        <header class=" col-margin--none">
           @include('../admin/header');

        </header>
        @yield('content')
    </div>


</body>

</html>