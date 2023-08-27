<?php

namespace App\Console;


use App\Console\Commands\ScrapeMovies;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

        // Schedule the movie scraping command to run daily at 12:00 PM
        $schedule->command('scrape:movies')->dailyAt('12:00');
        
        // $schedule->command('inspire')->hourly();

        // Schedule a command to run every minute
        //$schedule->command('queue:work --stop-when-empty')
        //    ->everyMinute(); // The command will be run every minute

        // The 'queue:work --stop-when-empty' command will start a queue worker that will process all the jobs in the queue
        // The worker will stop running once all the jobs in the queue have been processed
        // This allows us to continuously process our queued jobs without having a queue worker running all the time

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
