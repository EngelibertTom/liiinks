# Technologies utilisées 

Projet entièrement réalisé en PHP 

## Gestion du login et de l'envoie du mail 

Utilisation de PHPMailer pour gérer l'envoie du mail depuis mon serveur local. Pour réaliser cela, j'utilise mon adresse mail perso en tant que hôte et j'autorise depuis mon compte google l'accès aux applications tierces. Un mot de passe est généré pour pouvoir l'utiliser.

A chaque lien généré, je génère également un token qui vient se stocker directement dans la table user de ma base sur airtable. Chaque utilisateur a donc un token unique.  On vérifie donc à la connexion grâce au lien que ce dernier est toujours valide en comparant le token de la session et celui stocké en base.

