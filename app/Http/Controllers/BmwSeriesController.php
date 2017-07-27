<?php 
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use \App\BmwSeries;
use \App\BmwModel;

class BmwSeriesController extends Controller
{

    /**
     * shows a list of all the series and their related models
     * @return view
     */
    public function index()
    {
    	// get the series with their related models
        $series = BmwSeries::with('models')
            ->get();

        return view('home', compact('series'));

    }

    /**
     * returns the json object so we can use it as an api for our react app
     * @return view
     */
    public function apiSeries()
    {
        $series = BmwSeries::with('models')
            ->get();

        return $series;

    }
    
}

 ?>