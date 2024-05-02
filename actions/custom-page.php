<?php

require_once('../config/airtable.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    $main_color = $_POST['main_color'];
    $background_gradient = $_POST['background_gradient'];
    $font_group = $_POST['font_group'];
    $biography = $_POST['biography'];
    $user_id = $_SESSION['user_id'];

    sendCustoms($main_color, $background_gradient, $font_group, $biography, $base_id, $table_id, $user_id, $key);

    header('Location:/profile');
}