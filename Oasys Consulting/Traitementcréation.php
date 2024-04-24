<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "oasys";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

$libelle_projet = $_POST['libelle_projet'];
$nom_client = $_POST['nom_client'];
$prenom_client = $_POST['prenom_client'];
$nombre_etapes = $_POST['nombre_etapes'];
$date_debut_projet = $_POST['date_debut'];
$date_fin_projet = $_POST['date_fin'];
$domaine_projet = $_POST['domaine_projet'];
// Assurez-vous de valider et nettoyer les données avant de les insérer dans la base de données pour des raisons de sécurité.

$sql = "INSERT INTO Projet (libellé_projet, Date_début_projet, Date_fin_projet, Domaine_projet)
        VALUES ('$libelle_projet', '$date_debut_projet', '$date_fin_projet', '$domaine_projet')";

if ($conn->query($sql) === TRUE) {
    // Le projet a été créé avec succès.
    echo "Le projet a été créé avec succès.";
    // Redirection vers Pageintervenant.php après 2 secondes
    echo '<script>setTimeout(function() { window.location.href = "Pageintervenant.php"; }, 2000);</script>';
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>