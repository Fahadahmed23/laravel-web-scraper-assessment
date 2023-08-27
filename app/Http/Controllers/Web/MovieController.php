<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\City;
use App\Models\Movie;
use App\Models\Template;

use Illuminate\Support\Facades\DB;
use Exception; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Date;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Intervention\Image\ImageManagerStatic as Image;
use App\Jobs\ProcessCityPages;
use Illuminate\Support\Facades\Log;


class MovieController extends Controller
{

    // Get All Movies
    public function index()
    {
        return view('movies.movies');
    }


    //  Get All Movies  Data
    public function getData(Request $request)
    {

        // Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

    
        // Base query for Movie
        $query = Movie::query();

        // Apply search filter for both "Language" and "ISO Code"
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('year', $searchValue);
            });
        }


        // Total records
        $totalRecords = $query->count();

        // Total records with filters
        $totalRecordsWithFilter = $query->count();

        // Fetch records with pagination and ordering
        $records = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

       
        $data_arr = [];
        $idIncrement = 1; // Initialize the increment variable

        foreach ($records as $record) {

            // Customize this part according to the structure of your data and relationships
            $id = $record->id; // Use the increment variable as the ID
            $title = $record->title ?? '';
            $year = $record->year ?? '';
            $rating = $record->rating ?? '';
            $url = $record->url ?? '';


            //$moviePageUrl = '<a class="btn btn-primary btn-xs" href="'.$url.'">Movie Url</a>';
            $moviePageUrl = '<a class="btn btn-primary btn-xs" href="'.$url.'" target="_blank">Movie Url</a>';



            // Generate the action buttons HTML using the Blade template based on permissions
            $actionButtonsHtmlView = '';
            $actionButtonsHtmlEdit = '';
            $actionButtonsHtmlDelete = '';

            
            $actionButtonsHtmlView .= '<a class="btn btn-success btn-xs" href="/view-movie/'.$id.'">View</a>';

            //$actionButtonsHtmlEdit .= '<a class="btn btn-primary btn-xs" href="/edit-movie/'.$id.'">Edit</a>';

            //$actionButtonsHtmlDelete .= '<button class="btn btn-danger btn-xs delete-button" data-movie-id="'.$id.'">Delete</button>';
            

     
            $data_arr[] = [
                "id" => $id,
                "title" => $title,
                "year" => $year,
                "rating" => $rating,
                "url" => $moviePageUrl,
                //"action" => $actionButtonsHtmlView . ' ' . $actionButtonsHtmlEdit . ' ' . $actionButtonsHtmlDelete,

            ];

            // Increment the ID for the next iteration
            $idIncrement++;
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data_arr
        ];

        return response()->json($response);
    }


    public function scrape()
    {
        $url = 'https://www.imdb.com/chart/top/';
        $crawler = $this->requestUrl($url);

        // Loop through each movie entry
        $crawler->filter('.ipc-metadata-list-summary-item')->slice(0, 10)->each(function ($movieCrawler) {
            $title = $movieCrawler->filter('.ipc-title__text')->text();
            preg_match('/^\d+\.\s+(.+)/', $title, $matches_title);

            $year = $movieCrawler->filter('.cli-title-metadata-item')->eq(0)->text();

            $rating = $movieCrawler->filter('.ipc-rating-star')->text();
            $pattern = '/(\d+\.\d+)/'; // This pattern matches a decimal number
            preg_match($pattern, $rating, $matches_rating);

            $url = $movieCrawler->filter('.ipc-title-link-wrapper')->attr('href');
            $url = "https://www.imdb.com$url";


           
            

            // Store data in the database using Eloquent with validation
            try {
                // Check if the movie already exists in the database by title
                $existingMovie = Movie::where('title', isset($matches_title[1]) ? $matches_title[1] : '')->first();

               
                
                if (!$existingMovie) {
                    
                    $movie = new Movie();
                    $movie->title = isset($matches_title[1]) ? $matches_title[1] : '';
                    $movie->year = $year;
                    $movie->rating = isset($matches_rating[1]) ? $matches_rating[1] : '';
                    $movie->url = $url;
                    $movie->save();
                }
            } catch (Exception $e) {
                // Log the database insertion error
                Log::error("Error inserting data: " . $e->getMessage());
            }
        });
    }



    private function requestUrl($url)
    {
        $client = new Client();

        return $client->request('GET', $url);
    }


}
