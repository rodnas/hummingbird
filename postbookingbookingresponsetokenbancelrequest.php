<?php
$params["bookingResponseToken"] = "46101566-13c3-4c4a-a0b4-386e7788e6ed"; //$params["access_token"];
$curl_params["test_api_url"] = $params["base_url"]."booking/".$params["bookingResponseToken"]."/cancel-request";
$data = array(
	"details" => "HBT21/A201011"
);
$resource_array = postCurl($curl_params, $data);
?>
