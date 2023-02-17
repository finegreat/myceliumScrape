<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ScraperController extends Controller
{
    protected function scrape()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.boohoo.com');

        $facebookUrls = [];
        $twitterUrls = [];
        $instaUrls = [];

        $crawler->filter('a')->each(function (Crawler $node) use (&$facebookUrls, &$twitterUrls, &$instaUrls) {
            $href = $node->attr('href');
            if (strpos($href, 'facebook.com') !== false || strpos($href, 'fb.com') !== false) {
                $facebookUrls[] = $href;
            } else if (strpos($href, 'twitter.com') !== false) {
                $twitterUrls[] = $href;
            } else if (strpos($href, 'instagram.com') !== false) {
                $instaUrls[] = $href;
            }
        });

        $urls = [
            'facebookUrls' => array_unique($facebookUrls),
            'twitterUrls' => array_unique($twitterUrls),
            'instaUrls' => array_unique($instaUrls),
        ];

        return view('scraper', compact('urls'));
    }

}
