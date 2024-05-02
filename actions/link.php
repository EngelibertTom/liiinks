<?php

require_once('../config/airtable.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    $twitter = $_POST["twitter"];
    $facebook = $_POST["facebook"];
    $linkedin = $_POST["linkedin"];
    $behance = $_POST["behance"];
    $instagram = $_POST["instagram"];
    $user_id = $_SESSION['user_id'];

    sendLinks($user_id, $key, $base_id, $table_id, $instagram, $twitter,  $behance, $facebook, $linkedin);

    header('Location:/profile');
} else {
    echo "Le formulaire n'a pas été soumis.";
}

?>
