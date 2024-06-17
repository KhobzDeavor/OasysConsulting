<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Oasys</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <h1>Oasys Consulting</h1>
        <div class="onglets">
            <a href="Oasys">Home</a>
            <a href="#contact">Contact</a>
        </div>
    </nav>

    <header>
        <h1>Oasys Consulting</h1>
        <h4>LA MEILLEURE SOCIETE D'INFOGERANCE !</h4>
    </header>

    <form action="traitementcréation.php" method="post">
        <h1>Création de Projet</h1>
        <label for="libellé_projet">Libellé du projet</label>
        <input type="text" id="libellé_projet" name="libellé_projet" required>

        <label for="nom_client">Nom du client</label>
        <input type="text" id="nom_client" name="nom_client" required>

        <label for="prénom_client">Prénom du client</label>
        <input type="text" id="prénom_client" name="prénom_client" required>

        <label for="Date_début_projet">Date de début du projet</label>
        <input type="date" id="Date_début_projet" name="Date_début_projet" required>

        <label for="Date_fin_projet">Date de fin du projet</label>
        <input type="date" id="Date_fin_projet" name="Date_fin_projet" required>

        <label for="Domaine_projet">Domaine du projet</label>
        <select id="Domaine_projet" name="Domaine_projet">
            <option value="Formation">Formation</option>
            <option value="Systèmes & réseaux">Systèmes & réseaux</option>
            <option value="Développement">Développement</option>
            <option value="Infogérance">Infogérance</option>
        </select>

        <input type="submit" value="Créer le projet">
        <a href="Pageprojet.php">
    </form>

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