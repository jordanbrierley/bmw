<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use GuzzleHttp\Client;
use \App\BmwSeries;
use \App\BmwModel;

class BmwImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bmw:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves the data from the api and imports it into the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Console command to import the data from the API.
     * Done as a command so we can schedule this through the cron tab so going forward we can regularly import the data into our application automatically
     *
     * @return mixed
     */
    public function handle()
    {

        $this->info('Starting Import');
        // set up new guzzle client
        $client = new Client();
        // send new request to 
        $res = $client->request('GET', 'http://pdi.bmw.staging.oliver.solutions/data/series-data.json');
        // get body
        $resBody= $res->getBody();
        // decode json body contents to array
        $resultArray = json_decode($resBody->getContents());
        // loop through data
        foreach ($resultArray->data->series as $seriesKey => $seriesData) {
            // if it's an object we have series data
            if (is_object($seriesData)) {
                // query series for record that matches the name
                $series = BmwSeries::where('name', '=', $seriesKey)->first();
                // if does not exist
                if ($series === null) {
                    // if no series exists, iniialise new series class
                    $this->info('Creating Series');
                    $series = new BmwSeries;
                }else{
                	$this->info('Updating Series');
                }
                $series->name  = $seriesKey;
                $series->series_icon = $seriesData->series_icon;
                $series->display_order = $seriesData->display_order;
                $series->medium_images = $seriesData->medium_images;
                $series->brand = $seriesData->brand;
                $series->save();

                // loop through series data
                foreach ($seriesData as $modelKey => $modelData) {
                    // if it's an object we have model data
                    if (is_object($modelData)) {
                        // check if model exists in this series
                        $model = BmwModel::where('name', '=', $modelKey)
                            ->where('bmw_series_id', '=', $series->id)
                            ->first();

                        // if does not exist
                        if ($model === null) {
                        	// if no model exists, iniialise new model class
                            $this->info('Creating Model');
                            $model = new BmwModel;
                       	}else{
	                		$this->info('Updating Model');
	               		}
                        // create new model with data
                        $model->name = $modelKey;
                        $model->series = $modelData->series;
                        $model->medium_images = $modelData->medium_images;
                        $model->brochure_image = $modelData->brochure_image;
                        $model->brochure_id = $modelData->brochure_id;
                        $model->brochure_name = $modelData->brochure_name;
                        $model->background_image_mobile = $modelData->background_image_mobile;
                        $model->background_image = $modelData->background_image;
                        $model->link = $modelData->link;
                        $model->m_series = $modelData->m_series;
                        $model->hybrid = $modelData->hybrid;
                        $model->mapped_body_type = $modelData->mapped_body_type;
                        $model->body_type = $modelData->body_type;
                        $model->body_style_id = $modelData->body_style_id;
                        $model->bmw_series_id = $series->id;
                        $model->save();
                    }
                }
            }
        }
        $this->info('Import Finished');
    }
}
