<?php
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
	)
);
$resource_array = postCurl($curl_params, $data);
?>