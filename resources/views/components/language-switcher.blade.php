<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a 
             rel="alternate"
             hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
             class="text-blue-500 hover:text-blue-700">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>