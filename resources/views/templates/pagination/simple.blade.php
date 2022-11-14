@if($paginator->hasPages())
    <div class="flex justify-center items-center space-x-5">
        @if ($paginator->onFirstPage())
            <span class="btn btn-disabled"><i class="fas fa-angle-left"></i></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-tertiary"><i class="fas fa-angle-left"></i></a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-tertiary"><i class="fas fa-angle-right"></i></a>
        @else
            <span class="btn btn-disabled"><i class="fas fa-angle-right"></i></span>
        @endif
    </div>
@endif
