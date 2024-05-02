<?php

// Configuration globale
$base_id = 'appgS1SfppifU0I9Y';
$table_id = 'tblQqc7QGZFJYiJcU';

$url = "https://api.airtable.com/v0/{$base_id}/{$table_id}";
$key = 'patditmqkXOtJ1bJp.c77f1548d007146f6d41d8d2b4d5e00590bc636e3204b6bb12d482c54c86c3f7';
$options = array('http' => array(
    'method'  => 'GET',
    'header' => 'Authorization: Bearer '.$key
));
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);



// Récupération du token
function getStoredToken($base_id, $table_id,$key, $user_id) {

    $url = "https://api.airtable.com/v0/{$base_id}/{$table_id}/{$user_id}";
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\nAuthorization: Bearer {$key}",
            'method' => 'GET',
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response);
    $stored_token = $result->fields->token;

    return $stored_token;

}

function sendLinks($user_id, $instagram, $twitter, $behance, $facebook, $linkedin) {


    

}