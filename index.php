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


$params["curl_function"]="postPriceSearch";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo $resource[4]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="getPriceSearchListingResponseToken";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[3]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="getPriceHotelHotelCodeDealsResponseToken";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[3]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="getPropertiesDestinationCode";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[3]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="getPropertiesDestinationCodeHotelCode";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[3]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="postBookingHotelCreateResponseToken";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[4]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="postBookingBookingIdGuestDetails";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[4]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="getBookingBookingResponseToken";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[3]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


$params["curl_function"]="postBookingBookingResponseTokenCancelRequest";
$resource = curlHummingCurl($params); 
//var_dump($resource);
echo  $resource[4]." -> ".$params["curl_function"]." -> ".$resource[1]."<br>";
echo "****************************************************************************************************<br>";


echo "</pre>";
?>