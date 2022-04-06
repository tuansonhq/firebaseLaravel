<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $SERVER_API_KEY = 'AAAA1NRdCjc:APA91bH5Sy1W_P5wxkzioqokH6vmJgLOWobO3ci1QaWYniyNTzFkWVf-tWmFd_LwI__x13ZWBXZlMmbOqK5bqXoSgih8wWXmn1Y5PXClHFXM4iNCpxyOf7syTujnAm-ZeaFpeTbgXLKQ';

    $token_1 = 'e_QXfK1AR3eFGRiFiad2C9:APA91bFl6_xBBG2CjEd2CXu3HZj5CbCJ4ak58tkkMqLk9ps5Jm_q9MogsTo1wxqYRNXrXkaaD-xsfK4obbe4Kun9GC4P9KuJWNOZdgtde98TaYV10m9Hp7VJzS4-zIDhRTPOIRVCBbRv';

    $random = Str::random(40);

    $text = 0;

    $data = [
        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => 'Welcome => '.$random,

            "body" => 'HQ Group',
            "android_channel_id" => "pushnotificationapp",
            "sound" => false // required for sound on ios
        ],
        "data" =>[
            "_id"=> $random
        ],
    ];



//    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa


    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    dd($response);
});
