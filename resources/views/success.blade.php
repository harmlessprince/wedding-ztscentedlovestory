<!doctype html>
<html lang="en">
@section('title', 'R.S.V.P Confirmation')
@include('partials.head')
<body class="bg-rose-light font-sans">

<div class="max-w-md mx-auto bg-rose-light min-h-screen px-4">

    @include('partials.header')
    <main id="successSection" class="pt-32 pb-12 hidden">


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

        <div class="flex flex-col items-center justify-center min-h-[70vh]">

            <div class="relative z-10 mb-8">
                <div class="w-24 h-24 rounded-full border-3 border-[#00A91B] flex items-center justify-center mx-auto shadow-lg">
                    <i class="fa-solid fa-check text-2xl text-[#00A91B]"></i>
                </div>
            </div>

            <h1 class="text-black text-4xl font-bold text-center mb-4 relative z-10 font-sans">Successful</h1>
            <p class="text-[#656565] text-center mb-12 px-6 relative z-10">
                Thank you your invitation card has been sent to your mail
            </p>

            <div class="bg-[#E5D9D9] rounded-2xl p-8 text-center mb-8 w-full max-w-sm relative z-10 shadow-lg flex flex-col items-center">
                <p class="text-black text-lg font-semibold">Gift couple</p>

                <div class="">
                    <img src="{{asset('/img/gift.svg')}}" alt="Gift couple">
                </div>

            </div>
            <a
                href="/"
                class="w-full max-w-sm bg-maroon text-white py-4 rounded-lg font-semibold hover:bg-maroon/90 transition-colors text-center block relative z-10"
            >
                Go to home
            </a>
        </div>

    </main>

</div>

@include('partials.footer')
</body>
</html>
