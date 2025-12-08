<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('/img/solar_heart-bold-duotone.svg')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Venue - Walimatun Nikah</title>
    {!! RecaptchaV3::initJs() !!}
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7LSTY7F560"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7LSTY7F560');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class="bg-rose-light font-sans">
<main class="max-w-md mx-auto min-h-screen bg-[#EEE6E6] relative pb-24 pt-12">

    @include('partials.header')


    <section id="Location" class="px-6 py-8 flex flex-col gap-6 pt-20">
        <div class="w-full max-w-md mx-auto  rounded-2xl  ">
            <div class="flex items-center gap-2 mb-6">
                <i class="fa-regular fa-calendar-days text-maroon text-2xl"></i>
                <h3 class="text-black text-xl font-bold">February 7th, 2026</h3>
            </div>

            <div class="flex gap-10">
                <div class="flex flex-col gap-2">
                    <p class="text-black text-xs mb-1">Days</p>
                    <p class="text-maroon text-3xl flex items-center justify-center gap-1 font-bold" id="days">103
                        <span>:</span></p>
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-black text-xs mb-1">Hours</p>
                    <p class="text-maroon text-3xl flex items-center justify-center gap-1 font-bold" id="hours">23
                        <span>:</span></p>
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-black text-xs mb-1">Min</p>
                    <p class="text-maroon text-3xl flex items-center justify-center gap-1 font-bold" id="minutes">57
                        <span>:</span></p>
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-black text-xs mb-1">Sec</p>
                    <p class="text-maroon text-3xl font-bold" id="seconds">50</p>
                </div>
            </div>
        </div>

        <div id="venueBackground" class="w-full max-w-md mx-auto rounded-2xl overflow-hidden shadow-lg relative bg-cover bg-center h-96 transition-all duration-1000 ease-in-out" style="background-image: url('img/venue.png');">
            <div class="absolute bottom-3 left-3 right-3 bg-white/90 backdrop-blur-sm py-6 px-4 rounded-2xl">
                <div class="flex items-start gap-2 mb-2">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="#520100"><g fill="none" stroke="#520100" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M7 18c-1.829.412-3 1.044-3 1.754C4 20.994 7.582 22 12 22s8-1.006 8-2.246c0-.71-1.171-1.342-3-1.754m-2.5-9a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0"/><path d="M13.257 17.494a1.813 1.813 0 0 1-2.514 0c-3.089-2.993-7.228-6.336-5.21-11.19C6.626 3.679 9.246 2 12 2s5.375 1.68 6.467 4.304c2.016 4.847-2.113 8.207-5.21 11.19"/></g></svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-black text-lg font-bold">COMFORT EVENT CENTER</h3>
                        <p class="text-black text-sm">Olorunleke bus stop, Lagos, Badagry Expressway</p>
                    </div>
                </div>

                <a
                    target="_blank"
                    class="flex items-center place-content-center w-full bg-rose-light text-maroon py-3 rounded-full font-semibold hover:scale-95 transition"
                   href="https://www.google.com/maps/place/Comfort+Event+Center/@6.4831961,3.041331,1562m/data=!3m2!1e3!4b1!4m6!3m5!1s0x103b7f0583b80a4d:0xfa87e12f9fbfcb28!8m2!3d6.4831961!4d3.0439059!16s%2Fg%2F11f7pt_bdh?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D"
                >
                    View map
                </a>
            </div>
        </div>

        <div class="w-full max-w-md mx-auto space-y-2 bg-[#E5D9D9] p-4 rounded-xl">
            <div class="flex items-center justify-between bg-rose-light p-3 rounded-xl">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-maroon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                    <div>
                        <p class="text-gray-600 text-xs">Mariam (bride's family)</p>
                        <p class="text-black font-bold">07062823227</p>
                    </div>
                </div>
                <button class="copy-btn text-maroon" data-copy="07062823227">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
            </div>

            <div class="flex items-center justify-between bg-rose-light p-3 rounded-xl">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-maroon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                    <div>
                        <p class="text-gray-600 text-xs">Quadri (groom's family)</p>
                        <p class="text-black font-bold">09058695294</p>
                    </div>
                </div>
                <button class="copy-btn text-maroon" data-copy="09058695294">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="w-full max-w-md mx-auto ">
            <h3 class="text-black text-xl font-bold mb-4 text-center">Directions</h3>
            <div class="space-y-4">
                <div class="flex items-start gap-3 border-b pb-3 border-b-[#E5D9D9]">
                    <div class="bg-[#E5D9D9] h-10 w-20 flex items-center justify-center rounded-full">
                        <svg width="30" height="40" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.7559 4.74896C18.7559 4.74896 20.7549 6.22196 20.7549 6.74896C20.7549 7.27596 18.7549 8.74896 18.7549 8.74896M20.5299 6.88196C19.1179 6.59196 16.4719 6.47895 15.1619 8.93195C14.6189 9.79595 14.7199 11.242 14.7199 12.888C14.6869 13.558 14.1149 14.779 12.6829 14.748C11.2509 14.717 10.7809 13.542 10.7249 12.958L10.7249 2.84695C10.7389 1.99495 10.2449 0.749954 8.72888 0.749954C7.24888 0.749954 6.66888 2.06195 6.79688 3.04495C7.14288 5.70895 6.33388 8.50195 2.83388 8.74595L0.749882 8.74595"
                                stroke="#520100" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                    <p class="text-black text-sm">
                        From Mile 2 - Take a bus going to Oko afo, drop at success plaza after Magbon bus stop, cross to the other side.
                    </p>
                </div>

                <div class="flex items-start gap-3 border-b pb-3 border-b-[#E5D9D9]">
                    <div class="bg-[#E5D9D9] h-10 w-20 flex items-center justify-center rounded-full">
                        <svg width="30" height="40" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.7559 4.74896C18.7559 4.74896 20.7549 6.22196 20.7549 6.74896C20.7549 7.27596 18.7549 8.74896 18.7549 8.74896M20.5299 6.88196C19.1179 6.59196 16.4719 6.47895 15.1619 8.93195C14.6189 9.79595 14.7199 11.242 14.7199 12.888C14.6869 13.558 14.1149 14.779 12.6829 14.748C11.2509 14.717 10.7809 13.542 10.7249 12.958L10.7249 2.84695C10.7389 1.99495 10.2449 0.749954 8.72888 0.749954C7.24888 0.749954 6.66888 2.06195 6.79688 3.04495C7.14288 5.70895 6.33388 8.50195 2.83388 8.74595L0.749882 8.74595"
                                stroke="#520100" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                    <p class="text-black text-sm">
                        From Oshodi - Take a bus going to Igando, from igando, take a bus going to Iyanoba, drop at first gate, then take a bus going to Oko afo, drop at success plaza after Magbon bus stop, then cross to the other side.
                    </p>
                </div>
                <div class="flex items-start gap-3 border-b pb-3 border-b-[#E5D9D9]">
                    <div class="bg-[#E5D9D9] h-10 w-20 flex items-center justify-center rounded-full">
                        <svg width="30" height="40" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.7559 4.74896C18.7559 4.74896 20.7549 6.22196 20.7549 6.74896C20.7549 7.27596 18.7549 8.74896 18.7549 8.74896M20.5299 6.88196C19.1179 6.59196 16.4719 6.47895 15.1619 8.93195C14.6189 9.79595 14.7199 11.242 14.7199 12.888C14.6869 13.558 14.1149 14.779 12.6829 14.748C11.2509 14.717 10.7809 13.542 10.7249 12.958L10.7249 2.84695C10.7389 1.99495 10.2449 0.749954 8.72888 0.749954C7.24888 0.749954 6.66888 2.06195 6.79688 3.04495C7.14288 5.70895 6.33388 8.50195 2.83388 8.74595L0.749882 8.74595"
                                stroke="#520100" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                    <p class="text-black text-sm">
                        From Iyanapaja/Egbeda - Take a bus going to Iyanoba, drop at first gate, take a bus going to Oko afo, drop at success plaza after Magbon bus stop, then cross to the other side.
                    </p>

                </div>
            </div>
        </div>
    </section>
</main>

@include('partials.footer')
</body>
</html>
