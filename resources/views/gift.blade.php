<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="{{asset('/img/solar_heart-bold-duotone.svg')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Gift the Couple - Walimatun Nikah</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/paystack.js'])
    @endif
    <script src="https://js.paystack.co/v2/inline.js"></script>
</head>
<body class="bg-rose-light font-sans">

<main class="max-w-md mx-auto min-h-screen bg-[#EEE6E6] relative pb-24">
    @include('partials.header')
    <!-- Main Gift Page -->
    <section id="giftMain" class="px-6 pt-24 pb-8">
        <h2 class="text-gray-800 text-3xl font-bold text-center mb-8">Gift the Couple</h2>

        <div class="mb-8">
            <img src="{{asset('img/pana.svg')}}" alt="Gift the Couple" class="w-full max-w-sm mx-auto">
        </div>

        <div class="flex justify-between gap-4">
            <button id="cashBtn" class="bg-[#E5D9D9] rounded-2xl p-4 flex-1 hover:shadow-lg transition">
                <div class="mb-4 rounded-lg overflow-hidden">
                    <img src="{{asset('img/cash.svg')}}" alt="Gift Cash" class="w-full">
                </div>
                <h3 class="text-gray-800 font-semibold text-sm text-center">Gift Cash</h3>
            </button>

            <button id="wishlistBtn"
                    class="bg-[#E5D9D9] rounded-2xl py-2 px-2 flex flex-col items-center flex-1 hover:shadow-lg transition">
                <div class="mb-10 rounded-lg overflow-hidden">
                    <img src="{{asset('img/wishlist.svg')}}" alt="Fulfill Couple's Wishlist" class="w-full">
                </div>
                <h3 class="text-gray-800 font-semibold text-sm text-center -mt-5">Fulfill Couple's Wishlist</h3>
            </button>
        </div>
    </section>

    <!-- Wishlist Page -->
    <section id="wishlistPage" class="pt-20 pb-8 hidden">
        <div class="bg-rose-light px-6 py-4 flex items-center relative">
            <button id="backBtn" class="text-gray-700 absolute left-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h2 class="text-gray-700 text-2xl font-medium text-center flex-1">Couple's Wishlist</h2>
        </div>

        <div id="wishlistContainer" class="px-6 mt-6 space-y-4">
            @foreach($items as $item)
                <div class="bg-[#E5D9D9] rounded-2xl p-6">
                    <h3 class="text-gray-800 text-lg font-normal mb-1">{{$item->name}}</h3>
                    <p class="text-gray-800 text-2xl font-bold mb-4">₦{{number_format($item->price, 2)}}</p>
                    <div class="flex gap-3">
                        <button class="send-money-btn flex-1 bg-[#C9B0B0] text-maroon py-3 rounded-full font-medium hover:opacity-90 transition" id="send-money-btn-{{$item->id}}" data-item-id="{{$item->id}}" data-item-amount="{{$item->price}}">
                            Send Money
                        </button>
                        <button class=" flex place-content-center buy-online-btn flex-1 bg-maroon text-white py-3 rounded-full font-medium hover:opacity-90 transition " data-item-id="{{$item->id}}" data-url="{{$item->buy_online_url}}">
                            Buy online
                        </button>
                    </div>
                </div>
            @endforeach

        </div>

    </section>

    <!-- Cash Gift Modal -->
    <div id="cashModal" class="fixed left-0 right-0 top-0 bottom-16 bg-black/50 z-50 hidden items-end">
        <div id="cashModalContent"
             class="bg-rose-light rounded-t-3xl w-full max-w-md mx-auto relative transform translate-y-full transition-transform duration-300">
            <div class="relative w-full pt-6 pb-4 flex items-center px-4">
                <h3 class="absolute left-1/2 -translate-x-1/2 text-center text-[#363636] text-2xl font-semibold">
                    Cash Gift
                </h3>

                <button id="closeModal" class="ml-auto">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="8" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path d="M7 7l6 6M13 7l-6 6" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            <div class="px-6 pb-6 space-y-4 max-h-[55vh] overflow-y-auto">
                <span id="errorMessage" class="text-red-500 text-md flex items-center justify-center"></span>
                <div>
                    <label class="text-black text-base font-normal block mb-2">Email address</label>
                    <input type="email" id="email" placeholder="example@gmail.com"
                           class="w-full px-4 py-3 rounded-md bg-[#E5D9D9] text-gray-800 placeholder-[#949494] focus:outline-none" required>
                </div>
                <div>
                    <label class="text-black text-base font-normal block mb-2">Full name</label>
                    <input type="text" placeholder="Enter your name"
                           id="fullName"
                           class="w-full px-4 py-3 rounded-md bg-[#E5D9D9] text-gray-800 placeholder-[#949494] focus:outline-none">
                </div>



                <div>
                    <label class="text-black text-base font-normal block mb-2">Phone number</label>
                    <input type="tel" id="phoneNumber" placeholder="Enter your phone number"
                           class="w-full px-4 py-3 rounded-md bg-[#E5D9D9] text-gray-800 placeholder-[#949494] focus:outline-none">
                </div>

                <div>
                    <label class="text-black text-base font-normal block mb-2">Amount (<span id="formattedMoney"></span>)</label>
                    <input type="number"  placeholder=""
                           class="w-full px-4 py-3 rounded-md bg-[#E5D9D9] text-gray-800 placeholder-[#949494] focus:outline-none" id="amountInput" min="500" autofocus>
                </div>
                <div class="flex flex-col gap-2 justify-center items-center">
                    <div>
                        <button type="button" id="customAmountBtn" class="amount-btn px-2 py-2 border border-maroon text-sm rounded hover:bg-maroon hover:text-white transition" data-amount="0">Custom</button>
                        <button type="button" class="amount-btn px-2 py-2 border border-maroon text-sm rounded hover:bg-maroon hover:text-white transition" data-amount="5000">₦5,000</button>
                        <button type="button" class="amount-btn px-2 py-2 border border-maroon text-sm rounded hover:bg-maroon hover:text-white transition" data-amount="10000">₦10,000</button>
                        <button type="button" class="amount-btn px-2 py-2 border border-maroon text-sm rounded hover:bg-maroon hover:text-white transition" data-amount="20000">₦20,000</button>
                        <button type="button" class="amount-btn px-2 py-2 border border-maroon text-sm rounded hover:bg-maroon hover:text-white transition" data-amount="50000">₦50,000</button>
                    </div>
                    <button type="button" class="amount-btn px-2 py-2 border border-maroon text-sm rounded hover:bg-maroon hover:text-white transition" data-amount="100000">₦100,000</button>

                </div>
                <button
                    id="paystackButton"
                    class="w-full bg-maroon text-white py-3.5 rounded-lg font-semibold flex items-center justify-center gap-2 mt-2 hover:opacity-90 transition">
                    <img src="{{asset('img/paystack-icon.svg')}}" alt="" class="w-5 h-5">
                    Pay via Paystack
                </button>
            </div>
        </div>
    </div>
</main>

@include('partials.footer')

</body>
</html>
