<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Projet - Oasys Consulting</title>
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
        <h4>MODIFICATION DE PROJET</h4>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $id_projet = $_POST['id_projet'];
        $libellé_projet = $_POST['libellé_projet'];
        $Date_début_projet = $_POST['Date_début_projet'];
        $Date_fin_projet = $_POST['Date_fin_projet'];
        $Domaine_projet = $_POST['Domaine_projet'];
        $nom_client = $_POST['nom_client'];
        $prénom_client = $_POST['prénom_client'];

        // Mise à jour des informations du projet
        $sql_projet = "UPDATE projet SET libellé_projet = '$libellé_projet',
                                         Date_début_projet = '$Date_début_projet',
                                         Date_fin_projet = '$Date_fin_projet',
                                         Domaine_projet = '$Domaine_projet'
                       WHERE id_projet = '$id_projet'";

        if ($conn->query($sql_projet) === TRUE) {
            echo "Les informations du projet ont été mises à jour avec succès.<br>";
        } else {
            echo "Erreur lors de la mise à jour du projet : " . $conn->error . "<br>";
        }

        // Mise à jour des informations du client associé au projet
        $sql_client = "UPDATE client SET nom_client = '$nom_client',
                                        prénom_client = '$prénom_client'
                       WHERE id_client = (SELECT id_client FROM projet WHERE id_projet = '$id_projet')";

        if ($conn->query($sql_client) === TRUE) {
            echo "Les informations du client ont été mises à jour avec succès.<br>";
        } else {
            echo "Erreur lors de la mise à jour du client : " . $conn->error . "<br>";
        }
    }

    // Affichage du formulaire de modification avec les données actuelles du projet
    if (isset($_GET['id_projet'])) {
        $id_projet = $_GET['id_projet'];

        // Requête pour récupérer les informations du projet
        $sql_projet = "SELECT * FROM projet WHERE id_projet = '$id_projet'";
        $result_projet = $conn->query($sql_projet);

        if ($result_projet->num_rows > 0) {
            $row_projet = $result_projet->fetch_assoc();
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Modifier Projet</h1>
                <input type="hidden" name="id_projet" value="<?php echo $id_projet; ?>">

                <label for="libellé_projet">Libellé du projet</label>
                <input type="text" id="libellé_projet" name="libellé_projet" value="<?php echo $row_projet['libellé_projet']; ?>" required>

                <label for="Date_début_projet">Date de début du projet</label>
                <input type="date" id="Date_début_projet" name="Date_début_projet" value="<?php echo $row_projet['Date_début_projet']; ?>" required>

                <label for="Date_fin_projet">Date de fin du projet</label>
                <input type="date" id="Date_fin_projet" name="Date_fin_projet" value="<?php echo $row_projet['Date_fin_projet']; ?>" required>

                <label for="Domaine_projet">Domaine du projet</label>
                <select id="Domaine_projet" name="Domaine_projet" required>
                    <option value="Formation" <?php if ($row_projet['Domaine_projet'] == 'Formation') echo 'selected'; ?>>Formation</option>
                    <option value="Systèmes & réseaux" <?php if ($row_projet['Domaine_projet'] == 'Systèmes & réseaux') echo 'selected'; ?>>Systèmes & réseaux</option>
                    <option value="Développement" <?php if ($row_projet['Domaine_projet'] == 'Développement') echo 'selected'; ?>>Développement</option>
                    <option value="Infogérance" <?php if ($row_projet['Domaine_projet'] == 'Infogérance') echo 'selected'; ?>>Infogérance</option>
                </select>

                <!-- Requête pour récupérer les informations du client associé -->
                <?php
                $sql_client = "SELECT * FROM client WHERE id_client = (SELECT id_client FROM client WHERE id_client = '$id_projet')";
                $result_client = $conn->query($sql_client);

                if ($result_client->num_rows > 0) {
                    $row_client = $result_client->fetch_assoc();
                    ?>
                    <label for="nom_client">Nom du client</label>
                    <input type="text" id="nom_client" name="nom_client" value="<?php echo $row_client['nom_client']; ?>" required>

                    <label for="prénom_client">Prénom du client</label>
                    <input type="text" id="prénom_client" name="prénom_client" value="<?php echo $row_client['prénom_client']; ?>" required>
                    <?php
                } else {
                    echo "Aucune information sur le client trouvée.";
                }
                ?>

                <input type="submit" value="Enregistrer les modifications">
            </form>
            <?php
        } else {
            echo "Le projet avec l'ID " . $id_projet . " n'a pas été trouvé.";
        }
    } else {
        echo "ID du projet non spécifié.";
    }

    $conn->close();
    ?>

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
