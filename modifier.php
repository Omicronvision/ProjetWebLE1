<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=modifier");
	die("");
}

// Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Programme</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ff6600;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 1000px;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            width: 1000px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        header {
            background-color: #ff6600;
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        main {
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .programme-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .programme-title input {
            font-size: 1.2em;
            padding: 10px;
            width: 70%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .programme-title button {
            padding: 10px;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 120px;
        }

        .save-btn {
            background-color: #ffcc00;
            color: #333;
        }

        .delete-btn {
            background-color: #ff3300;
        }

        .save-btn:hover {
            background-color: #e6b800;
        }

        .delete-btn:hover {
            background-color: #e60000;
        }

        .exercise-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .exercise-form select, .exercise-form input {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .exercise-form button {
            padding: 10px;
            background-color: #ffcc00;
            border: none;
            color: #333;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }

        .exercise-form button:hover {
            background-color: #e6b800;
        }

        .exercise-list {
            border-top: 2px solid #ff6600;
            padding-top: 20px;
        }

        .exercise-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .exercise-item img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .exercise-details {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .exercise-details div {
            text-align: center;
        }

        .exercise-actions {
            display: flex;
            align-items: center;
        }

        .exercise-actions button {
            padding: 5px;
            background-color: #ff6600;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            margin-left: 5px;
        }

        .exercise-actions button:hover {
            background-color: #e65c00;
        }

        .exercise-actions .delete {
            background-color: #ff3300;
        }

        .exercise-actions .delete:hover {
            background-color: #e60000;
        }

        .exercise-actions .move-up, .exercise-actions .move-down {
            background-color: #009900;
        }

        .exercise-actions .move-up:hover, .exercise-actions .move-down:hover {
            background-color: #007700;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>CREER OU MODIFIER UN PROGRAMME</h1>
        </header>
        <main>
            <div class="programme-title">
                <input type="text" placeholder="Nouveau programme">
                <button class="save-btn">Enregistrer</button>
                <button class="delete-btn">Supprimer</button>
            </div>
            <div class="exercise-form">
                <select>
                    <option value="">Choisir machine/exercice</option>
                    <option value="1">Tirage Vertical</option>
                    <option value="2">Tractions</option>
                </select>
                <input type="number" placeholder="Poids">
                <input type="number" placeholder="Séries">
                <input type="number" placeholder="Répétitions">
                <input type="text" placeholder="Pause">
                <button>Ajouter</button>
            </div>
            <div class="exercise-list">
                <div class="exercise-item">
                    <img src="tirage_vertical.png" alt="Tirage Vertical">
                    <div class="exercise-details">
                        <div>CHARGE<br>30kg</div>
                        <div>SERIES<br>x5</div>
                        <div>REPETITIONS<br>x10</div>
                        <div>PAUSE<br>2:00</div>
                    </div>
                    <div class="exercise-actions">
                        <button class="move-up">↑</button>
                        <button class="move-down">↓</button>
                        <button class="delete">✗</button>
                    </div>
                </div>
                <div class="exercise-item">
                    <img src="tractions.png" alt="Tractions">
                    <div class="exercise-details">
                        <div>CHARGE<br>---</div>
                        <div>SERIES<br>x4</div>
                        <div>REPETITIONS<br>x8</div>
                        <div>PAUSE<br>2:00</div>
                    </div>
                    <div class="exercise-actions">
                        <button class="move-up">↑</button>
                        <button class="move-down">↓</button>
                        <button class="delete">✗</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
