@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-stone-300 focus:border-stone-500 dark:focus:border-stone-600 focus:ring-stone-500 dark:focus:ring-stone-600 rounded-md shadow-sm',
]) !!}>
