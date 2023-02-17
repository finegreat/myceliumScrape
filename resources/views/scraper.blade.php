<x-guest-layout>
    <x-slot name="header">
        <h1 class="font-weight-bold">
            {{ __('Social Media Links:') }}
        </h1>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                 </ul>
            </nav>
        </div>
    </div>

</x-guest-layout>
