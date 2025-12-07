<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get ticket - Walimatul Nikkah</title>
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


    <main id="formSection" class="pt-28 pb-12">
        <h1 class="text-maroon text-4xl font-bold text-center mb-8 font-sans">R.S.V.P</h1>

        <form id="ticketForm" class="space-y-4">
            <span id="errorMessage" class="text-red-500 text-md flex items-center justify-center"></span>
            <div>
                <label for="surname" class="text-black text-sm font-medium block mb-2">Surname</label>
                <input
                    type="text"
                    id="surname"
                    name="surname"
                    placeholder="Enter your surname"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#E5D9D9] border-none outline-none focus:ring-2 focus:ring-maroon placeholder-gray-400"
                >
            </div>

            <div>
                <label for="firstname" class="text-black text-sm font-medium block mb-2">First name</label>
                <input
                    type="text"
                    id="firstname"
                    name="firstname"
                    placeholder="Enter your first name"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#E5D9D9] border-none outline-none focus:ring-2 focus:ring-maroon placeholder-gray-400"
                >
            </div>


            <div>
                <label for="phone" class="text-black  text-sm font-medium block mb-2">Phone number</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Enter your phone number"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#E5D9D9] border-none outline-none focus:ring-2 focus:ring-maroon placeholder-gray-400"
                >
            </div>


            <div>
                <label for="email" class="text-black text-sm font-medium block mb-2">Email address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="example@gmail.com"
                    required
                    autocomplete="true"
                    class="w-full px-4 py-3 rounded-lg bg-[#E5D9D9] border-none outline-none focus:ring-2 focus:ring-maroon placeholder-gray-400"
                >
            </div>

            <div>
                <label for="side" class="text-black text-sm font-medium block mb-2">Are you with the Groom or Bride?</label>
                <div class="flex gap-2 mb-4">
                    <button
                        type="button"
                        id="groomGuestBtn"
                        class="flex-1 py-3 rounded-lg border-2 border-maroon bg-[#C9B0B0] text-gray-700 font-semibold transition-colors"
                    >
                        Groom
                    </button>
                    <button
                        type="button"
                        id="brideGuestBtn"
                        class="flex-1 py-3 rounded-lg bg-[#E5D9D9] text-gray-500 font-semibold transition-colors"
                    >
                        Bride
                    </button>
                </div>
                <input type="hidden" id="guestType" name="guestType" value="GROOM">
            </div>


            <div>
                <label for="message" class="text-black text-sm font-medium block mb-2">Message for us (Optional)</label>
                <textarea
                    id="message"
                    name="message"
                    rows="10"
                    placeholder="Enter message"
                    class="w-full px-4 py-3 rounded-lg bg-[#E5D9D9] border-none outline-none focus:ring-2 focus:ring-maroon placeholder-gray-400 resize-none"
                ></textarea>
            </div>


            <div class="bg-red-600 rounded-xl p-3 flex items-center gap-4">
                <div class="h-8 w-8 border-2 border-white rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-exclamation text-white"></i>
                </div>
                <p class="text-sm text-white font-sans">Ticket admits one guest(person)</p>
            </div>

            <button
                type="submit"
                class="w-full bg-maroon text-white py-4 rounded-lg font-semibold hover:bg-maroon/90 transition-colors"
            >
                Submit
            </button>
        </form>
    </main>


    <main id="successSection" class="pt-20 pb-12 w-full hidden">

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
                Thank you! Your invitation card will be sent to your email or just download below.
            </p>


            <div class="bg-[#E5D9D9] w-full p-3 rounded-md">
                <h2 class="text-gray-800 text-lg font-semibold text-center mb-4">Download your invitation card</h2>

                <div class="bg-rose-light p-3 rounded-lg mb-6">
                    <h3 class="text-center text-sm p-1"><span id="invitee_name"></span>, YOU'RE INVITED TO</h3>


                    <div style="background-image: url({{asset('img/bg-envelope_qoccre.png')}}); background-repeat: no-repeat; background-position: center; background-size: cover; " class="flex flex-col pb-10 pt-4" >

                        <p class="wedding-invite-playwrite text-center  text-lg text-maroon ">
                            Zuliat Ololade
                        </p>

                        <div class="text-center">
                            <img src="https://res.cloudinary.com/ibreathcode/image/upload/v1764440875/product/ring_gfepe1.svg" alt="ring" style="width: 40px; height: 34px; display: inline-block;">
                        </div>

                        <p class="wedding-invite-playwrite text-center  text-lg text-maroon">
                            Taofeeq Olamilekan
                        </p>


                        <div>
                            <p class="text-center text-sm text-maroon py-2">
                                Aqid & Walimatul Nikkah
                            </p>
                        </div>


                        <div class="flex justify-center py-1">
                            <div class="text-center bg-rose-light px-3 py-2 rounded-lg">
                                <div style="display: flex; align-items: center; gap: 8px;">

                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M7.552 6.51859V6.77067C7.552 6.97787 7.63431 7.17659 7.78082 7.3231C7.92734 7.46961 8.12605 7.55192 8.33325 7.55192C8.54045 7.55192 8.73917 7.46961 8.88568 7.3231C9.03219 7.17659 9.1145 6.97787 9.1145 6.77067V6.51025H15.8853V6.77067C15.8853 6.97787 15.9676 7.17659 16.1142 7.3231C16.2607 7.46961 16.4594 7.55192 16.6666 7.55192C16.8738 7.55192 17.0725 7.46961 17.219 7.3231C17.3655 7.17659 17.4478 6.97787 17.4478 6.77067V6.51859C17.5631 6.52275 17.668 6.52866 17.7624 6.5363C18.0624 6.56025 18.2051 6.604 18.2989 6.65192C18.5447 6.77692 18.7437 6.97588 18.8687 7.22171C18.9166 7.31546 18.9603 7.45817 18.9843 7.75713C19.0093 8.06546 19.0103 8.46546 19.0103 9.06234V9.63525H5.9895V9.06234C5.9895 8.4665 5.9895 8.06546 6.01554 7.75713C6.0395 7.45817 6.08325 7.31546 6.13117 7.22171C6.25607 6.97631 6.45556 6.77682 6.70096 6.65192C6.79471 6.604 6.93742 6.56025 7.23638 6.5363C7.34142 6.52773 7.44666 6.52183 7.552 6.51859Z" fill="#520100"/>
                                        <path d="M8.85409 14.5832C9.19942 14.5832 9.53061 14.446 9.7748 14.2018C10.019 13.9576 10.1562 13.6264 10.1562 13.2811C10.1562 12.9358 10.019 12.6046 9.7748 12.3604C9.53061 12.1162 9.19942 11.979 8.85409 11.979C8.50875 11.979 8.17756 12.1162 7.93337 12.3604C7.68919 12.6046 7.552 12.9358 7.552 13.2811C7.552 13.6264 7.68919 13.9576 7.93337 14.2018C8.17756 14.446 8.50875 14.5832 8.85409 14.5832ZM8.85409 18.229C9.19942 18.229 9.53061 18.0918 9.7748 17.8476C10.019 17.6034 10.1562 17.2723 10.1562 16.9269C10.1562 16.5816 10.019 16.2504 9.7748 16.0062C9.53061 15.762 9.19942 15.6248 8.85409 15.6248C8.50875 15.6248 8.17756 15.762 7.93337 16.0062C7.68919 16.2504 7.552 16.5816 7.552 16.9269C7.552 17.2723 7.68919 17.6034 7.93337 17.8476C8.17756 18.0918 8.50875 18.229 8.85409 18.229ZM13.802 13.2811C13.802 13.6264 13.6648 13.9576 13.4206 14.2018C13.1764 14.446 12.8453 14.5832 12.4999 14.5832C12.1546 14.5832 11.8234 14.446 11.5792 14.2018C11.335 13.9576 11.1978 13.6264 11.1978 13.2811C11.1978 12.9358 11.335 12.6046 11.5792 12.3604C11.8234 12.1162 12.1546 11.979 12.4999 11.979C12.8453 11.979 13.1764 12.1162 13.4206 12.3604C13.6648 12.6046 13.802 12.9358 13.802 13.2811ZM12.4999 18.229C12.8453 18.229 13.1764 18.0918 13.4206 17.8476C13.6648 17.6034 13.802 17.2723 13.802 16.9269C13.802 16.5816 13.6648 16.2504 13.4206 16.0062C13.1764 15.762 12.8453 15.6248 12.4999 15.6248C12.1546 15.6248 11.8234 15.762 11.5792 16.0062C11.335 16.2504 11.1978 16.5816 11.1978 16.9269C11.1978 17.2723 11.335 17.6034 11.5792 17.8476C11.8234 18.0918 12.1546 18.229 12.4999 18.229ZM17.4478 13.2811C17.4478 13.6264 17.3107 13.9576 17.0665 14.2018C16.8223 14.446 16.4911 14.5832 16.1458 14.5832C15.8004 14.5832 15.4692 14.446 15.225 14.2018C14.9809 13.9576 14.8437 13.6264 14.8437 13.2811C14.8437 12.9358 14.9809 12.6046 15.225 12.3604C15.4692 12.1162 15.8004 11.979 16.1458 11.979C16.4911 11.979 16.8223 12.1162 17.0665 12.3604C17.3107 12.6046 17.4478 12.9358 17.4478 13.2811Z" fill="#520100"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33325 3.38525C8.54045 3.38525 8.73917 3.46756 8.88568 3.61408C9.03219 3.76059 9.1145 3.9593 9.1145 4.1665V4.94775H15.8853V4.1665C15.8853 3.9593 15.9676 3.76059 16.1142 3.61408C16.2607 3.46756 16.4594 3.38525 16.6666 3.38525C16.8738 3.38525 17.0725 3.46756 17.219 3.61408C17.3655 3.76059 17.4478 3.9593 17.4478 4.1665V4.95609C17.6062 4.96025 17.7537 4.96789 17.8905 4.979C18.2864 5.01025 18.6572 5.08109 19.0083 5.26025C19.5474 5.53491 19.9857 5.97322 20.2603 6.51234C20.4395 6.86338 20.5103 7.23421 20.5416 7.63005C20.5728 8.01025 20.5728 8.4738 20.5728 9.03109V17.0103C20.5728 17.5675 20.5728 18.0311 20.5416 18.4113C20.5103 18.8071 20.4395 19.178 20.2603 19.529C19.986 20.068 19.548 20.5063 19.0093 20.7811C18.6572 20.9603 18.2864 21.0311 17.8905 21.0623C17.5103 21.0936 17.0468 21.0936 16.4905 21.0936H8.51034C7.95304 21.0936 7.4895 21.0936 7.10929 21.0623C6.71346 21.0311 6.34263 20.9603 5.99159 20.7811C5.45278 20.507 5.01451 20.0694 4.7395 19.5311C4.56034 19.179 4.4895 18.8082 4.45825 18.4123C4.427 18.0321 4.427 17.5686 4.427 17.0123V9.03109C4.427 8.4738 4.427 8.01025 4.45825 7.63005C4.4895 7.23421 4.56034 6.86338 4.7395 6.51234C5.01416 5.97322 5.45247 5.53491 5.99159 5.26025C6.34263 5.08109 6.71346 5.01025 7.10929 4.979C7.2461 4.96789 7.39367 4.96025 7.552 4.95609V4.1665C7.552 4.06391 7.57221 3.96232 7.61147 3.86753C7.65073 3.77275 7.70828 3.68662 7.78082 3.61408C7.85337 3.54153 7.93949 3.48398 8.03428 3.44472C8.12907 3.40546 8.23066 3.38525 8.33325 3.38525ZM7.552 6.77067V6.51859C7.44666 6.52183 7.34142 6.52773 7.23638 6.5363C6.93742 6.56025 6.79471 6.604 6.70096 6.65192C6.45556 6.77682 6.25607 6.97631 6.13117 7.22171C6.08325 7.31546 6.0395 7.45817 6.01554 7.75713C5.99054 8.06546 5.9895 8.46546 5.9895 9.06234V9.63525H19.0103V9.06234C19.0103 8.4665 19.0103 8.06546 18.9843 7.75713C18.9603 7.45817 18.9166 7.31546 18.8687 7.22171C18.7438 6.97631 18.5443 6.77682 18.2989 6.65192C18.2051 6.604 18.0624 6.56025 17.7624 6.5363C17.6577 6.52775 17.5528 6.52185 17.4478 6.51859V6.77067C17.4478 6.97787 17.3655 7.17659 17.219 7.3231C17.0725 7.46961 16.8738 7.55192 16.6666 7.55192C16.4594 7.55192 16.2607 7.46961 16.1142 7.3231C15.9676 7.17659 15.8853 6.97787 15.8853 6.77067V6.51025H9.1145V6.77067C9.1145 6.97787 9.03219 7.17659 8.88568 7.3231C8.73917 7.46961 8.54045 7.55192 8.33325 7.55192C8.12605 7.55192 7.92734 7.46961 7.78082 7.3231C7.63431 7.17659 7.552 6.97787 7.552 6.77067ZM19.0103 10.6769H5.9895V16.979C5.9895 17.5748 5.9895 17.9759 6.01554 18.2832C6.0395 18.5832 6.08325 18.7259 6.13117 18.8196C6.25617 19.0655 6.45513 19.2644 6.70096 19.3894C6.79471 19.4373 6.93742 19.4811 7.23638 19.505C7.54471 19.53 7.94471 19.5311 8.54158 19.5311H16.4583C17.0541 19.5311 17.4551 19.5311 17.7624 19.505C18.0624 19.4811 18.2051 19.4373 18.2989 19.3894C18.5443 19.2645 18.7438 19.065 18.8687 18.8196C18.9166 18.7259 18.9603 18.5832 18.9843 18.2832C19.0093 17.9759 19.0103 17.5748 19.0103 16.979V10.6769Z" fill="#520100"/>
                                    </svg>

                                    <span style="font-size: 12px; font-weight: 500; color: #520100; white-space: nowrap;">
                        February 7th, 2026
                      </span>
                                </div>
                            </div>
                        </div>



                        <p class="text-center text-xs">
                            "And we created you in pairs"
                        </p>

                        <div style="text-align: center; padding: 0 0 75px 0;">
                            <p style="font-size: 12px; color: #475569; margin: 0;">
                                Quran (78:8)
                            </p>
                        </div>
                    </div>

                </div>


                <h3 class="text-gray-800 text-lg font-semibold text-center mb-3">Invitation Code</h3>
                <div class="w-full max-w-sm mb-6">
                    <div class="rounded-2xl px-4 py-4 flex items-center justify-between border border-[#C9B0B0]">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1025 768"><path fill="#520100" d="M1024.226 512v192q0 26-19 45t-45 19h-576v-32q0-13-9.5-22.5t-22.5-9.5t-22.5 9.5t-9.5 22.5v32h-256q-26 0-45-19t-19-45V512q53 0 90.5-37.5t37.5-90.5t-37.5-90.5T.226 256V64q0-26 19-45t45-19h256v32q0 13 9.5 22.5t22.5 9.5t22.5-9.5t9.5-22.5V0h576q26 0 45 19t19 45v192q-53 0-90.5 37.5t-37.5 90.5t37.5 90.5t90.5 37.5zm-640-352q0-13-9.5-22.5t-22.5-9.5t-22.5 9.5t-9.5 22.5v64q0 13 9.5 22.5t22.5 9.5t22.5-9.5t9.5-22.5v-64zm0 192q0-13-9.5-22.5t-22.5-9.5t-22.5 9.5t-9.5 22.5v64q0 13 9.5 22.5t22.5 9.5t22.5-9.5t9.5-22.5v-64zm0 192q0-13-9.5-22.5t-22.5-9.5t-22.5 9.5t-9.5 22.5v64q0 13 9.5 22.5t22.5 9.5t22.5-9.5t9.5-22.5v-64z"/></svg>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs" style="font-family: Poppins, sans-serif;">Invitation code</p>
                                <p id="invitation-code" class="text-gray-800 text-base font-bold" style="font-family: Poppins, sans-serif;">SHIKEO-2537</p>
                            </div>
                        </div>
                        <button class="copy-btn text-maroon p-2 hover:bg-rose-medium rounded-lg transition" data-copy="SHIKEO-2537">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Download Button -->
                <button
                    id="downloadInviteBtn"
                    class="w-full max-w-sm bg-[#C9B0B0]  text-maroon py-4 rounded-full text-base"
                    style="font-family: Poppins, sans-serif;"
                >
                    Download Invite
                </button>


            </div>


            <a
                href="/"
                class="w-full max-w-sm mx-auto  bg-maroon  py-2 mt-20 rounded-lg text-white text-center text-base block"
                style="font-family: Poppins, sans-serif;"
            >
                Go to home
            </a>
        </div>

    </main>

</div>

@include('partials.footer')
</body>
</html>
