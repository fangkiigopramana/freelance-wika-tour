<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modul 2 Kelompok XX</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f5f5]">
    <div class="h-20 flex justify-between px-6 md:px-16 bg-white">
        <p class="font-bold text-2xl my-auto">Wika Tours and Travel</p>
        <div class="my-auto flex justify items-center">
            <form action="{{ route('landing.cart') }}">
            <button class="mr-6">
                <img src="{{ asset('assets/shopping-cart.svg') }}" alt="" class="h-6 w-6 mt-1.5">
            </button>
        </form>
        <form action="{{ route('landing.history') }}">
            <button class="mr-6">
                <img src="{{ asset('assets/device_reset.svg') }}" alt="" class="h-6 w-6">
            </button>
        </form>
            <form action="{{ route('logout') }}" class=" bg-themeBlue text-white py-2 px-6" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer class="py-20 px-16 xl:px-28 bg-white">
        <div class="flex md:mb-20 flex-col md:flex-row justify-between w-full">
            <div>
                <p class="text-2xl font-bold mb-8">Wika Tours and Travel</p>
                <p class="font-bold">Address:</p>
                <p class="mb-6">Level 1, 12 Sample St, Sydney NSW 2000</p>
                <p class="font-bold">Contact:</p>
                <a href="tel:1800 123 4567" class="underline block">1800 123 4567</a>
                <a href="mailto:info@relume.io" class="underline">info@relume.io</a>

                <div class="flex gap-3 mt-6 mb-6 md:mb-0">
                    <a href="#">
                        <img src="{{asset('assets/Facebook.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{asset('assets/Instagram.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{asset('assets/X.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{asset('assets/LinkedIn.svg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="flex mb-6 md:mb-0">
                <div class="mr-16 md:mr-24">
                    <a href="#" class="block mb-6">About Us</a>
                    <a href="#" class="block mb-6">Careers</a>
                    <a href="#" class="block mb-6">Contact Us</a>
                    <a href="#" class="block mb-6">Blog</a>
                </div>
                <div class="md:mr-24">
                    <a href="#" class="block mb-6">Features</a>
                    <a href="#" class="block mb-6">Pricing</a>
                    <a href="#" class="block mb-6">Security</a>
                    <a href="#" class="block mb-6">Integrations</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full">
            <div class="w-full border border-t-black mb-8"></div>
            <div class="flex justify-between">
                <p>© 2023 Relume. All rights reserved.</p>
                <div class="flex underline">
                    <a href="#" class="mr-4">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
