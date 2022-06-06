<?php
$params["bookingId"] = "739a34c7-672a-427b-87d7-c7f444a560b8"; //$params["access_token"];
$curl_params["test_api_url"] = $params["base_url"]."booking/".$params["bookingId"]."/guest-details";
$data = array(
	"details" => [  array(
		"id" => "123",
		"primary" => true,
	        "type" => "adult",
	        "wheelChair"=> false,
		"firstName" => "John",
		"lastName" => "Doe",
		"childAge" => "4",
		"arrivalFlightDate" => "2021-07-04",
		"arrivalFlightAirline" => "EK",
		"arrivalFlightNumber" => "EK103",
		"departureFlightDate" => "2021-07-14",
		"departureFlightAirline" => "EK",
		"departureFlightNumber" => "EK103"

	)]
);
$resource_array = postCurl($curl_params, $data);
?>