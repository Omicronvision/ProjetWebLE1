<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Planning</title>
	<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #ff6600; /* Orange exact de l'image */
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: white;
            position: fixed;
            top: 0;
            width: 100%;
            box-sizing: border-box;
			border : 1px solid;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .login {
            margin-left: auto;
        }
        .login a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
        .login a:hover {
            text-decoration: underline;
        }
        .content {
            margin-top: 60px; 
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src=ressources/F2itPlanningLogo.png alt="Logo">
            FIT PLANNING
        </div>
        <div class="login">
            <a onclick="location.href='index.php?view=login'">SE CONNECTER</a>
        </div>
    </div>
</body>
</html>
