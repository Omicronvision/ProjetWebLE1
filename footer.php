<?php
// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
    header("Location:../index.php");
    die("");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            position: relative;
        }

        footer {
            width: 100%;
            background-color: #000;
            color: #fff;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-sizing: border-box;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
            display: flex;
            align-items: center;
        }

        .right img {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Votre contenu de page ici -->
    </div>
    <footer id="footer">
        <div class="footer-content">
            <div class="left">
                &copy; 2024 - Tous droits réservés.
            </div>
            <div class="right">
                Dorian PAZDZEJ - Dawin BANAS
                <img src="logo.png" alt="FIT Logo">
            </div>
        </div>
    </footer>
    <script>
        function adjustFooter() {
            var footer = document.getElementById('footer');
            var windowHeight = window.innerHeight;
            var bodyHeight = document.body.scrollHeight;
            if (windowHeight > bodyHeight) {
                footer.style.position = 'fixed';
                footer.style.bottom = '0';
            } else {
                footer.style.position = 'absolute';
            }
        }

        window.addEventListener('resize', adjustFooter);
        adjustFooter();
    </script>
</body>
</html>
