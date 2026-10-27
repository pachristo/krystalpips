@extends('layout.main')
@section('title', $s->title)
@section('meta_description', $s->meta_description)

@section('banner')
    {{-- 'title','meta_description','meta_keywords','head1','head2','head3','signals','investment','community_support','mentorship','proven_strategy','commitment','trading_tools'  // Add your fields here. --}}

    <div class="lg:px-[240px] flex items-center lg:min-h-[280px]">
        <div class="w-full max-w-[625px] mt-24 lg:mt-0">
            <h1
                class="font-bold lg:text-6xl lg:width-[400px] text-2xl bg-gradient-to-l from-[#001133] to-[#003399] bg-clip-text text-transparent mb-2.5 inline-block">
                <span class="lg:block"> {{ $s->head1 }}</span>
            </h1>
            <p class="text-[#434242] text-base lg:text-lg mb-2.5">
                {{ $s->head2 }}
            </p>
            <a class="primary-btn px-5 py-2.5 " href="{{ url('dashboard') }}">Join now</a>
        </div>
    </div>
@endsection
@section('body')

    <section class="mb-12 lg:mb-14 px-6">
        <div class="flex flex-col gap-8 lg:flex-row lg:justify-center lg:items-center">
            <figure class="max-w-[540px] shrink-0 lg:h-[391px] h-auto border">
                {{-- <img src="" alt="Testimonial video thumbnail" /> --}}

<!-- Video Thumbnail with Play Icon Overlay -->
<div class="relative w-full max-w-md mx-auto cursor-pointer">
    <a href="{{ $s->about_video }}" class="popup-video">
        <!-- Video Thumbnail -->
        <img src="{{ asset('storage/'.$s->about_photo) }}" alt="Video Thumbnail" class="object-cover w-full h-auto">

        <!-- Play Icon Overlay -->
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.5 7.5v9l7-4.5-7-4.5z" />
            </svg>
        </div>
    </a>
</div>
            </figure>
            <div id="about" class="max-w-[531px]">
                <h2 class="text-[#003399] font-bold text-xl lg:text-2xl mb-2.5">
                    About Us
                </h2>
                <div class="footer-content text-[#434242] tracking-[1%]">
                    {!! $s->about !!}
                </div>
            </div>
        </div>
    </section>



    <section id="trades" class="mb-12 lg:mb-14">
        <div class="text-center">
            <h2
                class="text-[#003399] font-bold text-xl lg:text-2xl text-[1.829rem] pb-2.5 border-b border-b-[#00339957] mb-5 inline-block">
                Our Recent Trades
            </h2>
        </div>
        <div class="container relative mx-auto">
            <div class="swiper mySwiperr">
              <div class="swiper-wrapper">
                <!-- Slide 1 -->
                @foreach ($trades as $k=>$ve )
                <div class="swiper-slide" >
                    <div class="flex justify-center ">
                        <figure class="max-w-[580.07px]">
                         <div >  <img src="{{ asset('storage/'.$ve->image) }}" alt="Testimonial video thumbnail" /></div>
                          <figcaption class="mt-4 text-center"><em class="font-bold">{{ $ve->name }}</em><br><small>{{ \Str::limit($ve->description, 40, '..') }}</small></figcaption>
                        </figure>
                      </div>
                </div>

                @endforeach

                <!-- Additional Slides -->

              </div>

              <!-- Swiper Navigation Buttons -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>

              <!-- Swiper Pagination -->
              <div class="swiper-pagination"></div>
            </div>
          </div>


    </section>

    <section class="mb-12 lg:mb-14 px-6 container">
        <div class="text-center">
            <h2
                class="text-[#003399] font-bold text-xl lg:text-2xl text-[1.829rem] pb-2.5 border-b border-b-[#00339957] mb-8 inline-block">
                Our services
            </h2>
        </div>

        <div class="flex flex-wrap gap-y-8 gap-x-10 justify-center">
            <article
                class="bg-white py-[2.187rem] px-[3.125rem] border border-[#00000026] rounded-[0.625rem] w-[504px] relative shadow-lg">
                <h3 class="mb-5 text-xl font-semibold text-center lg:text-2xl">
                    Signal calls
                </h3>
                <p class="text-[#434242] font-poppins text-center">
                    {{ $s->signals }}
                </p>

                <img src="{{ asset('newf/assets/') }}/icons/signal-call.svg" alt=""
                    class="lg:w-[73px] w-[44px]  absolute lg:-top-8 -top-3 lg:-left-8 -left-3" />
            </article>
            <article
                class="bg-white py-[2.187rem] px-[3.125rem] border border-[#00000026] rounded-[0.625rem] w-[504px] relative shadow-lg">
                <h3 class="mb-5 text-xl font-semibold text-center lg:text-2xl">
                    Investment
                </h3>
                <p class="text-[#434242] font-poppins text-center">
                    {{ $s->investment }}
                </p>

                <img src="{{ asset('newf/assets/') }}/icons/investment.svg" alt=""
                    class="lg:w-[73px] w-[44px] absolute lg:-top-8 -top-3 lg:-left-8 -left-3" />
            </article>
            <article
                class="bg-white py-[2.187rem] px-[3.125rem] border border-[#00000026] rounded-[0.625rem] w-[504px] relative shadow-lg">
                <h3 class="mb-5 text-xl font-semibold text-center lg:text-2xl">
                    Community support
                </h3>
                <p class="text-[rgb(67,66,66)] font-poppins text-center">
                    {{ $s->community_support }}
                </p>

                <img src="{{ asset('newf/assets/') }}/icons/community.svg" alt=""
                    class="lg:w-[73px] w-[44px] absolute lg:-top-8 -top-3 lg:-left-8 -left-3" />
            </article>
            <article
                class="bg-white py-[2.187rem] px-[3.125rem] border border-[#00000026] rounded-[0.625rem] w-[504px] relative shadow-lg">
                <h3 class="mb-5 text-xl font-semibold text-center lg:text-2xl">
                    Mentorship
                </h3>
                <p class="text-[#434242] font-poppins text-center">
                    {{ $s->mentorship }}
                </p>

                <img src="{{ asset('newf/assets/') }}/icons/mentorship.svg" alt=""
                    class="lg:w-[73px] w-[44px] absolute lg:-top-8 -top-3 lg:-left-8 -left-3" />
            </article>
            <article
                class="bg-white py-[2.187rem] px-[3.125rem] border border-[#00000026] rounded-[0.625rem] w-[504px] relative shadow-lg">
                <h3 class="mb-5 text-xl font-semibold text-center lg:text-2xl">
                    Live trading sessions
                </h3>
                <p class="text-[#434242] font-poppins text-center">
                    {{ $s->trading_tools }}
                </p>

                <img src="{{ asset('newf/assets/') }}/icons/support.svg" alt=""
                    class="lg:w-[73px] w-[44px] absolute lg:-top-8 -top-3 lg:-left-8 -left-3" />
            </article>
            <article
                class="bg-white py-[2.187rem] px-[3.125rem] border border-[#00000026] rounded-[0.625rem] w-[504px] relative shadow-lg">
                <h3 class="mb-5 text-xl font-semibold text-center lg:text-2xl">
                    Proven Strategies
                </h3>
                <p class="text-[#434242] font-poppins text-center">
                    {{ $s->proven_strategy }}
                </p>

                <img src="{{ asset('newf/assets/') }}/icons/goal.svg" alt=""
                    class="lg:w-[73px] w-[44px] absolute lg:-top-8 -top-3 lg:-left-8 -left-3" />
            </article>
        </div>
    </section>

    <section class="mb-12 lg:mb-14">
        <div class="text-center">
            <h2
                class="text-[#003399] font-bold text-xl lg:text-2xl text-[1.829rem] pb-2.5 border-b border-b-[#00339957] mb-5 inline-block">
                Testimonials
            </h2>
        </div>
        <div class="container relative mx-auto">
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                <!-- Slide 1 -->
                @foreach ($testimonial as $k=>$ve )
                <!--<div class="swiper-slide" >-->
                <!--    <div class="flex justify-center ">-->
                <!--        <figure class="max-w-[474.07px]">-->
                <!--          <img src="{{ asset('storage/'.$ve->photo) }}" alt="Testimonial video thumbnail" />-->
                <!--          <figcaption class="mt-4 text-center"><em class="font-bold">"{{ $ve->user->name }}"</em>... <small>{{ \Str::limit($ve->text, 40, '..') }}</small></figcaption>-->
                <!--        </figure>-->
                <!--      </div>-->
                <!--</div>-->
                
                     <div class="swiper-slide" >
                    <div class="flex justify-center ">
 <figure class="max-w-[474.07px]">
                         <div  class="popup-video relative"href="{{ $ve->video_url }}">  <img src="{{ asset('storage/'.$ve->photo) }}" alt="Testimonial video thumbnail" />
                          <!-- Play Icon Overlay -->
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.5 7.5v9l7-4.5-7-4.5z" />
            </svg>
        </div>
                         </div>
                           <figcaption class="mt-4 text-center"><em class="font-bold">"{{ $ve->user->name }}"</em>... <small>{{ \Str::limit($ve->text, 40, '..') }}</small></figcaption>
                        </figure>
                      </div>
                </div>
                

                @endforeach

                <!-- Additional Slides -->

              </div>

              <!-- Swiper Navigation Buttons -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>

              <!-- Swiper Pagination -->
              <div class="swiper-pagination"></div>
            </div>
          </div>


    </section>

    {{-- <section class="mb-12 lg:mb-14  px-6">
        <div class="text-center mb-14">
            <h2
                class="text-[#003399] font-bold text-xl lg:text-2xl text-[1.829rem] pb-2.5 border-b border-b-[#00339957] inline-block">
                What you get?
            </h2>
        </div>

        <div class="flex flex-wrap justify-center gap-x-8 gap-y-12">
            <article class="p-[1.875rem] rounded-[0.625rem] bg-[#0F2D68] text-white w-[373px] relative">
                <h3 class="mb-5 text-2xl font-semibold leading-9">
                    Forex Signals
                </h3>
             
                <p class="mb-5 text-sm">
                    {{ $s->plan_signal }}
                </p>
                <a class="text-white rounded-[0.625rem] py-[0.625rem] px-5 border-white border font-bold"
                    href="{{ url('signals') }}">
                    Subscribe
                </a>

                <div
                    class="absolute h-[84px] w-[84px] border border-[#0F2D68] rounded-full bg-white -top-[1.875rem] -right-5 flex items-center justify-center">
                    <img class="lg:w-[73px] w-[44px]" src="{{ asset('newf/assets/') }}/icons/signal.svg"
                        alt="blue gravity signal icon" />
                </div>
            </article>
            <article class="p-[1.875rem] rounded-[0.625rem] bg-[#0F2D68] text-white w-[373px] relative">
                <h3 class="mb-5 text-2xl font-semibold leading-9">
                    Mentorship Plan
                </h3>
                <p class="mb-5 text-sm">
                    {{ $s->plan_mentor }}
                </p>
                <a href="{{ url('mentorship') }}"
                    class="text-white rounded-[0.625rem] py-[0.625rem] px-5 border-white border font-bold">
                    Subscribe
                </a>

                <div
                    class="absolute h-[84px] w-[84px] border border-[#0F2D68] rounded-full bg-white -top-[1.875rem] -right-5 flex items-center justify-center">
                    <img class="lg:w-[73px] w-[44px]" src="{{ asset('newf/assets/') }}/icons/signal.svg"
                        alt="blue gravity signal icon" />
                </div>
            </article>
            <article class="p-[1.875rem] rounded-[0.625rem] bg-[#0F2D68] text-white w-[373px] relative">
                <h3 class="mb-5 text-2xl font-semibold leading-9">
                    Investment Plan
                </h3>
                <p class="mb-5 text-sm">
                    {{ $s->plan_investment }}
                </p>
                <a href="{{ url('invesment') }}"
                    class="text-white rounded-[0.625rem] py-[0.625rem] px-5 border-white border font-bold">
                    Subcribe
                </a>

                <div
                    class="absolute h-[84px] w-[84px] border border-[#0F2D68] rounded-full bg-white -top-[1.875rem] -right-5 flex items-center justify-center">
                    <img class="lg:w-[73px] w-[44px]" src="{{ asset('newf/assets/') }}/icons/signal.svg"
                        alt="blue gravity signal icon" />
                </div>
            </article>
            <article class="p-[1.875rem] rounded-[0.625rem] bg-[#0F2D68] text-white w-[373px] relative">
                <h3 class="mb-5 text-2xl font-semibold leading-9">
                    Account Management Plan
                </h3>
                <p class="mb-5 text-sm">
                    {{ $s->plan_courses }}
                </p>
                <a href="{{ url('account-management') }}"
                    class="text-white rounded-[0.625rem] py-[0.625rem] px-5 border-white border font-bold">
                    Subcribe
                </a>

                <div
                    class="absolute h-[84px] w-[84px] border border-[#0F2D68] rounded-full bg-white -top-[1.875rem] -right-5 flex items-center justify-center">
                    <img class="lg:w-[73px] w-[44px]" src="{{ asset('newf/assets/') }}/icons/signal.svg"
                        alt="blue gravity signal icon" />
                </div>
            </article>
        </div>
    </section> --}}

    <section id="blog" class="bg-[#D9D9D9] pt-10 lg:px-[5.25rem] px-6 pb-12">
        <div class="text-center">
            <h2
                class="text-[#003399] font-bold text-xl lg:text-2xl text-[1.829rem] pb-2.5 border-b border-b-[#00339957] mb-6 inline-block">
                Latest from the blog
            </h2>
        </div>
        <div class="container">
            @if ($blog->count())
                <div class="flex flex-wrap justify-center gap-5 lg:justify-center">
                    @foreach ($blog as $v)
                        <article class="lg:h-[401px] w-[370px] rounded-[0.625rem] bg-white overflow-hidden shadow-sm">
                            <a href="{{ url('blog/' . $v->slug) }}" class="block h-full text-decoration-none">
                                <div class="h-[200px] bg-[#E7E9F1]">
                                    @if ($v->photo)
                                        <img src="{{ asset('storage/' . $v->photo) }}" alt="{{ $v->title }}"
                                            class="object-cover w-full h-full" />
                                    @endif
                                </div>
                                <div class="p-5">
                                    <h3 class="font-medium text-2xl leading-9 mb-2.5 font-poppins text-[#003399]">
                                        {{ \Str::limit($v->title, 40, '..') }}
                                    </h3>
                                    <p class="text-sm leading-[21px] text-[#434242]">
                                        {{ \Str::limit($v->description, 120, '..') }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ url('blog') }}" class="primary-btn px-5 py-2.5 inline-block">
                        View more blogs
                    </a>
                </div>
            @else
                <p class="text-center text-[#434242]">No blog posts yet.</p>
            @endif
        </div>
    </section>

    <section class="py-12 text-center">
        <h2
            class="text-[#003399] font-bold text-xl lg:text-2xl text-[1.829rem] pb-2.5 border-b border-b-[#00339957] mb-5 inline-block">
            Companies we work with
        </h2>
        <div class="max-w-[934px] w-full mx-auto flex flex-wrap items-center justify-center gap-x-10 gap-y-10 px-6">
            <img src="{{ asset('newf/assets/') }}/logos/image 1.png" alt="" class="w-28 lg:w-fit" />
            <img src="{{ asset('newf/assets/') }}/logos/image 2.png" alt="" class="w-28 lg:w-fit" />
            <img src="{{ asset('newf/assets/') }}/logos/image 3.png" alt="" class="w-28 lg:w-fit" />
            <img src="{{ asset('newf/assets/') }}/logos/image 4.png" alt="" class="w-28 lg:w-fit" />
            <img src="{{ asset('newf/assets/') }}/logos/image 5.png" alt="" class="w-28 lg:w-fit" />
            <img src="{{ asset('newf/assets/') }}/logos/image 6.png" alt="" class="w-28 lg:w-fit" />
        </div>
    </section>

    <section class="bg-[#E7E9F1] py-12 px-6 flex justify-center flex-col lg:flex-row gap-x-[3.125rem] gap-y-10">
        <div
            class="bg-white flex items-center justify-center flex-col lg:px-[3.125rem] px-10 max-w-[574px] rounded-[0.625rem] lg:h-[572px] py-10 lg:py-0">
            <h2 class="text-2xl font-semibold mb-7">Commitments</h2>
            <p class="lg:text-lg text-base leading-[1.687rem] mb-7">
                {{ $s->commitment }}
            </p>
            <button class="primary-btn py-2.5 px-5">Load more</button>
        </div>
        <div class="bg-[#F4F3F3] p-5 lg:w-[360px] w-full lg:h-[572px]">
            <article class="py-7 border-b border-b-[#00000066] flex items-center justify-between">
                <div>
                    <p class="text-[#146614] font-bold text-4xl">100%</p>
                    <p class="text-[15px]">More return on investment</p>
                </div>
                <div>
                    <img src="{{ asset('newf/assets/') }}/icons/investment-arrow.svg" alt="" class="w-20" />
                </div>
            </article>
            <article class="py-7 border-b border-b-[#00000066] flex items-center justify-between">
                <div>
                    <p class="text-[#146614] font-bold text-4xl">2.4M+</p>
                    <p class="text-[15px]">Satisfied Users</p>
                </div>
                <div>
                    <img src="{{ asset('newf/assets/') }}/icons/satisfied.svg" alt="" class="w-20" />
                </div>
            </article>
            <article class="py-7 border-b border-b-[#00000066] flex items-center justify-between">
                <div>
                    <p class="text-[#146614] font-bold text-4xl">21+</p>
                    <p class="text-[15px]">Worldwide Awards</p>
                </div>
                <div>
                    <img src="{{ asset('newf/assets/') }}/icons/world.svg" alt="" class="w-20" />
                </div>
            </article>
            <article class="flex items-center justify-between py-7">
                <div>
                    <p class="text-[#146614] font-bold text-4xl">50+</p>
                    <p class="text-[15px]">Firms trust Us</p>
                </div>
                <div>
                    <img src="{{ asset('newf/assets/') }}/icons/handshake.svg" alt="" class="w-20" />
                </div>
            </article>
        </div>
    </section>

    <section
        id="faqs"
        class="lg:px-[7.5rem] px-6 text-sm py-12 grid gap-y-6 text-[#292727] tracking-[0.5%] leading-[1.687rem]">

        <article class="footer-content max-w-full overflow-x-auto">
            {!! $s->footer !!}
        </article>
    </section>

@endsection
@section('js')

@endsection
