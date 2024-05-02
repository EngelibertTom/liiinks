<?php

require('../vendor/autoload.php');
require('../config/airtable.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$token = bin2hex(random_bytes(16));

$email = $_POST['email'];

$url = "https://api.airtable.com/v0/{$base_id}/{$table_id}";

$key = 'patditmqkXOtJ1bJp.c77f1548d007146f6d41d8d2b4d5e00590bc636e3204b6bb12d482c54c86c3f7';
$options = array('http' => array(
    'method'  => 'GET',
    'header' => 'Authorization: Bearer '.$key
));
$context  = stream_context_create($options);
$response = file_get_contents($url . "?filterByFormula=({email}='" . urlencode($email) . "')", false, $context);

$data = json_decode($response, true);



if (!empty($data['records'])) {

    $record_to_update = $data['records'][0]['id'];
    $data_to_send = array(
        'fields' => array(
            'token' => $token,
        )
    );

    $url = "https://api.airtable.com/v0/{$base_id}/{$table_id}/{$record_to_update}";
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\nAuthorization: Bearer {$key}",
            'method' => 'PATCH',
            'content' => json_encode($data_to_send)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);


    $username = $data['records'][0]['fields']['username'];
    $magic_link = "http://liiinks/login.php?token=$token&user_id=$record_to_update";


    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tom.engelibert@gmail.com';
        $mail->Password = 'bctd nzqh nnbs tqly';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Configuration de l'expéditeur et du destinataire
        $mail->setFrom('tom.engelibert@gmail.com', 'Votre Nom');
        $mail->addAddress($_POST['email']);

        // Contenu de l'e-mail
        $mail->isHTML(false);
        $mail->Subject = 'Connexion a votre compte';
        $mail->Body = "Bonjour,\n\nCliquez sur le lien suivant pour vous connecter a votre compte : $magic_link";

        // Envoi de l'e-mail
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->send();
        echo "Un lien magique a été envoyé à votre adresse e-mail. Veuillez vérifier votre boîte de réception.";
    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'envoi du lien magique : {$mail->ErrorInfo}";
    }
} else {
    echo "Pas d'utilisateur associé à cet email, veuillez vous inscrire.";
}

?>
