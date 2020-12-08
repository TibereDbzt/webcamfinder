<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

class FavoritesController extends Controller
{
    public function insert(Request $request) {
        $favorite = new Favorite;
        $favorite->user_id = Auth::user()->id;
        $favorite->cam_id = $request->input('id_cam');
        $favorite->save();
    }

    public function delete(Request $request) {
        $favorite = DB::table('favorites')->where([
            ['cam_id', '=', $request->input('id_cam')],
            ['user_id', '=', Auth::user()->id],
        ]);
        $favorite->delete();
    }

    public function display(Request $request) {
        $favorites = DB::table('favorites')->where('user_id', '=', Auth::user()->id)->select('cam_id')->get();
        $favorites = $favorites->implode('cam_id', ',');

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.windy.com/api/webcams/v2/list/webcam=".$favorites."?show=webcams%3Aimage",
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
            if (!(array)$response->result) {
                $favorites = (object)[];
                $total = 'no';
            } else {
                $total = $response->result->total;
                $favorites = $response->result->webcams;
            }
            return view ('favorites', ['favorites' => $favorites, 'total' => $total]);
        }
    }
}
