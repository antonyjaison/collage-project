<?php
function fetchDataFromAPI($apiUrl)
{
    $curl = curl_init($apiUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        echo 'Curl error: ' . curl_error($curl);
        return null;
    }

    curl_close($curl);

    if ($response) {
        return json_decode($response);
    } else {
        return null;
    }
}
?>