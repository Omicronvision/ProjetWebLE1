<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=lancer");
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
    <title>Programme 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }

        .container {
            display: flex;
            border: 2px solid #ffa500;
            padding: 20px;
            background-color: #fff;
        }

        .programme-title {
            width: 100%;
            text-align: center;
            background-color: #ffa500;
            color: white;
            padding: 10px 0;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .exercise-list, .current-exercise {
            flex: 1;
            padding: 20px;
        }

        .exercise-list {
            border-right: 2px solid #ffa500;
        }

        .exercise-list h2, .current-exercise h2 {
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .exercise-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 2px solid #ffa500;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
        }

        .exercise-item.highlight {
            background-color: #ffe4b5;
        }

        .exercise-item img {
            width: 50px;
            height: 50px;
        }

        .exercise-details {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .exercise-details div {
            margin-bottom: 5px;
        }

        .current-exercise img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .exercise-info, .pause-timer {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .pause-timer {
            align-items: center;
        }

        .pause-timer button {
            padding: 10px 20px;
            background-color: #ffa500;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .pause-timer button:hover {
            background-color: #ff8c00;
        }
    </style>
</head>
<body>
    <div class="programme-title">Programme 1</div>
    <div class="container">
        <div class="exercise-list">
            <h2>Liste des exercices</h2>
            <div class="exercise-item highlight">
                <img src="https://via.placeholder.com/50" alt="Tirage Vertical">
                <div class="exercise-details">
                    <div>CHARGE: 30kg</div>
                    <div>SÉRIES: x5</div>
                    <div>RÉPÉTITIONS: x10</div>
                    <div>PAUSE: 2:00</div>
                </div>
            </div>
            <div class="exercise-item">
                <img src="https://via.placeholder.com/50" alt="Tractions">
                <div class="exercise-details">
                    <div>CHARGE: 30kg</div>
                    <div>SÉRIES: x4</div>
                    <div>RÉPÉTITIONS: x8</div>
                    <div>PAUSE: 2:00</div>
                </div>
            </div>
            <div class="exercise-item">
                <img src="https://via.placeholder.com/50" alt="Soulevé de Terre">
                <div class="exercise-details">
                    <div>CHARGE: 30kg</div>
                    <div>SÉRIES: x4</div>
                    <div>RÉPÉTITIONS: x6</div>
                    <div>PAUSE: 2:00</div>
                </div>
            </div>
            <div class="exercise-item">
                <img src="https://via.placeholder.com/50" alt="Tractions">
                <div class="exercise-details">
                    <div>CHARGE: 30kg</div>
                    <div>SÉRIES: x4</div>
                    <div>RÉPÉTITIONS: x8</div>
                    <div>PAUSE: 2:00</div>
                </div>
            </div>
            <div class="exercise-item">
                <img src="https://via.placeholder.com/50" alt="Rowing">
                <div class="exercise-details">
                    <div>CHARGE: 30kg</div>
                    <div>SÉRIES: x4</div>
                    <div>RÉPÉTITIONS: x8</div>
                    <div>PAUSE: 2:30</div>
                </div>
            </div>
        </div>
        <div class="current-exercise">
            <h2>Exercice en cours</h2>
            <img src="https://via.placeholder.com/300" alt="Tirage Vertical">
            <div class="exercise-info">
                <div>CHARGE: 30kg</div>
                <div>SÉRIES: x5</div>
                <div>RÉPÉTITIONS: x10</div>
            </div>
            <div class="pause-timer">
                <div>CHRONO PAUSE: 2:00</div>
                <button>⏯</button>
                <button>Exo suivant</button>
            </div>
        </div>
    </div>
</body>
</html>