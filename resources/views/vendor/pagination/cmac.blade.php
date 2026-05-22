@if ($paginator->hasPages())
<nav>
    <ul style="display:flex;justify-content:center;gap:8px;list-style:none;padding:0;margin:0;flex-wrap:wrap;">
        {{-- Previous Page --}}
        @if ($paginator->onFirstPage())
            <li><span style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;border:1.5px solid #e5e7eb;color:#d1d5db;cursor:not-allowed;">â€¹</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;border:1.5px solid #e5e7eb;color:var(--text-dark);transition:all 0.2s;" onmouseover="this.style.background='var(--primary)';this.style.color='#fff';this.style.borderColor='var(--primary)';" onmouseout="this.style.background='';this.style.color='var(--text-dark)';this.style.borderColor='#e5e7eb';">â€¹</a></li>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li><span style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;color:var(--text-muted);">â€¦</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;background:var(--primary);color:#fff;font-weight:600;font-size:14px;">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;border:1.5px solid #e5e7eb;color:var(--text-dark);font-size:14px;transition:all 0.2s;" onmouseover="this.style.background='var(--primary)';this.style.color='#fff';this.style.borderColor='var(--primary)';" onmouseout="this.style.background='';this.style.color='var(--text-dark)';this.style.borderColor='#e5e7eb';">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;border:1.5px solid #e5e7eb;color:var(--text-dark);transition:all 0.2s;" onmouseover="this.style.background='var(--primary)';this.style.color='#fff';this.style.borderColor='var(--primary)';" onmouseout="this.style.background='';this.style.color='var(--text-dark)';this.style.borderColor='#e5e7eb';">â€؛</a></li>
        @else
            <li><span style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;border:1.5px solid #e5e7eb;color:#d1d5db;cursor:not-allowed;">â€؛</span></li>
        @endif
    </ul>
</nav>
@endif
