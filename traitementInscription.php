<?php
$servername = "localhost";
$username = "dorian";
$mdp = "dorian";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=projetweb2", $username, $mdp);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if(isset($_POST['ok'])){
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
    $requete = $bdd->prepare("INSERT INTO User VALUES (0, :nom, :mdp, 0)");
    $requete->execute(
        array(
            "nom" => $nom,
            "mdp" => $mdp
        )
        );
        header("Location: login.php");

}

?>
