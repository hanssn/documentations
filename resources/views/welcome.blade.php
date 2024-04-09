<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,600" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div
        class="relative min-h-screen selection:bg-red-500 selection:text-white sm:flex sm:items-center sm:justify-center">

        <div class="mx-auto max-w-7xl p-6 lg:p-8">
            <x-steps>
                <h3><a href="{{ route('page.show', ['type' => 'docs']) }} "> Docs</a></h3>
                <h3><a href="{{ route('page.show', ['type' => 'api']) }} "> API</a></h3>
            </x-steps>

            <p class="text-white">{{ __('messages.greeting') }}</p>

        </div>
    </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
