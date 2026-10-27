@php
    $authorName = $authorName ?? null;
    $authorRole = $authorRole ?? null;
    $authorPhoto = $authorPhoto ?? null;
    $authorBio = $authorBio ?? null;
    $publishedAt = $publishedAt ?? null;
    $compact = $compact ?? false;
@endphp

@if ($authorName)
    <div
        class="{{ $compact ? 'flex items-center gap-3' : 'flex flex-col sm:flex-row sm:items-center gap-4 rounded-[0.625rem] border border-[#00000014] bg-[#F8F9FC] p-4 lg:p-5' }}">
        <div
            class="{{ $compact ? 'w-10 h-10' : 'w-16 h-16' }} shrink-0 rounded-full overflow-hidden bg-[#0F2D68] text-white flex items-center justify-center font-bold">
            @if ($authorPhoto)
                <img src="{{ asset('storage/' . $authorPhoto) }}" alt="{{ $authorName }}"
                    class="object-cover w-full h-full" />
            @else
                <span class="{{ $compact ? 'text-sm' : 'text-xl' }}">{{ \Str::upper(\Str::substr($authorName, 0, 1)) }}</span>
            @endif
        </div>
        <div class="min-w-0">
            <p class="font-semibold text-[#003399] {{ $compact ? 'text-sm' : 'text-base' }} leading-snug">
                {{ $authorName }}
            </p>
            @if ($authorRole)
                <p class="text-xs text-[#666] mt-0.5">{{ $authorRole }}</p>
            @endif
            @if ($publishedAt)
                <p class="text-xs text-[#888] mt-1">{{ \Carbon\Carbon::parse($publishedAt)->format('j M Y') }}</p>
            @endif
            @if (! $compact && $authorBio)
                <p class="mt-2 text-sm text-[#434242] leading-relaxed">{{ $authorBio }}</p>
            @endif
        </div>
    </div>
@endif
