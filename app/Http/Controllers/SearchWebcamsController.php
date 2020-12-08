<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchWebcamsController extends Controller
{

    public function requestAPI(Request $request) {

        $country = $request->input('country');
        $limit = $request->input('limit');
        $category = $request->input('categories');
        
        $curl = curl_init();
       
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.windy.com/api/webcams/v2/list/category=".$category."/country=".$country."/limit=".$limit."?show=webcams:image",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_HTTPHEADER => array(
            "x-windy-key: f66o0WwN443zH86DLEnaOPO7MGQgCAgA"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $response = json_decode($response);
          $webcams = ($response->result->webcams);
          $numberFound = sizeof($webcams);
        }

        return view('result',['webcams' => $webcams, 'number' => $numberFound]);

    }


}
