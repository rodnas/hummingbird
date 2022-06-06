<?php
$params["responseToken"] = "db9b1ba7-e217-4feb-936e-08bfa5e10615"; //$params["access_token"];
$params["price_details"] = "true"; // true oe false
$curl_params["test_api_url"] = $params["base_url"]."price/search/listing/".$params["responseToken"]."?price_details=".$params["price_details"];
$resource_array = getCurl($curl_params);
?>
