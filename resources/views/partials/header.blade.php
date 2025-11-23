<header class="fixed top-4 left-1 right-1 bg-maroon rounded-full px-6 py-1 flex items-center justify-between z-50 max-w-sm mx-auto">
    <img src="{{asset('/img/solar_heart-bold-duotone.svg')}}" alt="">

    <div class="flex items-center gap-3">
        <a href="{{route('rsvp')}}" class="bg-white text-maroon px-8 py-1 rounded-full font-semibold">
            R.S.V.P
        </a>
        <button id="menuToggle" class="text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</header>
<div id="menuOverlay" class="fixed inset-0 bg-maroon z-50 hidden max-w-md mx-auto">
    <div class="max-w-md mx-auto h-full flex flex-col px-6 py-8 relative">
        <div>
            <img src="{{asset('/img/solar_heart-bold-duotone.svg')}}" alt="Heart" class="w-12 h-12 mb-12">

            <nav class="space-y-8 text-white text-xl">
                <a href="/" class="block hover:opacity-80">Home</a>
                <a href="/#Location" class="block hover:opacity-80">Location</a>
                <a href="/#Gift" class="block hover:opacity-80">Gift Couple</a>
                <a href="/#Color-of-the-Day" class="block hover:opacity-80">Color of the Day</a>
                <a href="{{route('order-of-event')}}" class="block hover:opacity-80">Order of Event</a>
                <a href="{{route('rsvp')}}" class="block hover:opacity-80">R.S.V.P</a>
            </nav>
        </div>
        <button id="menuClose" class="absolute top-8 right-8 text-white">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>
