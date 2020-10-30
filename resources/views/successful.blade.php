<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url={{url('/')}}">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful</title>
    <link rel="shortcut icon" href="{{ URL::asset('images') }}/favicon.ico" />
    <style>
        body {
            margin: 0px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 15%;
        }
    </style>
</head>

<body>
    <h1>Gửi Thành Công</h1>
    <p>Bạn sẽ được đưa về trang chủ trong 2s!</p>
    <div style="text-align: center;margin-top: 40px;">
        <a href="{{url('/')}}"><img src="{{ URL::asset('images') }}/t20.png" width="100px" alt="logo" /></a>
        <br>
        <p style="margin-top: 10px;">© 2018 T20News | Made by T20</p>
    </div>
</body>

</html>