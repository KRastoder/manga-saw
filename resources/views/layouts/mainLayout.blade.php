<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="w-4/5 mx-auto bg-[#F4F2EE]">
    <nav class="pt-6 pb-6 flex justify-between">
        <h2 class="font-light text-2xl self-center"><strong class="font-bold">MANGA</strong>SAW</h2>
        <ul class="flex justify-between w-1/3 self-center">
            <li class="font-semibold"><a href="/">HOME</a></li>
            <li class="font-semibold"><a href="/">ABOUT</a></li>
            <li class="font-semibold"><a href="/shop">SHOP</a></li>
            <li class="font-semibold"><a href="/">ACCESSORIES</a></li>
            <li class="font-semibold"><a href="/">CONTACT</a></li>
            <li class="font-semibold"><a href="#cart" class="flex items-center gap-2 hover:opacity-80 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" stroke="#959189"
                        stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3h2l3 12h11l3-8H8"></path>
                        <circle cx="10" cy="21" r="1"></circle>
                        <circle cx="18" cy="21" r="1"></circle>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>
