# PHP-PDO
Crée une page index.php qui liste les "friends" contenus dans la base, sous la forme d'une liste HTML.
Pense à créer un fichier _connec.php que tu n’enverras pas avec ta solution, afin de ne pas dévoiler ton mot de passe.

Sous la liste, crée un formulaire simple disposant des champs obligatoires Firstname et Lastname.
Lorsque tu soumets le formulaire, un nouveau personnage doit être inséré dans la base de données, via une requête préparée.

Poste ta solution.

Bonus :

    Tu peux effectuer des validations afin de t'assurer que les noms et prénoms ne soient pas vides et fassent moins de 45 caractères (les champs de la table étant des VARCHAR(45)).
    Une fois l'enregistrement effectué, effectue une redirection via l'header() approprié, afin d'éviter de soumettre le formulaire à nouveau (et donc de créer un doublon) si tu réactualises la page.

Critères de validation

    Le fichier index.php est bien présent
    La connexion à la base de données est correctement configurée avec PDO (tu peux réutiliser le même fichier _connec.php que tu as créé pour réaliser cette quête).
    La page affiche la liste des friends contenus dans ta propre base de données.
    La page affiche un formulaire d'ajout de friend. Lorsque tu soumets le formulaire, un nouveau friend apparaît dans la liste.
    La requête d’insertion est une requête préparée.
