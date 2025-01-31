<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
    @yield('styles')
</head>

<body>
    @yield('navigation')
    <title>@yield('title')</title>
    <div>
        @if (session()->has('success'))
            <div style="color: rgb(0, 188, 0)">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>
