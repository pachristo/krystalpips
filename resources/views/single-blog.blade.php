@extends('layout.main')
@section('title', $blog->title)
@section('meta_description', $blog->meta_description ?: $blog->description)

@section('banner')
    <div class="lg:px-[240px] flex items-center lg:min-h-[10rem] min-h-24">
        <div class="w-full max-w-[720px] mt-24 lg:mt-0">
            <nav class="mb-2 text-sm font-semibold tracking-wide uppercase text-[#003399]" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:underline">Home</a>
                <span class="mx-1 text-[#999]">/</span>
                <a href="{{ url('blog') }}" class="hover:underline">Blog</a>
                <span class="mx-1 text-[#999]">/</span>
                <span class="normal-case tracking-normal text-[#666]">{{ \Str::limit($blog->title, 40, '...') }}</span>
            </nav>
            <p class="text-[#434242] text-base lg:text-lg">
                Market insights and trading updates from Krystal Pips
            </p>
        </div>
    </div>
@endsection

@section('body')
    <section class="px-6 lg:px-[5.25rem] py-8 lg:py-10">
        <div class="kp-blog-wrap">
            <article itemscope itemtype="https://schema.org/BlogPosting" class="min-w-0">
                <header class="mb-6">
                    <h1 itemprop="headline" class="font-bold text-2xl lg:text-4xl text-[#003399] leading-tight mb-3">
                        {{ $blog->title }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-[#666]">
                        <time itemprop="datePublished"
                            datetime="{{ \Carbon\Carbon::parse($blog->created_at)->toAtomString() }}">
                            {{ \Carbon\Carbon::parse($blog->created_at)->format('j M Y') }}
                        </time>
                        @if ($blog->author)
                            <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                                By <span itemprop="name" class="font-semibold text-[#003399]">{{ $blog->author }}</span>
                                @if ($blog->author_role)
                                    <span class="text-[#888]">· {{ $blog->author_role }}</span>
                                @endif
                            </span>
                        @endif
                    </div>
                    @if ($blog->description)
                        <p itemprop="description" class="mt-3 text-base text-[#434242] max-w-[640px]">
                            {{ $blog->description }}
                        </p>
                    @endif
                </header>

                @if ($blog->photo)
                    <figure class="mb-6">
                        <img itemprop="image"
                            src="{{ asset('storage/' . $blog->photo) }}"
                            alt="{{ $blog->title }}"
                            class="kp-blog-featured"
                            loading="eager"
                            width="420"
                            height="240" />
                    </figure>
                @endif

                <div itemprop="articleBody" class="footer-content max-w-full overflow-x-auto">
                    {!! $blog->content !!}
                </div>

                @if ($blog->author)
                    <div class="mt-8 pt-6 border-t border-[#00000014]">
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

                <div class="mt-8 pt-6 border-t border-[#00000014]">
                    <a href="{{ url('blog') }}" class="font-semibold text-[#003399] hover:underline">
                        ← Back to all blogs
                    </a>
                </div>
            </article>

            <aside class="space-y-6 kp-aside-sticky" aria-label="Related blogs">
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
                                    <div class="kp-related-thumb">
                                        @if ($item->photo)
                                            <img src="{{ asset('storage/' . $item->photo) }}"
                                                alt="{{ $item->title }}"
                                                loading="lazy"
                                                width="72"
                                                height="56" />
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <h3 class="text-sm font-semibold text-[#003399] leading-snug group-hover:underline">
                                            {{ \Str::limit($item->title, 60, '...') }}
                                        </h3>
                                        <p class="mt-1 text-xs text-[#666]">
                                            {{ \Str::limit($item->description, 70, '...') }}
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
                    <p class="text-sm mb-4 leading-relaxed" style="color: rgba(255,255,255,.85)">
                        Get timely Forex signals and expert market support.
                    </p>
                    <a href="{{ url('signals') }}"
                        class="inline-block rounded-[0.5rem] bg-white text-[#003399] font-bold px-4 py-2.5 text-sm">
                        Explore signals
                    </a>
                </div>
            </aside>
        </div>
    </section>
@endsection
