<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredictionsData;

class APIController extends Controller
{
    public function callAPI(){
        $predictionsData = PredictionsData::whereDate('prediction_updated_at', date('Y-m-d'))->get();
        
        $arrOfPredictions = [];
        foreach($predictionsData as $data):
            $predictions = json_decode($data->prediction_data, true);
            
            if(isset($predictions['data']) && !empty($predictions['data'])){
                // Remove duplicates if exists and replace it with new one //
                $prevArr = $predictions['data'];
                $count = count($prevArr);
                for($i = 0; $i < $count; $i++){
                    if(isset($prevArr[$i]['match_id'])){
                        $arrOfPredictions[$prevArr[$i]['match_id']] = $prevArr[$i];
                    }else{
                        $arrOfPredictions[$prevArr[$i]['id']] = $prevArr[$i];
                    }
                }
            }
        endforeach;
        $predictionsData = $arrOfPredictions;

        return view('index', compact('predictionsData'));
    }
}
