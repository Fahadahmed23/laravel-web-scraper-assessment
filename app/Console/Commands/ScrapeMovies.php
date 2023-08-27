<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ScrapeMoviesJob;
//use App\Http\Controllers\Web\MovieController;

class ScrapeMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // php artisan run scrape:movies
    protected $signature = 'scrape:movies';

    // php artisan scrape:movies

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape top 10 movies from IMDb';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Call the scrape method from the MovieController
        //$movieController = new MovieController();
        //$movieController->scrape();

        // Dispatch the job to the queue
        ScrapeMoviesJob::dispatch();

        $this->info('Movies scraped successfully.');
        

    }
}
