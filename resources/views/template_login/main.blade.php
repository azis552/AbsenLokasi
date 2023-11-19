<!-- layouts/main.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <div id="header">
        @include('template_login.header')
    </div>

    <div id="content">
        @yield('content')
    </div>

    <div id="footer">
        @include('template_login.footer')
    </div>
</body>
</html>
