<?php
namespace App\Services;

use Goutte\Client;

class MovieScraper
{
    public function scrapeTopMovies()
    {
        $url = 'https://www.imdb.com/chart/top/';
        $crawler = $this->requestUrl($url);

        $movies = [];
        // Loop through each movie entry
        $crawler->filter('.ipc-metadata-list-summary-item')->slice(0, 10)->each(function ($movieCrawler) use (&$movies) {
            $title = $movieCrawler->filter('.ipc-title__text')->text();
            preg_match('/^\d+\.\s+(.+)/', $title, $matches_title);

            $year = $movieCrawler->filter('.cli-title-metadata-item')->eq(0)->text();

            $rating = $movieCrawler->filter('.ipc-rating-star')->text();
            $pattern = '/(\d+\.\d+)/'; // This pattern matches a decimal number
            preg_match($pattern, $rating, $matches_rating);

            $url = $movieCrawler->filter('.ipc-title-link-wrapper')->attr('href');
            $url = "https://www.imdb.com$url";

            $movies[] = [
                'title' => isset($matches_title[1]) ? $matches_title[1] : '',
                'year' => $year,
                'rating' => isset($matches_rating[1]) ? $matches_rating[1] : '',
                'url' => $url,
            ];
        });

        return $movies;
    }

    private function requestUrl($url)
    {
        $client = new Client();

        return $client->request('GET', $url);
    }
}
