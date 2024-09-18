<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="{{ asset('/newf/assets/output.css') }}?version={{\Str::random(45)}}" rel="stylesheet" />

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta name="description" content="@yield('meta_description')">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <meta name="author" content="{{ env('APP_NAME') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:image" content="{{ asset('assets/images/favicon.png') }}">
    <meta property="og:image:alt" content="{{ env('APP_NAME') }}">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:image" content="{{ asset('assets/images/favicon.png') }}">
    <meta name="twitter:image:alt" content="@yield('meta_description')">
    <meta name="twitter:creator" content="{{ $twitterlink ?? '' }}">

    <!-- Additional Tags -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Styles -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    {{-- integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" rel="stylesheet" crossorigin="anonymous"> --}}
    <link href="{{ asset('front/font/css/all.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('front/css/main.css') }}?var={{ \Str::random(45) }}" rel="stylesheet"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" rel="stylesheet"
        crossorigin="anonymous">
        <!-- Magnific Popup CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

    {{-- <link href=""  --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    {{-- ./ --}}
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet" type="/text/css" />
       @vite(['resources/css/app.css'])
       
       <script async src="https://www.googletagmanager.com/gtag/js?id=G-DCGYKVF4NQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DCGYKVF4NQ');
</script>



<body>

    <header class="lg:pt-[146.17px]  px-6 pb-[34px] lg:px-[5.25rem] bg-banner-image">

        @yield('banner')




        <nav
            class="bg-white shadow-lg rounded-[0.625rem] lg:p-5 p-2 flex justify-between items-center absolute lg:w-[calc(100vw-240px)] left-1/2 top-10 -translate-x-1/2 w-[calc(100vw-48px)]">
            <div class="flex items-center">
                <a href="{{url('/')}}">
                     <img src="{{ asset('newf/assets/') }}/icons/krystal.png" alt="" class="border" />
                </a>
                <a href="{{url('/')}}">
                    <span class="font-bold text-[#003399] lg:text-2xl text-xl">rystal Pips</span>
                </a>
               
                
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="block lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="#003399" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"
                        stroke="#003399"></path>
                </svg>
            </button>
            <!-- Desktop Menu -->
            <ul id="desktop-menu" class="hidden gap-x-5 lg:flex">
                <li><a href="{{ url('/') }}" class="p-2.5 font-bold text-[#003399]">Home</a></li>
                <li><a href="{{ url('signals') }}" class="p-2.5 font-bold text-[#003399]">Signals</a></li>
                <li><a href="{{ url('mentorship') }}" class="p-2.5 font-bold text-[#003399]">Mentorship</a></li>
                <li><a href="{{ url('investment') }}" class="p-2.5 font-bold text-[#003399]">Investment Program</a>
                </li>
                <li><a href="{{ url('blog') }}" class="p-2.5 font-bold text-[#003399]">Blog</a></li>
                <!--<li><a href="{{ url('bot') }}" class="p-2.5 font-bold text-[#003399]">Bot</a></li>-->
                <li><a href="{{ url('courses') }}" class="p-2.5 font-bold text-[#003399]">Courses</a></li>
            </ul>



            <!-- Mobile Menu -->
            <ul id="mobile-menu"
                class="absolute left-0 right-0 flex-col hidden p-5 bg-white shadow-lg gap-y-14 top-10 lg:hidden ">
                <li class="mb-2"><a href="{{ url('/') }}" class="font-bold text-[#003399]">Home</a></li>
                <li class="mb-2"><a href="{{ url('signals') }}" class="font-bold text-[#003399]">Signals</a></li>
                <li class="mb-2"><a href="{{ url('mentorship') }}" class="font-bold text-[#003399]">Mentorship</a>
                </li>
                <li class="mb-2"><a href="{{ url('investment') }}" class="font-bold text-[#003399]">Investment
                        Program</a></li>
                <li class="mb-2"><a href="{{ url('blog') }}" class="font-bold text-[#003399]">Blog</a></li>
                <!--<li class="mb-2"><a href="{{ url('bot') }}" class="font-bold text-[#003399]">Bot</a></li>-->
                <li class="mb-2"><a href="{{ url('courses') }}" class="font-bold text-[#003399]">Courses</a></li>
                <li class="mb-2">
                    @if (!auth()->user())
                        <a class="primary-btn px-5 py-2.5 "href="{{ url('login') }}">Join now&nbsp; <i
                                class="fa-solid fa fa-right-to-bracket"></i></a>
                    @else
                        <a class="primary-btn px-5 py-2.5 "href="{{ url('dashboard') }}"><i
                                class="fa-solid fa fa-circle-user"></i>&nbsp; Account</a>
                    @endif
                </li>
            </ul>
            @if (!auth()->user())
                <a class="primary-btn px-5 py-2.5 hidden lg:block"href="{{ url('login') }}">Join now&nbsp; <i
                        class="fa-solid fa fa-right-to-bracket"></i></a>
            @else
                <a class="primary-btn px-5 py-2.5 hidden lg:block"href="{{ url('dashboard') }}"><i
                        class="fa-solid fa fa-circle-user"></i>&nbsp; Account</a>
            @endif

        </nav>

        <script>
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>

    </header>

    <main class="lg:pt-[114px]  lg:pt-[100px] pt-[20px]">
        @yield('body')
    </main>

    <footer>
        <section
            class="bg-[#E7E9F1] py-[3.75rem] px-6 lg:px-[7.5rem] lg:gap-y-10 gap-y-6 flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="">
                <div class="flex mb-4 lg:items-center">
                    <img src="{{ asset('newf/assets/') }}/icons/krystal.png" alt="" />
                    <span class="font-bold text-[#003399] text-2xl">rystal Pips</span>
                </div>
                <ul class="flex gap-x-2 items-center lg:mb-[4.3125rem] mb-12">
                    <li>
                        <a href="#"><img src="{{ asset('newf/assets/') }}/icons/Twitter.png"
                                alt="Twitter icon" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('newf/assets/') }}/icons/Instagram.png"
                                alt="Instagram icon" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('newf/assets/') }}/icons/Facebook.png"
                                alt="Facebook icon" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('newf/assets/') }}/icons/Telegram.png"
                                alt="Telegram icon" /></a>
                    </li>
                </ul>
                <button class="py-4 primary-btn px-9">Contact Us</button>
            </div>
            <div>
                <ul class="grid grid-cols-2 font-medium lg:grid-cols-3 gap-y-10 gap-x-14">
                    <li><a href="#">Work with us</a></li>
                    <li><a href="#">Private Coaching</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Advertise with us</a></li>
                    <li><a href="#">Our Trades</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Support Us</a></li>
                    <li><a href="#">Our commitment</a></li>
                    <li><a href="#">Report a bug</a></li>
                    <li><a href="#">Investment options</a></li>
                    <li><a href="#">Our team</a></li>
                </ul>
            </div>
        </section>
        <div
            class="bg-[#003399] lg:pt-[3.25rem] lg:pb-16 py-8 text-sm lg:text-base lg:px-[7.5rem] px-6 flex flex-col lg:flex-row lg:justify-between lg:items-center text-white">
            <p class="mb-4 font-semibold lg:mb-0">
                © {{ date('Y') }} Krystal Kings, Ltd. - All Rights Reserved
            </p>
            <div class="font-medium flex items-center lg:gap-x-[5.721rem] gap-x-20 lg:justify-normal">
                <a href="{{ route('terms') }}">Terms of use</a>
                <a href="{{ route('policy') }}">Privacy policy</a>
            </div>
        </div>
    </footer>
    <a href="" target="_blank" class="telegram-btn">
        <img width="94" height="94" src="https://img.icons8.com/3d-fluency/94/telegram.png" alt="Telegram" />
        <span>Get Free Signals</span>
    </a>

      <!-- The Modal -->
      <div id="videoModal" class="modal">
        <div class="modal-content">
            <span id="closePopup" style="cursor: pointer; float: right;">&times;</span>
            <video id="videoPlayer" width="100%" controls>
                <source id="videoSource" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>


 <!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Swiper -->



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
                    pagination: {
                        el: ".swiper-pagination",
                        type: "progressbar",
                    },
                    autoplay: {
                        delay: 5000,
                    },
                    slidesPerView: 3,
                    spaceBetween: 10,
                    // Responsive breakpoints
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 20
                        },
                        // when window width is >= 480px
                        480: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        // when window width is >= 640px
                        640: {
                            slidesPerView: 3,
                            spaceBetween: 40
                        }
                    },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });

                    var swiperr = new Swiper(".mySwiperr", {
                    pagination: {
                        el: ".swiper-pagination",
                        type: "progressbar",
                    },

                    autoplay: {
                        delay: 5000,
                    },
                    slidesPerView: 2,
                    spaceBetween: 10,
                    // Responsive breakpoints
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 20
                        },
                        // when window width is >= 480px
                        480: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        // when window width is >= 640px
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 40
                        }
                    },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
    </script>
   <script>
    $(document).ready(function() {
        // Handle the popup and video play/pause
        $('.openPopup').on('click', function() {
            var modal = $('#videoModal');
            var video = $('#videoPlayer');
            var source = $('#videoSource');

            // Update the video source
            source.attr('src', $(this).data('video-url'));
            video[0].pause(); // Pause the video before updating the source
            video[0].currentTime = 0; // Reset the video to the start

            // Load the new video source
            video[0].load();

            // Play the video once it's loaded
            video[0].onloadedmetadata = function() {
                video[0].play();
            };

            // Show the modal
            modal.css('display', 'flex');
        });

        $('#closePopup').on('click', function() {
            var modal = $('#videoModal');
            var video = $('#videoPlayer');

            // Pause the video and reset it to the start
            video[0].pause();
            video[0].currentTime = 0;

            // Hide the modal
            modal.css('display', 'none');
        });

        // Close the modal if the user clicks outside of it
        $(window).on('click', function(event) {
            var modal = $('#videoModal');
            var video = $('#videoPlayer');
            if ($(event.target).is(modal)) {
                // Pause the video and reset it to the start
                video[0].pause();
                video[0].currentTime = 0;
                // Hide the modal
                modal.css('display', 'none');
            }
        });
    });
</script>

    <script>
       $('.popup-video').each(function() {https://videos.pexels.com/video-files/27989388/12282745_1080_1920_30fps.mp4
        var $this = $(this);
        var videoUrl = $this.attr('href');
        var videoType = $this.data('video-type');

        var iframeUrl = '';
        if (videoType === 'youtube') {
            iframeUrl = videoUrl.replace(/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^&]+)/, 'https://www.youtube.com/embed/$1');
        } else if (videoType === 'vimeo') {
            iframeUrl = videoUrl.replace(/(?:https?:\/\/)?(?:www\.)?vimeo\.com\/(\d+)/, 'https://player.vimeo.com/video/$1');
        } else {
            iframeUrl = videoUrl; // Assuming the URL is already suitable for embedding
        }

        $this.attr('href', iframeUrl);
    });

    $('.popup-video').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 300,
        preloader: false,
        fixedContentPos: false
    });

        </script>

</body>

</html>
