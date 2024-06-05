<?php
$servername = "localhost";
$username = "dorian";
$password = "dorian";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=projetweb2", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
