<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GetCamViewController extends Controller
{
    public function index() {

        return view('country');

    }

    public function view_id($cam_id) {

        if (Auth::user() != null) {
          $is_favorite = DB::table('favorites')->where([
            ['user_id', '=', Auth::user()->id],
            ['cam_id', '=', $cam_id],
          ])->exists();
        } else {
            $is_favorite = false;
        }
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.windy.com/api/webcams/v2/list/webcam=".$cam_id."?show=webcams:player",
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
          $webcam = ($response->result->webcams);
        }

        return view('webcam',['webcams' => $webcam, 'is_favorite' => $is_favorite]);

    }
}