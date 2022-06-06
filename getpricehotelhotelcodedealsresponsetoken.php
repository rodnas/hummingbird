<?php
$params["responseToken"] = "db9b1ba7-e217-4feb-936e-08bfa5e10615";
$params["hotelCode"] = "h5cc6bdd77a6f9";
$curl_params["test_api_url"] = $params["base_url"]."price/hotel/".$params["hotelCode"]."/deals/".$params["responseToken"];
$resource_array = getCurl($curl_params);
?>
