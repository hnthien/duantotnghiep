<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-97YX15BZWH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-97YX15BZWH');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('client')</title>
    <meta name='keyword' content="@yield('keyword')">
    <meta name='keyword' content="@yield('keywords')">
    <meta property="og:title" content="Website tin tức tổng hợp t20news chuyên cung cấp những tin tức chính xác về xã hội, thế giới , chính trị , giải trí, pháp luật ....">
     <meta property="og:title" content="@yield('title')">
     <meta property="og:url" content="{{url()->current()}}"> 
    <meta property="og:image" content="https://t20news.xyz/images/post_image/@yield('images')">
   
    
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ URL::asset('css') }}/login.css" rel="stylesheet" />
    <script src="{{ URL::asset('js') }}/images.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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