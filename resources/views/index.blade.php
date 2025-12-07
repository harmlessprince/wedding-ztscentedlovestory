<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('/img/solar_heart-bold-duotone.svg')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta property="og:title" content="Aqid & Walimatun Nikah - Zuliat & Taofeeq"/>
    <meta property="og:description" content="We are truly honored to have you confirm your presence at our Aqid and Walimatun Nikah.
Your presence means a lot to us, and we can’t wait to share this blessed moment of love, faith, and togetherness with you."/>
    <meta property="og:image" content="https://ztscentedlovestory.taoforge.org/"/>
    <meta property="og:url"
          content="https://res.cloudinary.com/dfyddd3mr/image/upload/v1765056702/wedding_iv_1_yaofsi.jpg"/>
    <meta property="og:type" content="website"/>
    <title>Walimatun Nikah - Zuliat & Taofeeq</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-rose-light font-sans">

<main class="max-w-md mx-auto min-h-screen bg-[#EEE6E6] relative pb-24">
    <a href="{{route('invitation-code')}}"
       class="fixed p-3 bg-champagne right-4 bottom-50 rounded-3xl shadow-lg z-50 hover:scale-95 transition cursor-pointer flex flex-col items-center">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.5"
                  d="M13.9997 2.33325C19.4982 2.33325 22.2481 2.33325 23.9572 4.04125C24.8404 4.92559 25.2674 6.08759 25.4739 7.76525V11.6666H2.52441V7.76525C2.72975 6.08759 3.15558 4.92559 4.03991 4.04125C5.74908 2.33325 8.49891 2.33325 13.9986 2.33325"
                  fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M2.33301 16.3333C2.33301 13.0667 2.33301 11.4333 2.96884 10.185C3.52809 9.08744 4.42044 8.19509 5.51801 7.63583C6.76634 7 8.39967 7 11.6663 7H16.333C19.5997 7 21.233 7 22.4813 7.63583C23.5789 8.19509 24.4713 9.08744 25.0305 10.185C25.6663 11.4333 25.6663 13.0667 25.6663 16.3333C25.6663 19.6 25.6663 21.2333 25.0305 22.4817C24.4713 23.5792 23.5789 24.4716 22.4813 25.0308C21.233 25.6667 19.5997 25.6667 16.333 25.6667H11.6663C8.39967 25.6667 6.76634 25.6667 5.51801 25.0308C4.42044 24.4716 3.52809 23.5792 2.96884 22.4817C2.33301 21.2333 2.33301 19.6 2.33301 16.3333ZM14.8747 12.8333C14.8747 12.6013 14.7825 12.3787 14.6184 12.2146C14.4543 12.0505 14.2317 11.9583 13.9997 11.9583C13.7676 11.9583 13.5451 12.0505 13.381 12.2146C13.2169 12.3787 13.1247 12.6013 13.1247 12.8333V17.7217L11.7013 16.2983C11.6212 16.2124 11.5246 16.1434 11.4173 16.0956C11.31 16.0478 11.1941 16.022 11.0766 16.02C10.9591 16.0179 10.8424 16.0395 10.7335 16.0835C10.6245 16.1275 10.5256 16.193 10.4425 16.2761C10.3594 16.3592 10.2939 16.4582 10.2499 16.5671C10.2059 16.6761 10.1842 16.7928 10.1863 16.9103C10.1884 17.0278 10.2141 17.1436 10.2619 17.251C10.3098 17.3583 10.3787 17.4549 10.4647 17.535L13.3813 20.4517C13.5454 20.6155 13.7678 20.7076 13.9997 20.7076C14.2316 20.7076 14.4539 20.6155 14.618 20.4517L17.5347 17.535C17.6206 17.4549 17.6896 17.3583 17.7374 17.251C17.7852 17.1436 17.811 17.0278 17.813 16.9103C17.8151 16.7928 17.7935 16.6761 17.7495 16.5671C17.7055 16.4582 17.64 16.3592 17.5569 16.2761C17.4738 16.193 17.3748 16.1275 17.2659 16.0835C17.1569 16.0395 17.0402 16.0179 16.9227 16.02C16.8052 16.022 16.6894 16.0478 16.582 16.0956C16.4747 16.1434 16.3781 16.2124 16.298 16.2983L14.8747 17.7217V12.8333Z"
                  fill="white"/>
        </svg>
        <p class="text-white text-center">Invitation <br> Card</p>

    </a>

    <section class="relative max-w-md mx-auto min-h-[90vh]">
        <img src="{{asset('img/hand-drawn-decorative-flower-frame2.svg')}}" alt=""
             class="fixed top-0 left-0 w-64 h-64  z-10" style="max-width: 448px; position: absolute;">

        <img src="{{asset('img/hand-drawn-decorative-flower-frame4.svg')}}" alt=""
             class="fixed top-0 right-0 w-64 h-64 z-10" style="max-width: 448px; position: absolute;">
        @include('partials.header')

        <section class=" text-center mx-6 py-30  flex flex-col gap-3">
            <div>
                <p class="text-gray-700 text-sm mb-2 ">The Families of (Mr. & Mrs.) Ismail Bello &</p>
                <p class="text-gray-700 text-sm mb-6 ">(Mr. & Mrs.) Adewuyi Invite you to the</p>
            </div>

            <h1 class="text-4xl font-bold mb-4">Walimatun Nikah</h1>
            <p class="text-2xl mb-3 font-bold">& Engagement Of</p>

            <div>
                <img src="{{asset('img/long-staff.svg')}}" alt="">
            </div>
            <section class="flex flex-col justify-center items-center my-4">

                <h2 class="text-maroon text-3xl " style="font-family: 'Playwrite NZ Guides', cursive;">Zuliat
                    Ololade</h2>

                <div class="flex justify-center items-center">
                    <img src="{{asset('img/ring.svg')}}" alt="Rings" class="w-16 h-16">
                </div>

                <h2 class="text-maroon text-3xl" style="font-family: 'Playwrite NZ Guides', cursive;">Taofeeq
                    Olamilekan</h2>
            </section>


            <img src="{{asset('img/huge-staff.svg')}}" alt="" class="mx-auto mb-6">

            <p class="text-gray-700 text-sm italic mb-2">"And we created you in pairs"</p>
            <p class="text-gray-700 text-xs">Quran (78:8)</p>
            <a href="{{route('rsvp')}}"
               class="relative z-20 mx-auto bg-maroon text-white py-2 px-16 rounded-full font-semibold flex items-center justify-center gap-2 cursor-pointer">
                <img src="{{asset('img/ticket.svg')}}" alt="">
                <span>Get Invite</span>
            </a>
        </section>


        <img src="{{asset('img/hand-drawn-decorative-flower-frame1.svg')}}" alt=""
             class="absolute bottom-0 left-0 w-64 h-64">
        <img src="{{asset('img/hand-drawn-decorative-flower-frame3.svg')}}" alt=""
             class="absolute bottom-0 right-0 w-64 h-64">
    </section>


    <section id="Color-of-the-Day" class="mx-6 mb-2 mt-4">
        <h2 class="text-3xl font-bold text-center mb-6">Colour of the day</h2>

        <div class="grid grid-cols-2 gap-4">
            <div
                class="bg-[#AC9A59] rounded-2xl overflow-hidden h-48 flex flex-col justify-end p-6 text-center relative">
                <h3 class="text-white text-xl font-bold mb-2 absolute top-2 left-2 font-sans">Groom's Guest</h3>
                <p class="text-white text-sm absolute bottom-2 right-2">Champagne</p>
            </div>

            <div class="bg-maroon rounded-2xl overflow-hidden h-48 flex flex-col justify-end p-6 text-center relative">
                <h3 class="text-white text-xl font-bold mb-2 absolute top-2 left-2 font-sans">Bride's Guest</h3>
                <p class="text-white text-sm absolute bottom-2 right-2">Maroon</p>
            </div>
        </div>
    </section>
    </section>
</main>

@include('partials.footer')

<script type="module" src="/src/index.js"></script>
</body>
</html>
