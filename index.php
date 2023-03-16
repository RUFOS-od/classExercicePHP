<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Gestion Elèves</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to our Dashboard</h1>
        <a href="logout.php" class="btn btn-danger ">logout</a><br><br>


        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>

        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Matricule</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            //inclure la page de connexion
            include_once "database.php";
            //requête pour afficher la liste des employés
            $req = mysqli_query($conn, "SELECT * FROM eleves");
            if (mysqli_num_rows($req) == 0) {
                //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                echo "Il n'y a pas encore d'employé ajouter !";
            } else {
                //si non , affichons la liste de tous les employés
                while ($row = mysqli_fetch_assoc($req)) {
            ?>
            <tr>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['matricule'] ?></td>
                <td><?= $row['age'] ?></td>
                <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                <td><a href="modifier.php?id=<?= $row['id'] ?>"><img src="images/pen.png"></a></td>
                <td><a href="supprimer.php?id=<?= $row['id'] ?>"><img src="images/trash.png"></a></td>
            </tr>
            <?php
                }
            }
            ?>


        </table>

    </div>
</body>

</html>

<?php

?>