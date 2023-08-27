<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Movie;
use App\Services\MovieScraper;
use Illuminate\Support\Facades\Log;
use Exception; 

class ScrapeMoviesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $movieScraper = new MovieScraper();
        $movies = $movieScraper->scrapeTopMovies();
        // Process the scraped movies and store them in the database
        foreach ($movies as $movieData) {
            // Store data in the database using Eloquent with validation
            try {
                // Check if the movie already exists in the database by title
                $existingMovie = Movie::where('title', $movieData['title'])->first();

                if (!$existingMovie) {
                    $movie = new Movie();
                    $movie->title = $movieData['title'];
                    $movie->year = $movieData['year'];
                    $movie->rating = $movieData['rating'];
                    $movie->url = $movieData['url'];
                    $movie->save();
                }
            } catch (Exception $e) {
                // Log the database insertion error
                Log::error("Error inserting data: " . $e->getMessage());
            }
        }
    }
}
