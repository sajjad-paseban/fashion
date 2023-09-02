@if ($paginator->hasPages())
    <nav class="pagination">
        <ul>
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">قبلی</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">بعدی</a></li>
            @endif
        </ul>
    </nav>
@endif
