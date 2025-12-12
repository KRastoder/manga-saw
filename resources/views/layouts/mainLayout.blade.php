<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-4/5 mx-auto">
    <nav class="pt-4 pb-4 flex justify-between">
        <h2 class="font-light text-2xl self-center"><strong class="font-bold">MANGA</strong>SAW</h2>
        <ul class="flex justify-between w-1/2 self-center">
            <li class="font-semibold"><a href="/">HOME</a></li>
            <li class="font-semibold"><a href="/">ABOUT</a></li>
            <li class="font-semibold"><a href="/">SHOP</a></li>
            <li class="font-semibold"><a href="/">ACCESSORIES</a></li>
            <li class="font-semibold"><a href="/">CONTACT</a></li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>
