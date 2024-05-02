<?php
require_once('config/airtable.php');

session_start();

$user_id = $_SESSION['user_id'];
$stored_token = getStoredToken($base_id, $table_id, $key, $user_id);

if($stored_token === $_SESSION['user_token'])  { ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Votre profil</title>
        <script src="/assets/js/frontend.js"></script>
    </head>
    <body>

    <h1> Votre profil </h1>
    <!--    Gestion des liens -->
    <h2> Gestion de vos liens</h2>

    <form action="actions/link.php" method="post">
        <label for="twitter">Twitter:</label>
        <input type="text" id="twitter" name="twitter" placeholder="Entrez votre lien Twitter" required><br><br>

        <label for="facebook">Facebook:</label>
        <input type="text" id="facebook" name="facebook" placeholder="Entrez votre lien Facebook" required><br><br>

        <label for="linkedin">LinkedIn:</label>
        <input type="text" id="linkedin" name="linkedin" placeholder="Entrez votre lien LinkedIn" required><br><br>

        <label for="behance">Behance:</label>
        <input type="text" id="behance" name="behance" placeholder="Entrez votre lien Behance" required><br><br>

        <label for="instagram">Instagram:</label>
        <input type="text" id="instagram" name="instagram" placeholder="Entrez votre lien Instagram" required><br><br>

        <button type="submit">Enregistrer</button>
    </form>

    </body>
    </html>


<?php } else {
    header('Location: /login');
}
