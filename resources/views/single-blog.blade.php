@extends('layout.main')
@section('title', $blog->title)
@section('meta_description', $blog->meta_description ?: $blog->description)

@section('banner')
    <div class="lg:px-[240px] flex items-center lg:min-h-[280px]">
        <div class="w-full max-w-[720px] mt-24 lg:mt-0">
            <p class="mb-3 text-sm font-semibold tracking-wide uppercase text-[#003399]">
                <a href="{{ url('blog') }}" class="hover:underline">Blog</a>
                <span class="mx-1 text-[#999]">/</span>
                Article
            </p>
            <h1
                class="font-bold lg:text-5xl lg:width-[400px] text-2xl bg-gradient-to-l from-[#001133] to-[#003399] bg-clip-text text-transparent mb-2.5 inline-block">
                <span class="lg:block">{{ $blog->title }}</span>
            </h1>
            <p class="text-[#434242] text-base lg:text-lg mb-4 max-w-[560px]">
                {{ \Str::limit($blog->description, 140, '...') }}
            </p>
            @include('partial.author-card', [
                'authorName' => $blog->author,
                'authorRole' => $blog->author_role,
                'authorPhoto' => $blog->author_photo,
                'publishedAt' => $blog->created_at,
                'compact' => true,
            ])
            @unless ($blog->author)
                <p class="text-sm text-[#666]">
                    {{ \Carbon\Carbon::parse($blog->created_at)->format('j M Y') }}
                </p>
            @endunless
        </div>
    </div>
@endsection

@section('body')
    <section class="px-6 lg:px-[5.25rem] py-10 lg:py-12 bg-[#F5F6FA]">
        <div class="mx-auto max-w-[1200px] grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] gap-8 lg:gap-10 items-start">
            <article class="bg-white rounded-[0.625rem] shadow-sm border border-[#0000000d] overflow-hidden">
                @if ($blog->photo)
                    <div class="w-full max-h-[420px] bg-[#E7E9F1] overflow-hidden">
                        <img src="{{ asset('storage/' . $blog->photo) }}" alt="{{ $blog->title }}"
                            class="object-cover w-full h-full max-h-[420px]" />
                    </div>
                @endif
                <div class="p-6 lg:p-10">
                    <div class="footer-content max-w-full overflow-x-auto">
                        {!! $blog->content !!}
                    </div>

                    @if ($blog->author)
                        <div class="mt-8">
                            @include('partial.author-card', [
                                'authorName' => $blog->author,
                                'authorRole' => $blog->author_role,
                                'authorPhoto' => $blog->author_photo,
                                'authorBio' => $blog->author_bio,
                                'publishedAt' => $blog->created_at,
                                'compact' => false,
                            ])
                        </div>
                    @endif

                    <div class="mt-10 pt-6 border-t border-[#00000014] flex flex-wrap items-center justify-between gap-4">
                        <a href="{{ url('blog') }}" class="font-semibold text-[#003399] hover:underline">
                            ← Back to all blogs
                        </a>
                        <a href="{{ url('signals') }}" class="primary-btn px-5 py-2.5 inline-block">
                            View signal packages
                        </a>
                    </div>
                </div>
            </article>

            <aside class="space-y-6 lg:sticky lg:top-28">
                <div class="bg-white rounded-[0.625rem] shadow-sm border border-[#0000000d] p-5">
                    <h2 class="text-[#003399] font-bold text-lg pb-2 mb-4 border-b border-b-[#00339957]">
                        Related blogs
                    </h2>

                    @if ($related->isEmpty())
                        <p class="text-sm text-[#666]">More articles coming soon.</p>
                    @else
                        <div class="space-y-4">
                            @foreach ($related as $item)
                                <a href="{{ url('blog/' . $item->slug) }}"
                                    class="flex gap-3 group no-underline hover:no-underline">
                                    <div class="w-20 h-16 shrink-0 rounded-[0.4rem] overflow-hidden bg-[#E7E9F1]">
                                        @if ($item->photo)
                                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}"
                                                class="object-cover w-full h-full" />
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <h3
                                            class="text-sm font-semibold text-[#003399] leading-snug group-hover:underline">
                                            {{ \Str::limit($item->title, 55, '...') }}
                                        </h3>
                                        <p class="mt-1 text-xs text-[#666]">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('j M Y') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ url('blog') }}"
                        class="mt-5 inline-block text-sm font-semibold text-[#003399] hover:underline">
                        View all blogs →
                    </a>
                </div>

                <div class="bg-[#0F2D68] text-white rounded-[0.625rem] p-5 shadow-sm">
                    <h2 class="text-lg font-semibold mb-2">Trade with Krystal Pips</h2>
                    <p class="text-sm text-white/85 mb-4 leading-relaxed">
                        Get timely Forex signals, mentorship, and account management from our expert desk.
                    </p>
                    <a href="{{ url('signals') }}"
                        class="inline-block rounded-[0.5rem] bg-white text-[#003399] font-bold px-4 py-2.5 text-sm">
                        Explore signals
                    </a>
                </div>

                <div class="bg-white rounded-[0.625rem] shadow-sm border border-[#0000000d] p-5">
                    <h2 class="text-[#003399] font-bold text-lg pb-2 mb-4 border-b border-b-[#00339957]">
                        Quick links
                    </h2>
                    <ul class="space-y-2 text-sm">
                        <li><a class="font-semibold text-[#003399] hover:underline" href="{{ url('mentorship') }}">Mentorship</a></li>
                        <li><a class="font-semibold text-[#003399] hover:underline" href="{{ url('investment') }}">Investment</a></li>
                        <li><a class="font-semibold text-[#003399] hover:underline" href="{{ url('account-management') }}">Account management</a></li>
                        <li><a class="font-semibold text-[#003399] hover:underline" href="{{ url('courses') }}">Courses</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="px-6 lg:px-[5.25rem] pb-12 bg-[#F5F6FA]">
            <div class="mx-auto max-w-[1200px]">
                <div class="text-center mb-8">
                    <h2
                        class="text-[#003399] font-bold text-xl lg:text-2xl pb-2.5 border-b border-b-[#00339957] inline-block">
                        More from the blog
                    </h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($related->take(3) as $item)
                        <article class="bg-white rounded-[0.625rem] overflow-hidden shadow-sm border border-[#0000000d]">
                            <a href="{{ url('blog/' . $item->slug) }}" class="block h-full">
                                <div class="h-44 bg-[#E7E9F1]">
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}"
                                            class="object-cover w-full h-full" />
                                    @endif
                                </div>
                                <div class="p-5">
                                    <h3 class="font-semibold text-lg text-[#003399] mb-2 leading-snug">
                                        {{ \Str::limit($item->title, 48, '...') }}
                                    </h3>
                                    <p class="text-sm text-[#434242]">
                                        {{ \Str::limit($item->description, 100, '...') }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
