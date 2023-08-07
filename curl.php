<?php

// API endpoint URL
$apiUrl = 'https://jsonplaceholder.typicode.com/users';

// Initialize cURL session
$curl = curl_init($apiUrl);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response instead of outputting it

// Execute cURL request and get the response
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

// Close cURL session
curl_close($curl);

// Process the response
if ($response) {
    $responseData = json_decode($response, false);
    foreach ($responseData as $item) {
        echo '<div class="card">';
        echo '<h1>' . $item->name . '</h1>';
        echo '<p>Email: ' . $item->email . '</p>';
        echo '<p>Address: ' . $item->address->street . ', ' . $item->address->city . '</p>';
        echo '<p>Phone: ' . $item->phone . '</p>';
        echo '<p>Website: ' . $item->website . '</p>';
        echo '</div>';
    }
} else {
    echo 'No response received.';
}
?>