<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment successful - Walimatun Nikah</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7LSTY7F560"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7LSTY7F560');
    </script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="icon" type="image/svg+xml" href="{{asset('/img/solar_heart-bold-duotone.svg')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CZ:wght@100..400&family=Poppins:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body class="bg-rose-light font-sans">

<div class="max-w-md mx-auto px-3 bg-rose-light min-h-screen pt-14 pb-24">

    @include('partials.header')

    <main id="successSection" class="pt-20 pb-12 w-full">

        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="confetti-piece" style="left: 5%; animation-delay: 0s;"></div>
            <div class="confetti-piece" style="left: 10%; animation-delay: 0.5s;"></div>
            <div class="confetti-piece" style="left: 15%; animation-delay: 1s;"></div>
            <div class="confetti-piece" style="left: 20%; animation-delay: 1.5s;"></div>
            <div class="confetti-piece" style="left: 25%; animation-delay: 2s;"></div>
            <div class="confetti-piece" style="left: 30%; animation-delay: 0.3s;"></div>
            <div class="confetti-piece" style="left: 35%; animation-delay: 0.8s;"></div>
            <div class="confetti-piece" style="left: 40%; animation-delay: 1.3s;"></div>
            <div class="confetti-piece" style="left: 45%; animation-delay: 1.8s;"></div>
            <div class="confetti-piece" style="left: 50%; animation-delay: 0.2s;"></div>
            <div class="confetti-piece" style="left: 55%; animation-delay: 0.7s;"></div>
            <div class="confetti-piece" style="left: 60%; animation-delay: 1.2s;"></div>
            <div class="confetti-piece" style="left: 65%; animation-delay: 1.7s;"></div>
            <div class="confetti-piece" style="left: 70%; animation-delay: 0.4s;"></div>
            <div class="confetti-piece" style="left: 75%; animation-delay: 0.9s;"></div>
            <div class="confetti-piece" style="left: 80%; animation-delay: 1.4s;"></div>
            <div class="confetti-piece" style="left: 85%; animation-delay: 1.9s;"></div>
            <div class="confetti-piece" style="left: 90%; animation-delay: 0.6s;"></div>
            <div class="confetti-piece" style="left: 95%; animation-delay: 1.1s;"></div>
        </div>

        <div class="flex flex-col items-center px-4 relative z-10">

            <div class="mb-6">
                <div class="w-20 h-20 rounded-full border-4 border-[#00A91B] flex items-center justify-center mx-auto">
                    <svg class="w-10 h-10 text-[#00A91B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-gray-800 text-3xl font-bold text-center mb-3">Successful</h1>
            <p class="text-gray-600 text-center mb-8 text-sm px-4">
                {{$message}}
            </p>

            <a
                href="{{route('home')}}"
                class="w-full max-w-sm mx-auto  bg-maroon  py-2 mt-20 rounded-lg text-white text-center text-base block"
                style="font-family: Poppins, sans-serif;"
            >
                Go Home
            </a>
        </div>

    </main>

</div>

@include('partials.footer')
</body>
</html>
