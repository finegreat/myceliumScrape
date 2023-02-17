<x-guest-layout>
    <x-slot name="header">
        <h1 class="font-weight-bold">
            {{ __('Social Media Links:') }}
        </h1>
    </x-slot>

<html>
    <head>
        <title>Scraped URLs</title>
    </head>
    <body>
            @if (empty($urls['facebookUrls']) && empty($urls['twitterUrls']) && empty($urls['instaUrls']))
        <p>No social media links found.</p>
    @else
        <h4>Facebook URLs:</h4>
        <ul>
            @foreach ($urls['facebookUrls'] as $url)
                <li><a href="{{ $url }}">{{ $url }}</a></li>
            @endforeach
        </ul>

        <h4>Twitter URLs:</h4>
        <ul>
            @foreach ($urls['twitterUrls'] as $url)
                <li><a href="{{ $url }}">{{ $url }}</a></li>
            @endforeach
        </ul>

        <h4>Instagram URLs:</h4>
        <ul>
            @foreach ($urls['instaUrls'] as $url)
                <li><a href="{{ $url }}">{{ $url }}</a></li>
            @endforeach
        </ul>
        @endif
    </body>
</html>

</x-app-layout>
