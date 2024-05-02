<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $twitter = $_POST["twitter"];
    $facebook = $_POST["facebook"];
    $linkedin = $_POST["linkedin"];
    $behance = $_POST["behance"];
    $instagram = $_POST["instagram"];

    $user_id = $_SESSION['user_id'];




} else {

    echo "Le formulaire n'a pas été soumis.";
}

?>
