<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body class="bg-rose-light font-sans">

<main class="max-w-md mx-auto min-h-screen bg-[#EEE6E6] relative mb-10">

    <section class="relative max-w-md mx-auto min-h-[90vh]">
        <img src="{{asset('/img/hand-drawn-decorative-flower-frame2.svg')}}" alt=""
             class="fixed top-0 left-0 w-64 h-64  z-10" style="max-width: 448px; position: absolute;">

        <img src="{{asset('/img/hand-drawn-decorative-flower-frame4.svg')}}" alt=""
             class="fixed top-0 right-0 w-64 h-64 z-10" style="max-width: 448px; position: absolute;">

        @include('partials.header')

        <section class=" text-center mx-6 py-30  flex flex-col gap-3">
            <div>
                <p class="text-gray-700 text-sm mb-2 ">The Families of (Mr. & Mrs.) Ismail Bello &</p>
                <p class="text-gray-700 text-sm mb-6 ">(Mr. & Mrs.) Adewuyi Invites you to the</p>
            </div>

            <h1 class="text-4xl font-bold mb-4">Walimatul Nikkah</h1>
            <p class="text-2xl mb-3 font-bold">& Engagement Of</p>

            <div>
                <img src="{{asset('/img/long-staff.svg')}}" alt="">
            </div>
            <section class="flex flex-col justify-center items-center my-4">

                <h2 class="text-maroon text-3xl " style="font-family: 'Playwrite NZ Guides', cursive;">Zuliat
                    Ololade</h2>

                <div class="flex justify-center items-center">
                    <img src="{{asset('/img/ring.svg')}}" alt="Rings" class="w-16 h-16">
                </div>

                <h2 class="text-maroon text-3xl" style="font-family: 'Playwrite NZ Guides', cursive;">Taofeeq
                    Olamilekan</h2>
            </section>


            <img src="{{asset('/img/huge-staff.svg')}}" alt="" class="mx-auto mb-6">

            <p class="text-gray-700 text-sm italic mb-2">"And we created you in pairs"</p>
            <p class="text-gray-700 text-xs">Quran (78:8)</p>
            <a href="{{route('rsvp')}}"
               class="relative z-20 mx-auto bg-maroon text-white py-2 px-16 rounded-full font-semibold flex items-center justify-center gap-2 cursor-pointer">
                <img src="{{asset('/img/ticket.svg')}}" alt="">
                <span>R.S.V.P</span>
            </a>
        </section>


        <img src="{{asset('/img/hand-drawn-decorative-flower-frame1.svg')}}" alt=""
             class="absolute bottom-0 left-0 w-64 h-64">
        <img src="{{asset('/img/hand-drawn-decorative-flower-frame3.svg')}}" alt=""
             class="absolute bottom-0 right-0 w-64 h-64">
    </section>


    <section id="Location" class="bg-wedding bg-cover bg-center min-h-[60vh] px-4 py-8 flex flex-col gap-6">
        <div class="w-full max-w-md mx-auto bg-white/90 backdrop-blur-sm rounded-2xl py-6 px-4 shadow-lg">
            <div class="flex flex-col  items-right gap-2 mb-6">
                <i class="fa-regular fa-calendar-days text-maroon"></i>
                <h3 class="text-black text-xl font-bold ">February 7th, 2026</h3>
            </div>

            <div class="grid grid-cols-4 gap-4 text-left">
                <div>
                    <p class="text-maroon text-xs mb-1">Days</p>
                    <p class="text-maroon text-3xl flex items-center gap-1 font-bold" id="days">103 <span>:</span></p>

                </div>
                <div class="flex flex-col items-center">
                    <p class="text-maroon text-xs mb-1">Hours</p>
                    <p class="text-maroon text-3xl flex items-center gap-1 font-bold" id="hours">23 <span>:</span></p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-maroon text-xs mb-1">Min</p>
                    <p class="text-maroon text-3xl flex items-center gap-1 font-bold" id="minutes">57 <span>:</span></p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-maroon text-xs mb-1">Sec</p>
                    <p class="text-maroon text-3xl font-bold" id="seconds">50</p>
                </div>
            </div>
        </div>

        <div
            class="w-full max-w-md mx-auto bg-[url('/public/img/venue.png')] bg-cover bg-center rounded-2xl overflow-hidden shadow-lg min-h-[400px] flex flex-col justify-end px-4  py-4 relative">
            <div class="absolute inset-0 bg-linear-to-t from-[#5201004D] from-70% to-transparent"></div>

            <div class="relative z-10 bg-white/95 backdrop-blur-sm  py-6 rounded-2xl">
                <div class="flex items-start gap-2 mb-2 px-4">
                    <div class=" w-10 h-10 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24"
                             fill="#520100">
                            <g fill="none" stroke="#520100" stroke-linecap="round" stroke-linejoin="round"
                               stroke-width="1.5" color="currentColor">
                                <path
                                    d="M7 18c-1.829.412-3 1.044-3 1.754C4 20.994 7.582 22 12 22s8-1.006 8-2.246c0-.71-1.171-1.342-3-1.754m-2.5-9a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0"/>
                                <path
                                    d="M13.257 17.494a1.813 1.813 0 0 1-2.514 0c-3.089-2.993-7.228-6.336-5.21-11.19C6.626 3.679 9.246 2 12 2s5.375 1.68 6.467 4.304c2.016 4.847-2.113 8.207-5.21 11.19"/>
                            </g>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-black text-lg font-medium">COMFORT EVENT CENTER</h3>
                        <p class="text-black text-sm">Olorunleke bus stop, Lagos, Badagry Expressway</p>
                    </div>
                </div>

                <div class="px-4">
                    <button
                        class="w-full bg-[#C9B0B0] text-maroon py-3 rounded-full font-semibold mb-4 hover:scale-95 transition">
                        View map
                    </button>
                </div>
                <hr class="mb-4 border-[#C9B0B0] border-t-2 w-full">

                <p class="text-black text-sm px-4">
                    From Mile 2 - Take a bus going to Oko afo - drop at success plaza - Magbon bus stop - cross to the
                    side.
                </p>
            </div>
        </div>


        <div class="w-full max-w-md mx-auto bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-lg space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-maroon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                    <div>
                        <p class="text-maroon text-xs">R.S.V.P (Quadri)</p>
                        <p class="text-maroon font-bold">09058695294</p>
                    </div>
                </div>
                <button class="copy-btn text-maroon" data-copy="09058695294">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-maroon" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                    <div>
                        <p class="text-maroon text-xs">R.S.V.P (Quadri)</p>
                        <p class="text-maroon font-bold">09058695294</p>
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
    </section>


    <section id="Gift" class="mx-6">

        <h2 class="text-maroon text-3xl font-bold text-center mb-6 mt-6">Gift the Couple</h2>

        <div class="bg-rose-medium p-2 rounded-lg">
            <div class="bg-rose-medium rounded-xl overflow-hidden">
                <div class="flex border-4 rounded-2xl border-white bg-white">
                    <button id="groomTab"
                            class="flex-1 bg-[#AC9A59] text-white py-3 rounded-xl font-semibold transition-colors">Groom
                    </button>
                    <button id="brideTab" class="flex-1 text-gray-500 py-3 rounded-xl font-semibold transition-colors">
                        Bride
                    </button>
                </div>


                <div id="groomContent" class="p-6 space-y-4">
                    <div>
                        <p class="text-maroon text-sm mb-1">Account name</p>
                        <div class="flex items-center justify-between bg-white p-3 rounded-lg">
                            <p class="text-maroon font-semibold">Taofeeq Olamilekan Adewuyi</p>
                            <button class="copy-btn text-maroon" data-copy="Taofeeq Olamilekan Adewuyi">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <p class="text-maroon text-sm mb-1">Account number</p>
                        <div class="flex items-center justify-between bg-white p-3 rounded-lg">
                            <p class="text-maroon font-semibold">8131974410</p>
                            <button class="copy-btn text-maroon" data-copy="8131974410">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <p class="text-maroon text-sm mb-1">Bank name</p>
                        <div class="flex items-center justify-between bg-white p-3 rounded-lg">
                            <p class="text-maroon font-semibold">OPay Digital Services Limited(OPay)</p>
                            <button class="copy-btn text-maroon" data-copy="OPay Digital Services Limited(OPay)">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>


                <div id="brideContent" class="p-6 space-y-4 hidden">
                    <div>
                        <p class="text-maroon text-sm mb-1">Account name</p>
                        <div class="flex items-center justify-between bg-white p-3 rounded-lg">
                            <p class="text-maroon font-semibold">Zuliat Ismail-Bello</p>
                            <button class="copy-btn text-maroon" data-copy="Zuliat Ismail-Bello">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <p class="text-maroon text-sm mb-1">Account number</p>
                        <div class="flex items-center justify-between bg-white p-3 rounded-lg">
                            <p class="text-maroon font-semibold">7466364817</p>
                            <button class="copy-btn text-maroon" data-copy="7466364817">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <p class="text-maroon text-sm mb-1">Bank name</p>
                        <div class="flex items-center justify-between bg-white p-3 rounded-lg">
                            <p class="text-maroon font-semibold">PocketApp</p>
                            <button class="copy-btn text-maroon" data-copy="PocketApp">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <section id="Color-of-the-Day" class="mx-6 mb-2 mt-6">
        <h2 class="text-maroon text-3xl font-bold text-center mb-6">Colour of the day</h2>

        <div class="grid grid-cols-2 gap-4">
            <div
                class="bg-[#AC9A59] rounded-2xl overflow-hidden h-48 flex flex-col justify-end p-6 text-center relative">
                <h3 class="text-white text-3xl font-bold mb-2 absolute top-2 left-2 font-sans">Groom</h3>
                <p class="text-white text-sm absolute bottom-2 right-2">Champagne</p>
            </div>

            <div class="bg-maroon rounded-2xl overflow-hidden h-48 flex flex-col justify-end p-6 text-center relative">
                <h3 class="text-white text-3xl font-bold mb-2 absolute top-2 left-2 font-sans">Bride</h3>
                <p class="text-white text-sm absolute bottom-2 right-2">Maroon</p>
            </div>
        </div>
    </section>

    </section>
</main>

@include('partials.footer')
</body>
</html>
