@extends('layout.main')
@section('title', $page->title ?: $page->name)
@section('meta_description', $page->meta_description)

@section('banner')
    <div class="lg:px-[240px] flex items-center lg:min-h-[400px]">
        <div class="w-full max-w-[680px] mt-24 lg:mt-0">
            <p class="mb-3 text-sm font-semibold tracking-wide uppercase text-[#003399]/{{ $page->name }}</p>
            <h1
                class="font-bold lg:text-5xl text-2xl bg-gradient-to-l from-[#001133] to-[#003399] bg-clip-text text-transparent mb-3 inline-block whitespace-pre-line">
                {{ $page->head1 }}
            </h1>
            <p class="text-[#434242] text-base lg:text-lg mb-5 max-w-[560px] whitespace-pre-line">
                {{ $page->head2 }}
            </p>
            <a class="primary-btn px-5 py-2.5" href="#packages">
                {{ $page->cta_label ?: 'View packages' }}
            </a>
        </div>
    </div>
@endsection

@section('body')
    @if ($page->intro)
        <section class="px-6 mb-10 lg:mb-12">
            <div class="footer-content max-w-3xl mx-auto text-center">
                {!! $page->intro !!}
            </div>
        </section>
    @endif

    <section id="packages" class="px-6 mb-12 lg:mb-14">
        <div class="text-center mb-8">
            <h2
                class="text-[#003399] font-bold text-xl lg:text-2xl pb-2.5 border-b border-b-[#00339957] inline-block">
                {{ $page->packages_heading ?: 'Choose a package' }}
            </h2>
        </div>

        <div class="container mx-auto">
            @if ($packages->isEmpty())
                <p class="text-center text-[#434242]">Packages will appear here soon.</p>
            @else
                <div class="flex flex-wrap justify-center gap-6 lg:gap-8">
                    @foreach ($packages as $pkg)
                        <article
                            class="w-full max-w-[370px] rounded-[0.625rem] bg-white border border-[#0000001a] shadow-md overflow-hidden flex flex-col">
                            @if (!empty($pkg->image))
                                <div class="h-44 bg-[#E7E9F1]">
                                    <img src="{{ asset('storage/' . $pkg->image) }}" alt="{{ $pkg->name }}"
                                        class="object-cover w-full h-full" />
                                </div>
                            @endif
                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div>
                                        <h3 class="text-xl font-semibold text-[#003399] leading-snug">{{ $pkg->name }}</h3>
                                        @if (!empty($pkg->duration))
                                            <p class="mt-1 text-sm text-[#666]">{{ $pkg->duration }}</p>
                                        @endif
                                    </div>
                                    <div
                                        class="shrink-0 rounded-[0.5rem] bg-[#0F2D68] text-white px-3 py-2 font-bold text-lg leading-none">
                                        ${{ $pkg->price }}
                                    </div>
                                </div>

                                @if (!empty($pkg->summary))
                                    <p class="mb-4 text-sm text-[#434242]">{{ $pkg->summary }}</p>
                                @endif

                                @if (!empty($pkg->benefits) && is_array($pkg->benefits))
                                    <ul class="mb-6 space-y-2 text-sm text-[#434242] flex-1">
                                        @foreach ($pkg->benefits as $benefit)
                                            @php
                                                $label = is_array($benefit) ? ($benefit['benefit'] ?? reset($benefit)) : $benefit;
                                            @endphp
                                            @if ($label)
                                                <li class="flex gap-2">
                                                    <span class="text-[#003399] font-bold">✓</span>
                                                    <span>{{ $label }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="flex-1"></div>
                                @endif

                                <a href="{{ route($paymentRoute, ['id' => $pkg->id, 'name' => $pkg->name]) }}"
                                    class="primary-btn px-5 py-2.5 text-center block w-full">
                                    {{ auth()->check() ? 'Proceed to payment' : 'Login to subscribe' }}
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if ($page->footer_content)
        <section class="lg:px-[7.5rem] px-6 py-12 bg-[#E7E9F1]">
            <article class="footer-content max-w-full overflow-x-auto mx-auto">
                {!! $page->footer_content !!}
            </article>
        </section>
    @endif
@endsection
