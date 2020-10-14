<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ URL::asset('images')}}/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - T20 News</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ URL::asset('css') }}/css.css" rel="stylesheet" />
</head>

<body>

    <div class="row ">
        <header class=" col-margin--none">
           @include('../admin/header');

        </header>
        <main class="col-10 background-white">
            <section class=" col-padding">
                <h1>Administrator</h1>
                <div class="row">
                    <div class="col-4"></div>
                </div>
            </section>
        </main>
    </div>


</body>

</html>