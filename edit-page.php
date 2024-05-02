<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnalisation de la page</title>
</head>
<body>
<div>
    <h2>Personnalisation de la page</h2>
    <form action="actions/custom-page.php" method="post" enctype="multipart/form-data">
        <label for="main_color">Couleur principale :</label>
        <input type="color" id="main_color" name="main_color" required><br>

        <label for="background_gradient">Gradient de fond :</label>
        <input type="text" id="background_gradient" name="background_gradient" placeholder="Entrez le gradient de fond"><br>

        <label for="font_group">Groupe de polices :</label>
        <select id="font_group" name="font_group">
            <option value="Arial, sans-serif">Arial</option>
            <option value="Verdana, Geneva, sans-serif">Verdana</option>
            <option value="Georgia, serif">Georgia</option>
        </select><br>

        <label for="biography">Biographie :</label>
        <textarea id="biography" name="biography" rows="4" placeholder="Entrez votre biographie"></textarea><br>

        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>
