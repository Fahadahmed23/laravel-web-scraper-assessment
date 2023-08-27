<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\MovieScraper;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;
use Exception;
use Mockery;

class MovieScrapingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSuccessfulScrapeAndInsertion()
    {
        // Mock the Goutte Client
        $crawlerMock = Mockery::mock(\Symfony\Component\DomCrawler\Crawler::class);
        $crawlerMock->shouldReceive('filter')->andReturn($crawlerMock);
        // ... configure crawlerMock as needed

        // Mock the Goutte Client in MovieScraper
        $movieScraper = new MovieScraper();
        $movieScraper->setGoutteClient($crawlerMock);

        // Mock the Movie Model for insertion
        $this->mockMovieModelForInsertion();

        // Assert that the database is empty
        $this->assertDatabaseCount('movies', 0);

        // Call the scrape method
        $movieScraper->scrape();

        // Assert that the database contains 10 records
        $this->assertDatabaseCount('movies', 10);
    }

    private function mockMovieModelForInsertion()
    {
        Movie::shouldReceive('where')->andReturnSelf();
        Movie::shouldReceive('first')->andReturnNull();
        Movie::shouldReceive('save')->once();
    }


    

}
