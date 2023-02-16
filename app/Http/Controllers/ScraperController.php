<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\TeamContact; // Import the TeamContact model
use Symfony\Component\DomCrawler\Crawler;

class ScraperController extends Controller
{
    public function scrape()
    {
        $client = new Client();
        $teamContacts = TeamContact::all(); // Fetch all records from the team_contacts table

        $result = [];

        foreach ($teamContacts as $teamContact) {
            $website = $teamContact->website;

            $crawler = $client->request('GET', $website);

            $facebookUrls = [];
            $twitterUrls = [];

            $crawler->filter('a:contains("Facebook"), a:contains("Twitter")')->each(function (Crawler $node) use (&$facebookUrls, &$twitterUrls) {
                $href = $node->attr('href');
                if (strpos($href, 'facebook.com') !== false) {
                    $facebookUrls[] = $href;
                } elseif (strpos($href, 'twitter.com') !== false) {
                    $twitterUrls[] = $href;
                }
            });

            $result[] = [
                'id' => $teamContact->id,
                'handle' => $teamContact->handle,
                'website' => $website,
                'facebookUrls' => $facebookUrls,
                'twitterUrls' => $twitterUrls,
            ];
        }

        return view('scraper', compact('result'));
    }
}
