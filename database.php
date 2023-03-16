<?php


// Methode 1 pour la connexion avec la base de donnée
// $hostName = "localhost";
// $dbUser = "root";
// $dbPassword = "";
// $dbName = "cerat";
// $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);



// Methode 2 pour la connexion avec la base de donnée

$conn = mysqli_connect('localhost', 'root', '', 'cerat');

// message si la connection échoue
if (!$conn) {
    die("Echec de connexion avec la base de donnée");
}

?>