<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PredictionsData;

class dailyFootballPredictionsByboggio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bettingTips:boggio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate betting tips daily.';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://football-prediction-api.p.rapidapi.com/api/v2/predictions?market=classic&iso_date=".date("Y-m-d")."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: football-prediction-api.p.rapidapi.com",
                "x-rapidapi-key: 3b5b072016msh9e3d27dd38d5042p1d6238jsn432aefe0e39c"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $predictionModel = new PredictionsData();

        if ($err) {
            $predictionModel->prediction_data_error = $err;
            $predictionModel->save();
            $this->error("Sorry, something went wrong while trying gather data from API. Check database");
        } else {
            $predictionModel->prediction_data = $response;
            $predictionModel->save();
            $this->info("Successfully gathered data from API");
        }
    }
}
