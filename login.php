<?php
$servername = "localhost";
$username = "dorian";
$password = "dorian";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=projetweb2", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
    $sesouvenirdemoi = isset($_POST['sesouvenirdemoi']);

    if ($nom != "" && $mdp != "") {
        // Use prepared statements to prevent SQL injection
        $requete = $bdd->prepare("SELECT UserID FROM User WHERE nom = :nom AND mdp = :mdp");
        $requete->execute(array('nom' => $nom, 'mdp' => $mdp));
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);

        if ($reponse && $reponse['UserID'] != false) {
            // Set the 'connecte' attribute to 1
            $update = $bdd->prepare("UPDATE User SET connecte = 1 WHERE UserID = :userID");
            $update->execute(array('userID' => $reponse['UserID']));

            if ($sesouvenirdemoi) {
                // Set cookies to remember the username and password
                setcookie("nom", $nom, time() + (86400 * 30), "/"); // 30 days
                setcookie("mdp", $mdp, time() + (86400 * 30), "/"); // 30 days
            } else {
                // Clear the cookies if 'Se souvenir de moi' is not checked
                setcookie("nom", "", time() - 3600, "/");
                setcookie("mdp", "", time() - 3600, "/");
            }
            header("Location: accueil.php");
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Identifiant ou mot de passe incorrect');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Veuillez remplir tous les champs');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ff6600;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 150px;
        }

        .conteneur {
            background-color: white;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            width: 100%;
            margin-top: 150px;
        }

        h1 {
            margin-bottom: 1em;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            margin-bottom: 0.5em;
            color: #333;
        }

        input[type="text"],
        input[type="mdp"] {
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }

        .sesouvenirdemoi {
            display: flex;
            align-items: center;
            margin-bottom: 1em;
        }

        .sesouvenirdemoi input {
            margin-right: 0.5em;
        }

        .sesouvenirdemoi label {
            color: #333;
        }

        button {
            padding: 0.5em;
            background-color: #ff6600;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #e65c00;
        }

        .signup {
            margin-top: 1em;
            color: #333;
        }

        .signup a {
            color: #ff6600;
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="conteneur">
        <h1>SE CONNECTER</h1>
        <form action="" method="POST">
            <label for="nom">Identifiant</label>
            <input type="text" id="nom" name="nom" placeholder="Ecrivez votre identifiant">
            
            <label for="mdp">Mot de passe</label>
            <input type="mdp" id="mdp" name="mdp" placeholder="Ecrivez votre mot de passe">
            
            <div class="sesouvenirdemoi">
                <input type="checkbox" id="sesouvenirdemoi" name="sesouvenirdemoi">
                <label for="sesouvenirdemoi">Se souvenir de moi</label>
            </div>
            
            <button type="submit">Se connecter</button>
            
            <p class="signup">Vous n'avez pas de compte? <a onclick="location.href='inscription.php'">Créez-en un</a></p>
        </form>
    </div>
</body>
</html>