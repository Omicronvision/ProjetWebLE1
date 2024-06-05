
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1em;
        }

        .remember-me input {
            margin-right: 0.5em;
        }

        .remember-me label {
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
        <h1>S'INSCRIRE</h1>
        <form method="POST" action="traitementInscription.php">
            <label for="nom">Identifiant</label>
            <input type="text" id="nom" name="nom" placeholder="Ecrivez votre identifiant">
            
            <label for="mdp">Mot de passe</label>
            <input type="mdp" id="mdp" name="mdp" placeholder="Ecrivez votre mot de passe">
            
            <div class="remember-me">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Se souvenir de moi</label>
            </div>
            
            <button type="submit" name="ok">S'inscrire</button>
            
            <p class="signup">Vous avez deja un compte ? <a onclick="location.href='login.php'">Connectez-vous</a></p>
        </form>
    </div>
</body>
</html>