<?php
$params["destinationCode"] = "MV";
$params["hotelCode"] = "h5cc6bdd77a6f9";
$curl_params["test_api_url"] = $params["base_url"]."properties/".$params["destinationCode"]."/".$params["hotelCode"];
$resource_array = getCurl($curl_params);
?>