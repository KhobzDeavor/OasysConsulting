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

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "oasys";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $id_projet = $_GET['id_projet']; // Supposons que l'ID du projet soit passé dans l'URL
    

    $sql = "SELECT * FROM Projet WHERE id_projet = '$id_projet'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Le projet a été trouvé
        $row = $result->fetch_assoc();
        // Maintenant, vous pouvez afficher les caractéristiques du projet
        echo "Libellé du projet : " . $row['libellé_projet'] . "<br>";
        echo "Date de début du projet : " . $row['Date_début_projet'] . "<br>";
        echo "Date de fin du projet : " . $row['Date_fin_projet'] . "<br>";
        echo "Domaine du projet : " . $row['Domaine_projet'] . "<br>";
        // Continuez d'afficher d'autres caractéristiques du projet selon votre structure de données
    } else {
        echo "Le projet n'a pas été trouvé.";
    }
    $conn->close();
    ?>

    <!-- Le formulaire peut être placé ici si vous souhaitez l'afficher -->
    <form action="suiviprojet.php" method="get">
    <label for="id_projet">ID du projet :</label>
    <input type="text" id="id_projet" name="id_projet" placeholder="Entrez l'ID du projet" required>
    <input type="submit" value="Voir le projet">
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

            <div class "service">
                <h3>Aimé ou remboursé</h3>
                <p>Bien qu'il n'y ait aucune chance que vous n'appréciez pas nos services, nous acceptons tout de même de vous rembourser si vous n'êtes pas satisfait !</p>
            </div>
        </div>
        <p id="contact" style="pointer-events: none;">Contact : 06 70 22 72 72 | &copy; 2023, Belaid.</p>
    </footer>
</body>
</html>