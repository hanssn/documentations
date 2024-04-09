@props([
    'sticky' => false,
])

<div
    {{ $attributes->merge([
        'class' => '\[&>:first-child\]:mt-0 \[&>:last-child\]:mb-0' . ($sticky ? 'xl:sticky xl:top-24' : ''),
    ]) }}>
    {{ $slot }}
</div>
