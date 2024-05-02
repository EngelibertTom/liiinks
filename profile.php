<?php
require_once('config/airtable.php');

session_start();

$user_id = $_SESSION['user_id'];
$stored_token = getStoredToken($base_id, $table_id, $key, $user_id);

$links = getLinks($base_id, $table_id, $user_id, $key);

if($stored_token === $_SESSION['user_token'])  { ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Votre profil</title>
        <script src="/assets/js/frontend.js"></script>
    </head>
    <body>

    <h1> Votre profil </h1>


    <h2>Personnalisation de votre page</h2>

    <a href="edit-page.php"> Éditer votre page</a>







    <h2> Vos liens</h2>

    <a href="edit-links.php">Éditer vos liens</a>

    <div>
        <h3>Instagram : </h3>
        <a><?php echo $links[0] ?></a>
    </div>
    <div>
        <h3>Twitter : </h3>
        <a><?php echo $links[1] ?></a>
    </div>
    <div>
        <h3>Behance : </h3>
        <a><?php echo $links[2] ?></a>
    </div>
    <div>
        <h3>Linkedin: </h3>
        <a><?php echo $links[3] ?></a>
    </div>
    <div>
        <h3>Facebook: </h3>
        <a><?php echo $links[4] ?></a>
    </div>



    </body>
    </html>


<?php } else {
    header('Location: /login');
}
