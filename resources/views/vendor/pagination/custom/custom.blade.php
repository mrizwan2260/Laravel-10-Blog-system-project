@if ($paginator->hasPages())
    <div class="col-lg-6 text-center">
        <nav class="navigation pagination d-inline-block">
            <div class="nav-links">


                {{-- <a class="prev page-numbers" href="#">Prev</a>
                <span aria-current="page" class="page-numbers current">1</span>
                <a class="page-numbers" href="#">2</a>
                <a class="next page-numbers" href="#">Next</a> --}}

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    {{-- <li class="disabled prev page-numbers" aria-disabled="true" aria-label="@lang('pagination.previous')"> --}}
                        <a class="prev page-numbers" href="#">Prev</a>
                    {{-- </li> --}}
                @else
                    {{-- <li class="prev page-numbers"> --}}
                        <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">Prev</a>
                    {{-- </li> --}}
                @endif


                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        {{-- <li class="page-item disabled" aria-disabled="true"> --}}
                            <span
                                class="page-link">{{ $element }}</span>
                            {{-- </li> --}}
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- <li class="active page-numbers current" aria-current="page"> --}}
                                    <span aria-current="page"
                                        class="page-numbers current">{{ $page }}</span>
                                    {{-- </li> --}}
                            @else
                                <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    {{-- <li class="next page-numbers"> --}}
                        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">Next</a>
                    {{-- </li> --}}
                @else
                    {{-- <li class="disabled page-numbers" aria-disabled="true" aria-label="@lang('pagination.next')"> --}}
                        <a class="next page-numbers" href="#">Next</a>
                    {{-- </li> --}}
                @endif
            </div>
        </nav>
    </div>
@endif



{{-- <div class="row justify-content-center mt-5">
    <div class="col-lg-6 text-center">
        <nav class="navigation pagination d-inline-block">
            <div class="nav-links">
                <a class="prev page-numbers" href="#">Prev</a>
                <span aria-current="page" class="page-numbers current">1</span>
                <a class="page-numbers" href="#">2</a>
                <a class="next page-numbers" href="#">Next</a>
            </div>
        </nav>
    </div>
</div> --}}
