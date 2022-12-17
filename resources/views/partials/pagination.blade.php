<nav class="blog-pagination" aria-label="Pagination">
    @if(request('category'))
        {{ $articles->appends(['category' => request('category')])->links() }}
    @else
        {{ $articles->links() }}
    @endif
</nav>
