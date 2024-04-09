@props(['name', 'type' => null, 'required' => false])

<li class="!pl-0 pb-2">
    <dl class="flex flex-wrap items-center gap-x-2 text-sm">
        <dt class="sr-only">Name</dt>
        <dd class="m-0 p-0">
            <code class="inline-block px-2 py-1 text-xs font-semibold leading-none bg-cyan-200 text-cyan-800 rounded-full ml-1">{{ $name }}</code>
        </dd>
       
        @if ($type)
            <dt class="sr-only">Type</dt>
            <dd class="m-0 p-0 font-mono text-xs text-zinc-400 dark:text-zinc-500">
                {{ $type }}
            </dd>
        @endif
         @if ($required)
            <span class="inline-block px-2 py-1 text-xs font-semibold leading-none bg-red-200 text-red-800 rounded-full ml-1">required</span>
        @endif
        <dt class="sr-only">Description</dt>
        <dd class="w-full flex-none [&>:first-child]:mt-0 [&>:last-child]:mb-0">
            {{ $slot }}
        </dd>
    </dl>
</li>
