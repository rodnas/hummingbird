<?php
$token_params["token_url"] = "https://api.hbtserver.net/oauth/token";

$token_params["client_id"] = "8adc3dd6-f9ae-4792-a2e4-f4d246ad3237";
$token_params["client_secret"] = "RWKDyOq5dKH5gv78Mdg3PoIjhXemwkPIlatYoQPL";

$params["test_api_url"]  = "https://api.hbtserver.net/v1/";
$params["base_url"] = "https://api.hbtserver.net/v1/";

function curlHummingCurl($params) {
	$hummingridCurlActionArray = Array();
	$hummingridCurlActionArray["postPriceSearch"]="postPriceSearch"; 
	$hummingridCurlActionArray["getPriceSearchListingResponseToken"]="getPriceSearchListingResponseToken"; 
	$hummingridCurlActionArray["getPriceHotelHotelCodeDealsResponseToken"]="getPriceHotelHotelCodeDealsResponseToken"; 

	$hummingridCurlActionArray["getPropertiesDestinationCode"]="getPropertiesDestinationCode"; 
	$hummingridCurlActionArray["getPropertiesDestinationCodeHotelCode"]="getPropertiesDestinationCodeHotelCode"; 

	$hummingridCurlActionArray["postBookingHotelCreateResponseToken"]="postBookingHotelCreateResponseToken"; 
	$hummingridCurlActionArray["postBookingBookingIdGuestDetails"]="postBookingBookingIdGuestDetails"; 
	$hummingridCurlActionArray["getBookingBookingResponseToken"]="getBookingBookingResponseToken"; 
	$hummingridCurlActionArray["postBookingBookingResponseTokenCancelRequest"]="postBookingBookingResponseTokenCancelRequest"; 


	// Acttions possibilities
	$resource_array = Array();
	if ( array_key_exists($params["curl_function"], $hummingridCurlActionArray) ) {
		$curl_params["access_token"] = $params["access_token"];
		$curl_params["curl_function"] = $params["curl_function"];
		switch ($params["curl_function"])
			{
			case "postPriceSearch":
				include "postpricesearch.php";
				break;
			case "getPriceSearchListingResponseToken":
				include "getpricesearchlistingresponsetoken.php";
				break;
			case "getPriceHotelHotelCodeDealsResponseToken":
				include "getpricehotelhotelcodedealsresponsetoken.php";
				break;
			case "getPriceSearchListingResponseToken":
				include "getpricesearchlistingresponsetoken.php";
				break;
			case "getPropertiesDestinationCode":
				include "getpropertiesdestinationcode.php";
				break;
			case "getPropertiesDestinationCodeHotelCode":
				include "getpropertiesdestinationcodehotelcode.php";
				break;
			case "postBookingHotelCreateResponseToken":
				include "postbookinghotelcreateresponsetoken.php";
				break;
			case "postBookingBookingIdGuestDetails":
				include "postbookingbookingidguestdetails.php";
				break;
			case "getBookingBookingResponseToken":
				include "getbookingbookingresponsetoken.php";
				break;
			case "postBookingBookingResponseTokenCancelRequest":
				include "postbookingbookingresponsetokenbancelrequest.php";
				break;

			default:
				$resource_array[] = "Error Function";
				$resource_array[] = $params["test_api_url"];
				$resource_array[] = $params["curl_function"];
				$resource_array[] = -2;
				break;
		}
	} else {
		$resource_array[] = "Function Not Exist";
		$resource_array[] = $params["test_api_url"];
		$resource_array[] = $params["curl_function"];
		$resource_array[] = -1;
	}
	return $resource_array;
}

function getAccessToken($token_params) {
	$content = "grant_type=client_credentials&scope=*";
	$authorization = base64_encode("{$token_params["client_id"]}:{$token_params["client_secret"]}");
	$header = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $token_params["token_url"],
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $content
	));
	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
	curl_close($curl);

	return array(json_decode($response)->access_token, $token_params["token_url"], $status_code);
}

function getCurl($curl_params) {
	$header = [
		'Authorization: Bearer '.$curl_params["access_token"],
		'accept: application/json'
	];

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $curl_params["test_api_url"],
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_RETURNTRANSFER => true

	));
	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
	curl_close($curl);

	return array(json_decode($response, true), $curl_params["test_api_url"], $curl_params, $status_code);
}

function postCurl($curl_params, $data) {
	$json_content = json_encode($data);
	$header = [
		'Authorization: Bearer '.$curl_params["access_token"],
		'accept: application/json'
//		'Content-Length: ' . strlen($json_content)
	];

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $curl_params["test_api_url"]);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	//curl_setopt($curl, CURLINFO_HEADER_OUT, true);			// if need
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json_content);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);		// if need

	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
	curl_close($curl);

	return array(json_decode($response, true), $curl_params["test_api_url"], $curl_params, $json_content, $status_code);
}

function putCurl($curl_params, $data) {
	$json_content = json_encode($data);
	$header = [
		'Authorization: Bearer '.$curl_params["access_token"],
		'accept: application/json',
		'Content-Length: ' . strlen($json_content)
	];

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $curl_params["test_api_url"]);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json_content);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);		// if need
	//curl_setopt($curl, CURLINFO_HEADER_OUT, true); 			// if need

	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
	curl_close($curl);

	return array(json_decode($response, true), $curl_params["test_api_url"], $curl_params, $json_content, $status_code);
}

function deleteCurl($curl_params, $data) {
	$json_content = json_encode($data);
	/*	if need
	$header = [
		'Authorization: Bearer '.$curl_params["access_token"],
		'accept: application/json',
		'Content-Length: ' . strlen($json_content)
	];
	*/
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $curl_params["test_api_url"]);
	//curl_setopt($curl, CURLOPT_HTTPHEADER, $header);			// if need
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json_content);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);		// if need
	//curl_setopt($curl, CURLINFO_HEADER_OUT, true); 			// if need

	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
	curl_close($curl);

	return array(json_decode($response, true), $curl_params["test_api_url"], $curl_params, $json_content, $status_code);
}

?>