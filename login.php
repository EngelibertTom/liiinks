<?php

require_once('config/airtable.php');

if (isset($_GET['token'])) {

    $token = $_GET['token'];
    $user_id = $_GET['user_id'];

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
    $username = $result->fields->username;

    if($stored_token === $token) {
        session_start();
        $_SESSION['user_token'] = $stored_token;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        header("Location: /profil.php?username={$username}");

    } else {
        echo "Le token n'est pas valide";
    }

} else {

    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Passwordless Authentication</title>
        <script src=\"/assets/js/frontend.js\"></script>
    </head>
    <body>
    <h1>This is where you'll put your email to get a magic link.</h1>
    <form action=\"/actions/login.php\" method=\"post\"> <!-- Utilisez la méthode POST -->
        <div>
            <label for=\"email_address\">Enter your email address</label>
            <input type=\"email\" id=\"email_address\" name=\"email\" /> <!-- Ajoutez un attribut name -->
        </div>
        <button type=\"submit\" id=\"submit_email\">Get magic link</button>
    </form>
    </body>
    </html>";
}

?>

