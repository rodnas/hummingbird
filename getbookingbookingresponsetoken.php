<?php
$params["bookingResponseToken"] = "739a34c7-672a-427b-87d7-c7f444a560b8";
$curl_params["test_api_url"] = $params["base_url"]."booking/".$params["bookingResponseToken"];
$resource_array = getCurl($curl_params);
?>