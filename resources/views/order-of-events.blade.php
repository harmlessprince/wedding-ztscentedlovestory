<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{asset('/img/solar_heart-bold-duotone.svg')}}"/>
    <title>Wedding - Order of Event</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-rose-light font-sans">

<div class="max-w-md mx-auto bg-rose-light min-h-screen px-4 pb-24">

    @include('partials.header')

    <section class="mb-6 rounded-lg overflow-hidden mt-28">
        <div class="bg-rose-medium p-2 text-center">
            <div class="flex justify-between items-center mb">
                <img src="img/face-left.svg" alt="" class="w-12 h-12">
                <div class="flex flex-col items-center">
                    <h2 class="text-maroon text-2xl font-bold">Traditional Marriage</h2>
                    <p class="text-maroon font-sans">10:00am-11:30am</p>

                </div>

                <img src="img/face-right.svg" alt="" class="w-12 h-12">
            </div>
        </div>
        <div class="bg-[#AC9A59] p-6">
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>By Compere</span>
            </div>
        </div>
    </section>

    <section class="mb-6 rounded-lg overflow-hidden">
        <div class="bg-rose-medium p-2 text-center">
            <div class="flex justify-between items-center mb-2">
                <img src="img/face-left.svg" alt="" class="w-12 h-12">
                <div>
                    <h2 class="text-maroon text-2xl font-bold">Nikah</h2>
                    <p class="text-maroon">12:00pm-1:30pm</p>

                </div>

                <img src="img/face-right.svg" alt="" class="w-12 h-12">
            </div>

        </div>
        <div class="bg-[#AC9A59] p-6 space-y-3">
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Opening Dua</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Introduction of the officiating Imams</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Introduction of the couple's parent</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Arrival of the Groom</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Arrival of the Bride</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Recitation of the Holy Quran</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Khuthbah on the importance of marriage</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Exchange of Ring</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Signing of marriage certificate</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Advice to the couple</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Closing prayer</span>
            </div>
        </div>
    </section>


    <section class="mb-6 rounded-lg overflow-hidden">
        <div class="bg-rose-medium p-2 text-center">
            <div class="flex justify-between items-center mb-2">
                <img src="img/face-left.svg" alt="" class="w-12 h-12">
                <div>
                    <h2 class="text-maroon text-2xl font-bold">Reception</h2>
                    <p class="text-maroon font-sans">2:00pm-6:00pm</p>
                </div>
                <img src="img/face-right.svg" alt="" class="w-12 h-12">
            </div>
        </div>
        <div class="bg-champagne p-6 space-y-3">
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Opening introduction- Father/Mother of the day</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Couple entrance</span>
            </div>
{{--            <div class="flex items-center gap-3 text-white">--}}
{{--                <img src="img/ring.svg" alt="" class="w-5 h-5">--}}
{{--                <span>Couple First Dance</span>--}}
{{--            </div>--}}
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Father and Daughter dance</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Games</span>
            </div>
{{--            <div class="flex items-center gap-3 text-white">--}}
{{--                <img src="img/ring.svg" alt="" class="w-5 h-5">--}}
{{--                <span>Dance Competition - Bride maid and Grooms men</span>--}}
{{--            </div>--}}
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Groom sibling speech</span>
            </div>
            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Vote of thanks</span>
            </div>

            <div class="flex items-center gap-3 text-white">
                <img src="img/ring.svg" alt="" class="w-5 h-5">
                <span>Dance! Dance! Dance!</span>
            </div>
        </div>
    </section>

</div>
@include('partials.footer')
</body>
</html>
