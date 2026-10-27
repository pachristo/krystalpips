@extends('layout.main')
@section('title', $page->title ?: $page->name)
@section('meta_description', $page->meta_description)

@section('banner')
    <div class="lg:px-[240px] flex items-center lg:min-h-[400px]">
        <div class="w-full max-w-[625px] mt-24 lg:mt-0">
            <h1
                class="font-bold lg:text-6xl lg:width-[400px] text-2xl bg-gradient-to-l from-[#001133] to-[#003399] bg-clip-text text-transparent mb-2.5 inline-block">
                <span class="lg:block whitespace-pre-line">{{ $page->head1 }}</span>
            </h1>
            <p class="text-[#434242] text-base lg:text-lg mb-2.5 whitespace-pre-line">
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
            <div
                class="bg-white mx-auto max-w-[900px] rounded-[0.625rem] border border-[#0000001a] shadow-sm px-6 py-8 lg:px-10 lg:py-10">
                <div class="footer-content text-center">
                    {!! $page->intro !!}
                </div>
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
                <div class="kp-package-grid">
                    @foreach ($packages as $pkg)
                        <article class="kp-package-card">
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

                                @if (!empty($pkg->author))
                                    <div class="mb-4">
                                        @include('partial.author-card', [
                                            'authorName' => $pkg->author,
                                            'authorRole' => $pkg->author_role ?? null,
                                            'authorPhoto' => $pkg->author_photo ?? null,
                                            'compact' => true,
                                        ])
                                    </div>
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

    @if ($page->footer_content || $page->author)
        <section
            id="page-content"
            class="lg:px-[7.5rem] px-6 text-sm py-12 grid gap-y-6 text-[#292727] tracking-[0.5%] leading-[1.687rem]">
            @if ($page->footer_content)
                <article class="footer-content max-w-full overflow-x-auto">
                    {!! $page->footer_content !!}
                </article>
            @endif

            @if ($page->author)
                <div class="max-w-[720px]">
                    @include('partial.author-card', [
                        'authorName' => $page->author,
                        'authorRole' => $page->author_role,
                        'authorPhoto' => $page->author_photo,
                        'authorBio' => $page->author_bio,
                        'compact' => false,
                    ])
                </div>
            @endif
        </section>
    @endif
@endsection
