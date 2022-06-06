<?php
$curl_params["test_api_url"] = $params["base_url"]."price/search";
$data = array(
	"source" => array(
		"userEmail" => "norbert.kubinyi@mediaorigo.com",
		"requestRef" => "10009876543212345678902",
	),
	"requestCriteria" => array(
		"destination" => array(
			"destinationCode" => "MV",
			"locationCode" => "ANY",
		)
	),
	"hotelCodes" => ["h5cc6bdd77a6f9","h5cdc802f5dbed","h5ce7d7df28a68"],
	"stayPeriod" => array(
		"checkInDate" => "2020-07-04",
		"checkOutDate" => "2020-07-14",
	),
	"nationalityCode" => "GB",
	"roomRequests" => [ array(
		"adults" => "2",
		"children" => "1",
		"childAges" => [3]
	)],
	"mealTypeCode" => "HB",
	"vacationTypeCode" => "HON"
);
$resource_array = postCurl($curl_params, $data);
?>
