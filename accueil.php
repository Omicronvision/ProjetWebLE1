<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'projetweb2';
$username = 'dorian';
$password = 'dorian';

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Requête pour récupérer les noms des programmes
$sql = 'SELECT NomProgramme FROM Programme';
$requete = $bdd->prepare($sql);
$requete->execute();
$programmes = $requete->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer les noms des exercices, leurs charges, séries et répétitions
$sql_exercices = 'SELECT NomExercice, Charge, Series, Repetitions FROM Exercice';
$requete_exercices = $bdd->prepare($sql_exercices);
$requete_exercices->execute();
$exercices = $requete_exercices->fetchAll(PDO::FETCH_ASSOC);

// Limiter le nombre d'exercices affichés à 6
$exercices_affiches = array_slice($exercices, 0, 6);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ff6600;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding-top: 60px; /* Ajoutez ce padding */
        }

        header {
            background-color: #ff6600;
            padding: 10px;
            text-align: center;
            color: white;
        }

        main {
            display: flex;
            padding: 20px;
            gap: 20px;
            flex: 1;
        }

        section {
            flex: 1;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .programmes {
            flex: 2;
        }

        .programmes h2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ff6600;
        }

        .programme {
            border: 2px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
        }

        .programme h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffcc00;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            margin: -10px -10px 10px -10px;
        }

        .programme ul {
            padding-left: 20px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #ff6600;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            margin: 5px 0;
        }

        button:hover {
            background-color: #e65c00;
        }

        .bouton_creation_programme {
            background-color: #ffcc00;
            color: #333;
        }

        .bouton_creation_programme:hover {
            background-color: #e6b800;
        }

        .statistiques h2 {
            color: #ff6600;
        }

        .statsul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .stats li {
            margin-bottom: 5px;
        }

        .diagram {
            text-align: center;
            margin-bottom: 20px;
        }

        j'ai une base de données.diagram img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>ACCUEIL</h1>
        </header>
        <main>
            <section class="programmes">
                <h2>PROGRAMMES <button class="bouton_creation_programme">Créer un programme</button></h2>
                <?php foreach ($programmes as $programme): ?>
                    <div class="programme" id="programme1">
                        <h3><?php echo htmlspecialchars($programme['NomProgramme']); ?> <span>Lundi</span></h3>
                        <ul>
                            <?php foreach ($exercices_affiches as $exercice): ?>
                                <li><?php echo htmlspecialchars($exercice['NomExercice']); ?> - charge (kg) <?php echo htmlspecialchars($exercice['Charge']); ?> - <?php echo htmlspecialchars($exercice['Series']); ?> séries - <?php echo htmlspecialchars($exercice['Repetitions']); ?> répétitions</li>
                            <?php endforeach; ?>
                        </ul>
                        <button class="modify" onclick="location.href='index.php?view=modifier'">Modifier</button>
                        <button class="lauch" onclick="location.href='index.php?view=lancer'">Lancer</button>
                    </div>
                <?php endforeach; ?>
            </section>
            <section class="statistiques">
                <h2>STATISTIQUES</h2>
                <div class="diagram">
                    <img src="ressources/diagrammemuscle.png" alt="Diagramme des muscles">
                </div>
                <div class="stats">
                    <p><strong>Muscles à travailler :</strong></p>
                    <ul>
                        <li><span style="color: red;">Abdominaux</span></li>
                        <li>Quadriceps</li>
                        <li>Ishios-jambiers</li>
                        <li>Fessiers</li>
                        <li>Mollets</li>
                        <li>Adducteurs</li>
                    </ul>
                    <p><strong>Données :</strong></p>
                    <ul>
                        <li>Dernières séances :</li>
                        <li>Programme 1 (08/05/2024)</li>
                        <li>Programme 2 (06/05/2024)</li>
                        <li>Programme 2 (05/05/2024)</li>
                    </ul>
                    <p><strong>Temps d'entraînement :</strong></p>
                    <ul>
                        <li>Total : 02:15:30</li>
                        <li>Temps moyen de séance : 2:17</li>
                    </ul>
                    <p><strong>Programmes recommandés :</strong></p>
                    <ul>
                        <li>Programme 1</li>
                        <li>Programme 8</li>
                        <li>Programme 3</li>
                    </ul>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
