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
        <label for="libelle_projet">Libellé du projet</label>
        <input type="text" id="libelle_projet" name="libelle_projet" required>

        <label for="nom_client">Nom du client</label>
        <input type="text" id="nom_client" name="nom_client" required>

        <label for="prenom_client">Prénom du client</label>
        <input type="text" id="prenom_client" name="prenom_client" required>

        <label for="nombre_etapes">Nombre d'étapes</label>
        <input type="number" id="nombre_etapes" name="nombre_etapes" required>

        <label for="date_debut">Date de début du projet</label>
        <input type="date" id="date_debut" name="date_debut" required>

        <label for="date_fin">Date de fin du projet</label>
        <input type="date" id="date_fin" name="date_fin" required>

        <label for="domaine_projet">Domaine du projet</label>
        <select id="domaine_projet" name="domaine_projet">
            <option value="Formation">Formation</option>
            <option value="Systèmes & réseaux">Systèmes & réseaux</option>
            <option value="Développement">Développement</option>
            <option value="Infogérance">Infogérance</option>
        </select>

        <input type="submit" value="Créer le projet">
        <a href="Pageintervenant.php">
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