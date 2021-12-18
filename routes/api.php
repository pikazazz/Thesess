<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\student\request_group;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::POST('FindGroup', function (Request $request) {
    $request_group = new request_group;
    $request_group->std_sender = $request->sender;
    $request_group->std_receiver =  $request->receiver;
    $request_group->save();
    return $request_group;
});


Route::GET('DOI', function (Request $request) {


    $api_url = 'https://www.bitkub.com/api/market/market-prices';

    // Read JSON file
    $json_data = file_get_contents($api_url);

    // Decode JSON data into PHP array
    $response_data = json_decode($json_data);

    // All user data exists in 'data' object
    $user_data = $response_data->data;

    // Cut long data into small & select only first 10 records
    $user_data = array_slice($user_data, 0, 9);

    // Print data if need to debug

    $rate = 0;
    foreach ($user_data as $user) {

        if ($user->currency == "KUB") {
            $rate =  $user->last_price;
        }
    }

    if ($rate >= 320 or $rate < 200) {

        $url        = 'https://notify-api.line.me/api/notify';
        $token      = 'e4aFQo8OrZpUs9Wkm71noz0fo5VFZpV7dsZEEtefURL';
        $headers    = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $token
        ];
        $fields     = 'message=เรทตอนนี้ ' . $rate;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, TRUE);


        return "SUCCESS";
    }
    return "<script>
    window.setInterval('refresh()', 2000);
    // Call a function every 10000 milliseconds
    // (OR 10 seconds).
    // Refresh or reload page.
    function refresh() {
        window.location.reload();
    }
</script>
    ";
});


