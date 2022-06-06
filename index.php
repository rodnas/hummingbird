<?php
$token_params["token_url"] = "https://api.hbtserver.net/oauth/token";

$token_params["client_id"] = "8adc3dd6-f9ae-4792-a2e4-f4d246ad3237";
$token_params["client_secret"] = "RWKDyOq5dKH5gv78Mdg3PoIjhXemwkPIlatYoQPL";

$params["test_api_url"]  = "https://api.hbtserver.net/v1/";

require_once "api.php";

echo "<pre>";

$access_token_array = getAccessToken($token_params);
$access_token = $access_token_array[0];
echo '**** Access Token ****<br>';
var_dump($access_token);
echo "****************************************************************************************************<br>";

$params["access_token"] = $access_token;

$params["curl_function"]="getPropertiesDestinationCode";
$resource = curlHummingCurl($params); 
var_dump($resource);
echo "****************************************************************************************************<br>";

$params["curl_function"]="getPropertiesDestinationCodeHotelCode";
$resource = curlHummingCurl($params); 
var_dump($resource);
$content = $resource;
echo "****************************************************************************************************<br>";


$params["curl_function"]="putBookingHotelCreateResponseToken";
$resource = curlHummingCurl($params); 
var_dump($resource);
$content = $resource;
echo "****************************************************************************************************<br>";

echo "</pre>";
?>