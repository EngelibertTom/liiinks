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

function sendLinks($user_id,$key, $base_id, $table_id, $instagram, $twitter,  $behance, $facebook, $linkedin) {

    $data_to_send = array(
        'fields' => array(
            'Twitter' => $twitter,
            'Instagram' => $instagram,
            'Behance' => $behance,
            'Facebook' => $facebook,
            'Linkedin' => $linkedin
        )
    );

    $url = "https://api.airtable.com/v0/{$base_id}/{$table_id}/{$user_id}";
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\nAuthorization: Bearer {$key}",
            'method' => 'PATCH',
            'content' => json_encode($data_to_send)
        )
    );
    $context = stream_context_create($options);

    $result = file_get_contents($url, false, $context);

    return $result;
}

function getLinks($base_id, $table_id, $user_id, $key) {

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

    $instagram = $result->fields->Instagram;
    $twitter = $result->fields->Twitter;
    $behance = $result->fields->Behance;
    $linkedin = $result->fields->Linkedin;
    $facebook =$result->fields->Facebook;

    $links = [$instagram, $twitter, $behance, $linkedin, $facebook];

    return $links;

}

function sendCustoms($main_color, $background_gradient, $font_group, $biography, $base_id, $table_id, $user_id, $key) {

    $data_to_send = array(
        'fields' => array(
            'bio' => $biography,
            'maincolor' => $main_color,
            'gradiant' => $background_gradient,
            'font' => $font_group,
        )
    );

    $url = "https://api.airtable.com/v0/{$base_id}/{$table_id}/{$user_id}";
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\nAuthorization: Bearer {$key}",
            'method' => 'PATCH',
            'content' => json_encode($data_to_send)
        )
    );
    $context = stream_context_create($options);

    $result = file_get_contents($url, false, $context);

    return $result;

}