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

    <div class="container">
    <h2>Connexion</h2>
    <div class="button-container">
        <label for="role">Se Connecter en tant que :</label>
        <select id="role" name="role">
            <option value="intervenant">Intervenant</option>
            <option value="chef_de_projet">Chef de Projet</option>
            <option value="dirigeant">Dirigeant</option>
        </select>
    </div>
    
    <form action="login.php" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <input type="submit" value="Se connecter">
    </form>

<script>
    document.querySelector('#role').addEventListener('change', function() {
        var selectedRole = this.value;
        var loginForm = document.querySelector('form');

        // Définir les liens en fonction du rôle sélectionné
        switch (selectedRole) {
            case 'intervenant':
                loginForm.action = 'Pageintervenant.php';
                break;
            case 'chef_de_projet':
                loginForm.action = 'Pagechef.php';
                break;
            case 'dirigeant':
                loginForm.action = 'Pageprojet.php';
                break;
            default:
                loginForm.action = 'login.php'; // Action par défaut
        }
    });
</script>

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