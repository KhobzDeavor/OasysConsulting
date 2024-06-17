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
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom_intervenant'];
    $prénom = $_POST['prénom_intervenant'];
    $email = $_POST['email_intervenant'];
    $mdp = $_POST['mdp_intervenant'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "oasys";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier si l'email existe déjà
    $stmt = $conn->prepare("SELECT email_intervenant FROM intervenant WHERE email_intervenant = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['message'] = "Cet email est déjà utilisé pour un autre compte.";
        $stmt->close();
        $conn->close();
        header("Location: Créationcompte.php");
        exit();
    }

    // Hacher le mot de passe
    $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

    // Insérer le nouvel intervenant dans la base de données
    $stmt = $conn->prepare("INSERT INTO intervenant (nom_intervenant, prénom_intervenant, email_intervenant, mdp_intervenant) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $prénom, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Le compte a été créé avec succès. Vous pouvez maintenant vous connecter.";
        $stmt->close();
        $conn->close();
        header("Location: Login.php");
        exit();
    } else {
        $_SESSION['message'] = "Erreur lors de la création du compte.";
        $stmt->close();
        $conn->close();
        header("Location: Créationcompte.php");
        exit();
    }
}
?>
<body>
    <h2>Création de compte</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p style="color: red;">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nom_intervenant">Nom:</label>
        <input type="text" id="nom_intervenant" name="nom_intervenant" required>
        <br>
        <label for="prénom_intervenant">Prénom:</label>
        <input type="text" id="prénom_intervenant" name="prénom_intervenant" required>
        <br>
        <label for="email_intervenant">Email:</label>
        <input type="email" id="email_intervenant" name="email_intervenant" required>
        <br>
        <label for="mdp_intervenant">Mot de passe:</label>
        <input type="password" id="mdp_intervenant" name="mdp_intervenant" required>
        <br>
        <input type="submit" value="Créer un compte">
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