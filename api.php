<?php
$params["base_url"] = "https://api.hbtserver.net/v1/";

function curlHummingCurl($params) {
	$hummingridCurlActionArray = Array();
	$hummingridCurlActionArray["getPropertiesDestinationCode"]="getPropertiesDestinationCode"; 
	$hummingridCurlActionArray["getPropertiesDestinationCodeHotelCode"]="getPropertiesDestinationCodeHotelCode"; 
	$hummingridCurlActionArray["putBookingHotelCreateResponseToken"]="putBookingHotelCreateResponseToken"; 


	// Acttions possibilities
	$resource_array = Array();
	if ( array_key_exists($params["curl_function"], $hummingridCurlActionArray) ) {
		$curl_params["access_token"] = $params["access_token"];
		$curl_params["curl_function"] = $params["curl_function"];
		switch ($params["curl_function"])
			{
			case "getPropertiesDestinationCode":
				$params["destinationCode"] = "MV";
				$curl_params["test_api_url"] = $params["base_url"]."properties/".$params["destinationCode"];
				$resource_array = getCurl($curl_params);
				break;
			case "getPropertiesDestinationCodeHotelCode":
				$params["destinationCode"] = "MV";
				$params["hotelCode"] = "h5cc6bdd77a6f9";
				$curl_params["test_api_url"] = $params["base_url"]."properties/".$params["destinationCode"]."/".$params["hotelCode"];
				$resource_array = getCurl($curl_params);
				break;
			case "putBookingHotelCreateResponseToken":
				$params["hotelCode"] = "h5cc6bdd77a6f9";
				$params["responseToken"] = "c4e90180-ebb0-4392-8026-62d80e39ecef";
				$curl_params["test_api_url"] = $params["base_url"]."booking/".$params["hotelCode"]."/create/".$params["responseToken"];
				$data = array(
					"bookingRequest" => array(
						"primaryGuestName" => "John Doe",
						"groups" => array(
							"id" =>"group-1",
						        "room" => "DBV",
						        "deal"=> "05e15b0cfd4c4d"
						)
					));
				$resource_array = putCurl($curl_params, $data);
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

function putCurl($curl_params, $data) {
	$json_content = json_encode($data);
	$header = [
		'Authorization: Bearer '.$curl_params["access_token"],
		'accept: application/json',
		'Content-Length: ' . strlen($json_content)
	];

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $curl_params["test_api_url"],
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLINFO_HEADER_OUT => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $json_content

	));
	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
	curl_close($curl);

	return array(json_decode($response, true), $curl_params["test_api_url"], $curl_params, $status_code);
}


?>