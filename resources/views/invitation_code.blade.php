<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{asset('/img/solar_heart-bold-duotone.svg')}}"/>
    <title>Invitation Code - Walimatun Nikah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+CZ:wght@100..400&family=Poppins:ital,wght@0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    {!! RecaptchaV3::initJs() !!}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7LSTY7F560"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7LSTY7F560');
    </script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-rose-light font-sans">

<div class="max-w-md mx-auto bg-rose-light min-h-screen py-6
   pb-24">

    @include('partials.header')
    <div class="">
        <input type="hidden" id="invitationCardUrl" name="invitationCardUrl" value="">
    </div>
    <!-- Form Section - Enter Code -->
    <main id="codeFormSection" class="pt-20 pb-12 px-6">
        <!-- Header with Back Button and Title -->
        <div class="flex items-center mb-8">
            <button onclick="history.back()" class="flex items-center gap-2 text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-gray-800 text-xl font-semibold flex-1 text-center">Invitation Code</h1>
            <div class="w-6"></div>
        </div>

        <form id="codeForm" class="space-y-6">
            <span id="errorMessage" class="text-red-500 text-md flex items-center justify-center"></span>
            <div>
                <label for="invitationCode" class="text-gray-700 text-sm font-medium block mb-2">Invitation Code</label>
                <div class="flex justify-between p-2 bg-[#E5D9D9] rounded-lg">
                    <input
                        type="text"
                        id="invitationCode"
                        name="invitationCode"
                        placeholder="Enter code or phone number"
                        class="py-2 rounded-lg  outline-none placeholder-gray-400"
                    >
                    <button
                        type="button"
                        id="pasteBtn"
                        class="py-2 rounded-lg text-maroon text-sm"
                    >
                        Paste Code
                    </button>
                </div>
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-maroon text-white py-4 rounded-full font-semibold hover:bg-maroon/90 transition"
                    id="codeFormButton"
                >
                    Proceed
                </button>
            </div>
            <div class="space-y-4">
                <p class="text-gray-600 text-center text-sm">Don't have an invitation code?</p>
                <a
                    href="{{route('rsvp')}}"
                    class="block w-full bg-rose-medium text-maroon py-3 rounded-full font-semibold hover:opacity-90 transition text-center"
                >
                    Get your invitation code
                </a>
            </div>


        </form>
    </main>

    <!-- Invitation Display Section - Hidden by default -->
    <main id="invitationSection" class="pt-20 pb-12 px-6 hidden">
        <!-- Header with Back Button and Title -->
        <div class="flex items-center mb-6">
            <button onclick="window.location.href='/'" class="flex items-center gap-2 text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-gray-800 text-xl font-semibold flex-1 text-center">Invitation Code</h1>
            <div class="w-6"></div>
        </div>

        <!-- Code Display with Clear -->
        <div class="mb-6 ">
            <label class="text-gray-700 text-sm font-medium block mb-2">Invitation Code</label>
            <div class="flex items-center justify-between bg-[#E5D9D9] px-4 py-4 rounded-lg">
                <span id="displayedCode" class="text-gray-800 font-semibold">SHIKEO-2436</span>
                <button
                    id="clearBtn"
                    class="text-maroon hover:opacity-80 transition text-2xl"
                >
                    Clear
                </button>
            </div>
        </div>

        <!-- Invitation Attachment -->
        <div class="w-full p-3 rounded-lg">
            <div class="p-3 rounded-xl mb-6">
                <img src="" id="invitationCardContainer">
            </div>
{{--            <div class="bg-rose-light p-3 rounded-xl mb-6">--}}
{{--                <h3 class="text-center text-sm p-1"><span id="inviteeName"--}}
{{--                                                          class="font-semibold text-maroon">ADEWUYI</span>, YOU'RE--}}
{{--                    INVITED TO</h3>--}}


{{--                <div--}}
{{--                    style="background-image: url({{asset('img/bg-envelope_qoccre.png')}}); background-repeat: no-repeat; background-position: center; background-size: cover; "--}}
{{--                    class="flex flex-col pb-10 pt-4">--}}

{{--                    <p class="wedding-invite-playwrite text-center  text-lg text-maroon ">--}}
{{--                        Zuliat Ololade--}}
{{--                    </p>--}}

{{--                    <div class="text-center">--}}
{{--                        <img--}}
{{--                            src="https://res.cloudinary.com/ibreathcode/image/upload/v1764440875/product/ring_gfepe1.svg"--}}
{{--                            alt="ring" style="width: 40px; height: 34px; display: inline-block;">--}}
{{--                    </div>--}}

{{--                    <p class="wedding-invite-playwrite text-center  text-lg text-maroon">--}}
{{--                        Taofeeq Olamilekan--}}
{{--                    </p>--}}


{{--                    <div>--}}
{{--                        <p class="text-center text-sm text-maroon py-2">--}}
{{--                            Aqid & Walimatun Nikah--}}
{{--                        </p>--}}
{{--                    </div>--}}


{{--                    <div class="flex justify-center py-1">--}}
{{--                        <div class="text-center bg-rose-light px-3 py-2 rounded-lg">--}}
{{--                            <div style="display: flex; align-items: center; gap: 8px;">--}}

{{--                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">--}}
{{--                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                          d="M7.552 6.51859V6.77067C7.552 6.97787 7.63431 7.17659 7.78082 7.3231C7.92734 7.46961 8.12605 7.55192 8.33325 7.55192C8.54045 7.55192 8.73917 7.46961 8.88568 7.3231C9.03219 7.17659 9.1145 6.97787 9.1145 6.77067V6.51025H15.8853V6.77067C15.8853 6.97787 15.9676 7.17659 16.1142 7.3231C16.2607 7.46961 16.4594 7.55192 16.6666 7.55192C16.8738 7.55192 17.0725 7.46961 17.219 7.3231C17.3655 7.17659 17.4478 6.97787 17.4478 6.77067V6.51859C17.5631 6.52275 17.668 6.52866 17.7624 6.5363C18.0624 6.56025 18.2051 6.604 18.2989 6.65192C18.5447 6.77692 18.7437 6.97588 18.8687 7.22171C18.9166 7.31546 18.9603 7.45817 18.9843 7.75713C19.0093 8.06546 19.0103 8.46546 19.0103 9.06234V9.63525H5.9895V9.06234C5.9895 8.4665 5.9895 8.06546 6.01554 7.75713C6.0395 7.45817 6.08325 7.31546 6.13117 7.22171C6.25607 6.97631 6.45556 6.77682 6.70096 6.65192C6.79471 6.604 6.93742 6.56025 7.23638 6.5363C7.34142 6.52773 7.44666 6.52183 7.552 6.51859Z"--}}
{{--                                          fill="#520100"/>--}}
{{--                                    <path--}}
{{--                                        d="M8.85409 14.5832C9.19942 14.5832 9.53061 14.446 9.7748 14.2018C10.019 13.9576 10.1562 13.6264 10.1562 13.2811C10.1562 12.9358 10.019 12.6046 9.7748 12.3604C9.53061 12.1162 9.19942 11.979 8.85409 11.979C8.50875 11.979 8.17756 12.1162 7.93337 12.3604C7.68919 12.6046 7.552 12.9358 7.552 13.2811C7.552 13.6264 7.68919 13.9576 7.93337 14.2018C8.17756 14.446 8.50875 14.5832 8.85409 14.5832ZM8.85409 18.229C9.19942 18.229 9.53061 18.0918 9.7748 17.8476C10.019 17.6034 10.1562 17.2723 10.1562 16.9269C10.1562 16.5816 10.019 16.2504 9.7748 16.0062C9.53061 15.762 9.19942 15.6248 8.85409 15.6248C8.50875 15.6248 8.17756 15.762 7.93337 16.0062C7.68919 16.2504 7.552 16.5816 7.552 16.9269C7.552 17.2723 7.68919 17.6034 7.93337 17.8476C8.17756 18.0918 8.50875 18.229 8.85409 18.229ZM13.802 13.2811C13.802 13.6264 13.6648 13.9576 13.4206 14.2018C13.1764 14.446 12.8453 14.5832 12.4999 14.5832C12.1546 14.5832 11.8234 14.446 11.5792 14.2018C11.335 13.9576 11.1978 13.6264 11.1978 13.2811C11.1978 12.9358 11.335 12.6046 11.5792 12.3604C11.8234 12.1162 12.1546 11.979 12.4999 11.979C12.8453 11.979 13.1764 12.1162 13.4206 12.3604C13.6648 12.6046 13.802 12.9358 13.802 13.2811ZM12.4999 18.229C12.8453 18.229 13.1764 18.0918 13.4206 17.8476C13.6648 17.6034 13.802 17.2723 13.802 16.9269C13.802 16.5816 13.6648 16.2504 13.4206 16.0062C13.1764 15.762 12.8453 15.6248 12.4999 15.6248C12.1546 15.6248 11.8234 15.762 11.5792 16.0062C11.335 16.2504 11.1978 16.5816 11.1978 16.9269C11.1978 17.2723 11.335 17.6034 11.5792 17.8476C11.8234 18.0918 12.1546 18.229 12.4999 18.229ZM17.4478 13.2811C17.4478 13.6264 17.3107 13.9576 17.0665 14.2018C16.8223 14.446 16.4911 14.5832 16.1458 14.5832C15.8004 14.5832 15.4692 14.446 15.225 14.2018C14.9809 13.9576 14.8437 13.6264 14.8437 13.2811C14.8437 12.9358 14.9809 12.6046 15.225 12.3604C15.4692 12.1162 15.8004 11.979 16.1458 11.979C16.4911 11.979 16.8223 12.1162 17.0665 12.3604C17.3107 12.6046 17.4478 12.9358 17.4478 13.2811Z"--}}
{{--                                        fill="#520100"/>--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                          d="M8.33325 3.38525C8.54045 3.38525 8.73917 3.46756 8.88568 3.61408C9.03219 3.76059 9.1145 3.9593 9.1145 4.1665V4.94775H15.8853V4.1665C15.8853 3.9593 15.9676 3.76059 16.1142 3.61408C16.2607 3.46756 16.4594 3.38525 16.6666 3.38525C16.8738 3.38525 17.0725 3.46756 17.219 3.61408C17.3655 3.76059 17.4478 3.9593 17.4478 4.1665V4.95609C17.6062 4.96025 17.7537 4.96789 17.8905 4.979C18.2864 5.01025 18.6572 5.08109 19.0083 5.26025C19.5474 5.53491 19.9857 5.97322 20.2603 6.51234C20.4395 6.86338 20.5103 7.23421 20.5416 7.63005C20.5728 8.01025 20.5728 8.4738 20.5728 9.03109V17.0103C20.5728 17.5675 20.5728 18.0311 20.5416 18.4113C20.5103 18.8071 20.4395 19.178 20.2603 19.529C19.986 20.068 19.548 20.5063 19.0093 20.7811C18.6572 20.9603 18.2864 21.0311 17.8905 21.0623C17.5103 21.0936 17.0468 21.0936 16.4905 21.0936H8.51034C7.95304 21.0936 7.4895 21.0936 7.10929 21.0623C6.71346 21.0311 6.34263 20.9603 5.99159 20.7811C5.45278 20.507 5.01451 20.0694 4.7395 19.5311C4.56034 19.179 4.4895 18.8082 4.45825 18.4123C4.427 18.0321 4.427 17.5686 4.427 17.0123V9.03109C4.427 8.4738 4.427 8.01025 4.45825 7.63005C4.4895 7.23421 4.56034 6.86338 4.7395 6.51234C5.01416 5.97322 5.45247 5.53491 5.99159 5.26025C6.34263 5.08109 6.71346 5.01025 7.10929 4.979C7.2461 4.96789 7.39367 4.96025 7.552 4.95609V4.1665C7.552 4.06391 7.57221 3.96232 7.61147 3.86753C7.65073 3.77275 7.70828 3.68662 7.78082 3.61408C7.85337 3.54153 7.93949 3.48398 8.03428 3.44472C8.12907 3.40546 8.23066 3.38525 8.33325 3.38525ZM7.552 6.77067V6.51859C7.44666 6.52183 7.34142 6.52773 7.23638 6.5363C6.93742 6.56025 6.79471 6.604 6.70096 6.65192C6.45556 6.77682 6.25607 6.97631 6.13117 7.22171C6.08325 7.31546 6.0395 7.45817 6.01554 7.75713C5.99054 8.06546 5.9895 8.46546 5.9895 9.06234V9.63525H19.0103V9.06234C19.0103 8.4665 19.0103 8.06546 18.9843 7.75713C18.9603 7.45817 18.9166 7.31546 18.8687 7.22171C18.7438 6.97631 18.5443 6.77682 18.2989 6.65192C18.2051 6.604 18.0624 6.56025 17.7624 6.5363C17.6577 6.52775 17.5528 6.52185 17.4478 6.51859V6.77067C17.4478 6.97787 17.3655 7.17659 17.219 7.3231C17.0725 7.46961 16.8738 7.55192 16.6666 7.55192C16.4594 7.55192 16.2607 7.46961 16.1142 7.3231C15.9676 7.17659 15.8853 6.97787 15.8853 6.77067V6.51025H9.1145V6.77067C9.1145 6.97787 9.03219 7.17659 8.88568 7.3231C8.73917 7.46961 8.54045 7.55192 8.33325 7.55192C8.12605 7.55192 7.92734 7.46961 7.78082 7.3231C7.63431 7.17659 7.552 6.97787 7.552 6.77067ZM19.0103 10.6769H5.9895V16.979C5.9895 17.5748 5.9895 17.9759 6.01554 18.2832C6.0395 18.5832 6.08325 18.7259 6.13117 18.8196C6.25617 19.0655 6.45513 19.2644 6.70096 19.3894C6.79471 19.4373 6.93742 19.4811 7.23638 19.505C7.54471 19.53 7.94471 19.5311 8.54158 19.5311H16.4583C17.0541 19.5311 17.4551 19.5311 17.7624 19.505C18.0624 19.4811 18.2051 19.4373 18.2989 19.3894C18.5443 19.2645 18.7438 19.065 18.8687 18.8196C18.9166 18.7259 18.9603 18.5832 18.9843 18.2832C19.0093 17.9759 19.0103 17.5748 19.0103 16.979V10.6769Z"--}}
{{--                                          fill="#520100"/>--}}
{{--                                </svg>--}}

{{--                                <span style="font-size: 12px; font-weight: 500; color: #520100; white-space: nowrap;">--}}
{{--                        February 7th, 2026--}}
{{--                      </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <p class="text-center text-xs">--}}
{{--                        "And we created you in pairs"--}}
{{--                    </p>--}}

{{--                    <div style="text-align: center; padding: 0 0 75px 0;">--}}
{{--                        <p style="font-size: 12px; color: #475569; margin: 0;">--}}
{{--                            Quran (78:8)--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}


            <!-- Download Button -->
            <button
                id="downloadBtn"
                class="w-full bg-maroon text-white py-4 rounded-full font-semibold hover:bg-maroon/90 transition"
            >
                Download
            </button>
        </div>
    </main>

</div>

@include('partials.footer')
</body>
</html>
