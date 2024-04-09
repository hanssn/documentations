<x-docs-layout>

    <main @class([
        'flex-1 prose px-0 max-w-none',
        'max-w-none' => isset($frontmatter['toc']) && !$frontmatter['toc'] ?? false,
    ])>
        <article>
            @isset($frontmatter['title'])
                <h1>{{ $frontmatter['title'] }}</h1>
            @endisset

            @isset($frontmatter['method'])
                <div class="flex items-center gap-x-3">
                    <x-method method="{{ $frontmatter['method'] }}" />
                    <span class="font-mono text-xs text-zinc-400">{{ $frontmatter['label'] }}</span>
                </div>
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
