<x-docs-layout>

    <main @class([
        'flex-1 prose max-w-none',
        'max-w-none' => isset($frontmatter['toc']) && !$frontmatter['toc'] ?? false,
    ])>
        <article>

            @isset($frontmatter['title'])
                <h1>{{ $frontmatter['title'] }}</h1>
            @endisset
            @isset($frontmatter['description'])
                <p>{{ $frontmatter['description'] }}</p>
            @endisset
            {!! $content !!}
        </article>

    </main>

    @if ($frontmatter['toc'] ?? true)
        <x-table-of-content />
    @endif

</x-docs-layout>
