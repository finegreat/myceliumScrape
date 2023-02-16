<!DOCTYPE html>
<html>
    <head>
        <title>Scraped URLs</title>
    </head>
    <body>
        <h1>Facebook URLs:</h1>
        <ul>
            @foreach ($urls['facebookUrls'] as $url)
                <li><a href="{{ $url }}">{{ $url }}</a></li>
            @endforeach
        </ul>

        <h1>Twitter URLs:</h1>
        <ul>
            @foreach ($urls['twitterUrls'] as $url)
                <li><a href="{{ $url }}">{{ $url }}</a></li>
            @endforeach
        </ul>

        <h1>Instagram URLs:</h1>
        <ul>
            @foreach ($urls['instaUrls'] as $url)
                <li><a href="{{ $url }}">{{ $url }}</a></li>
            @endforeach
        </ul>
    </body>
</html>
