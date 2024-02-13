<?php
//methode pour ce connecter a une bdd
require_once './connec.php';

$pdo = new \PDO(DSN, USER, PASS);
?>
<?php
// pour recuper la liste d'amis

$query = "SELECT * FROM friend";

$statement = $pdo->query($query);

$friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php
// ajout d'amis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';

    
    if (empty($firstname) || empty($lastname) || strlen($firstname) > 45 || strlen($lastname) > 45) {
        echo "Les champs doivent être remplis et ne pas dépasser 45 caractères.";
    } else {
        $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        $statement->execute();

        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container bg-light border rounded p-5">
        <h4>Liste des amis :</h4>
        <p>
            <?php 
                foreach($friendsObject as $friend) {
                echo $friend->firstname . ' ' . $friend->lastname . ' - ';
                }
            ?>
        </p>
    </div>
    <form action="index.php" method="post" class="container bg-light border rounded p-5" style="margin-top: 50px; width: 30vw;">
        <p class="row">
            <label for="lastname" class="form-label">Nom : </label>
            <input type="text" name="lastname" id="entry" class="form-control">
        </p>
        <p class="row">
            <label for="firstname" class="form-label">Prenom : </label>
            <input type="text" name="firstname" id="entry" class="form-control">
            <p class="text-center">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </p>
    </form>
    
</body>
</html>
