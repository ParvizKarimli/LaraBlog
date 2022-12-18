<div class="p-4">
    @unless(count($archives) === 0)
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            @foreach($archives as $archive)
                <li>
                    <a href="#">
                        {{ $archive->month . ' ' . $archive->year . ' (' . $archive->number_of_articles . ')' }}
                    </a>
                </li>
            @endforeach
        </ol>
    @endunless
</div>
