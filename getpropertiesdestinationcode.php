<?php
$params["destinationCode"] = "MV";
$curl_params["test_api_url"] = $params["base_url"]."properties/".$params["destinationCode"];
$resource_array = getCurl($curl_params);
?>
