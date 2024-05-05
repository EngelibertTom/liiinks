<?php
require_once('config/airtable.php');

session_start();

$user_id = $_SESSION['user_id'];
$stored_token = getStoredToken($base_id, $table_id, $key, $user_id);

$links = getLinks($base_id, $table_id, $user_id, $key);
$customs = getCustoms($base_id, $table_id, $user_id, $key);

if($stored_token === $_SESSION['user_token'])  { ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Votre profil</title>
        <script src="/assets/js/frontend.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body style="color:<?php echo isset($customs[1]) ?  $customs[1] : "black" ?>; background-image: <?php echo isset($customs[2]) ? $customs[2] : "none"; ?>; font-family:<?php echo isset($customs[3]) ? $customs[3] : 'Roboto'; ?>;";>

    <h1 class="mb-2 mt-3">Votre profil</h1>

    <h2>Personnalisation de votre page</h2>


    <div class="row">
        <div class="col-6">
            <h3>Biographie : </h3>
            <a><?php echo isset($customs[0]) ? $customs[0] : 'Pas de biographie'; ?></a>
        </div>
        <div class="col-6">
            <h3>Couleur principale : </h3>
            <a><?php echo isset($customs[1]) ? $customs[1] : 'Non spécifiée'; ?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Gradiant : </h3>
            <a><?php echo isset($customs[2]) ? $customs[2] : 'Non spécifié'; ?></a>
        </div>
        <div class="col-6">
            <h3>Choix de font : </h3>
            <a><?php echo isset($customs[3]) ? $customs[3] : 'Non spécifié'; ?></a>
        </div>
    </div>

    <a href="edit-page.php"> <button type="button" class="btn btn-secondary">Éditer votre page</button></a>

    <h2 class="mb-2 mt-3">Vos liens</h2>


    <div class="row">
        <div class="col-6">
            <h3>Instagram : </h3>
            <a><?php echo isset($links[0]) ? $links[0] : 'Non spécifié'; ?></a>
        </div>
        <div class="col-6">
            <h3>Twitter : </h3>
            <a><?php echo isset($links[1]) ? $links[1] : 'Non spécifié'; ?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Behance : </h3>
            <a><?php echo isset($links[2]) ? $links[2] : 'Non spécifié'; ?></a>
        </div>
        <div class="col-6">
            <h3>Linkedin : </h3>
            <a><?php echo isset($links[3]) ? $links[3] : 'Non spécifié'; ?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3>Facebook : </h3>
            <a><?php echo isset($links[4]) ? $links[4] : 'Non spécifié'; ?></a>
        </div>
    </div>
    <a href="edit-links.php"> <button type="button" class="btn btn-secondary">Éditer vos liens</button></a>


    <a href="/logout.php"> <button type="button" class="btn btn-secondary">Déconnexion</button></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
    </html>
<style>
    h3 {
        font-weight: normal;
    }
</style>

<?php } else {
    header('Location: /login');
}
