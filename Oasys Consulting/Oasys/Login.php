<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Oasys</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h1>Oasys Consulting</h1>
        <div class="onglets">
            <a href="Oasys.php">Home</a>
            <a href="#contact">Contact</a>
        </div>
    </nav>

    <header>
        <h1>Oasys Consulting</h1>
        <h4>LA MEILLEURE SOCIETE D'INFOGERANCE !</h4>
    </header>

    <body>
    <h2>Connexion</h2>
    <form action="connexion.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <a href="Pageprojet.php"><input type="button" value="Se connecter"></a>
    </form>
</body>

    <footer>
        <h1>Nos services</h1>
        <div class="services">
            <div class="service">
                <h3>Avancer main dans la main</h3>
                <p>Nos salariés vous tiennent au courant de l'avancé de votre projet en temps réel !</p>
            </div>

            <div class="service">
                <h3>Paiement en ligne</h3>
                <p>Visa, PaySafeCard, AmazonPay, Paypal, Klarna,... Nous acceptons tous types de paiements en ligne de façon sécurisée !</p>
            </div>

            <div class="service">
                <h3>Aimé ou remboursé</h3>
                <p>Bien qu'il n'y ait aucune chance que vous n'appréciez pas nos services, nous acceptons tout de même de vous rembourser si vous n'êtes pas satisfait !</p>
            </div>
        </div>
        <p id="contact" style="pointer-events: none;">Contact : 06 70 22 72 72 | &copy; 2023, Belaid.</p>
    </footer>
</body>
</html>
