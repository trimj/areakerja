@if($paginator->hasPages())
    <div class="flex items-center justify-center text-sm font-medium space-x-5">
        <div class="flex items-center justify-center space-x-2">
            @if($paginator->currentPage() > $paginator->onFirstPage()+2)
                <a class="btn btn-tertiary hidden sm:block" href="{{ $paginator->url($paginator->onFirstPage()) }}" title="First Page"><i class="fas fa-angle-double-left"></i></a>
            @endif
            @if($paginator->currentPage() > $paginator->onFirstPage())
                <a class="btn btn-tertiary" href="{{$paginator->previousPageUrl()}}" title="Previous Page"><i class="fas fa-angle-left"></i></a>
            @endif
        </div>
        <div class="space-x-1 hidden sm:block">
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <?php
                    $half_total_links = floor(7 / 2);
                    $from = $paginator->currentPage() - $half_total_links;
                    $to = $paginator->currentPage() + $half_total_links;
                    if ($paginator->currentPage() < $half_total_links) {
                        $to += $half_total_links - $paginator->currentPage();
                    }
                    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                    }
                    ?>
                @if ($from < $i && $i < $to)
                    @if(($paginator->currentPage() == $i))
                        <span href="{{ $paginator->url($i) }}" class="btn btn-currentPage">{{ $i }}</span>
                    @else
                        <a href="{{ $paginator->url($i) }}" class="btn btn-tertiary" @if($paginator->currentPage() == $i)) title="{!! __('pagination.now') !!}" @endif>{{ $i }}</a>
                    @endif
                @endif
            @endfor
        </div>
        <div class="flex items-center justify-center space-x-2">
            @if($paginator->currentPage() < $paginator->lastPage())
                <a class="btn btn-tertiary" href="{{ $paginator->nextPageUrl() }}" title="Next Page"><i class="fas fa-angle-right"></i></a>
            @endif
            @if($paginator->currentPage() < $paginator->lastPage()-1)
                <a class="btn btn-tertiary hidden sm:block" href="{{ $paginator->url($paginator->lastPage()) }}" title="Last Page"><i class="fas fa-angle-double-right"></i></a>
            @endif
        </div>
    </div>
@endif
