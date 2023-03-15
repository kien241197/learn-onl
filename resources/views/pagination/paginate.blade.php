@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
         <li class="page-item disabled">
            <a class="page-link"><span>Trước</span></a>
        </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Trước</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item disabled">
                <a class="page-link"><span>{{ $element }}</span></a>
            </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                      <span class="page-link">
                        {{ $page }}
                        <span class="sr-only">(current)</span>
                      </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Sau</a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="page-link"><span>Sau</span></a>
        </li>
        @endif
  </ul>
</nav>
@endif