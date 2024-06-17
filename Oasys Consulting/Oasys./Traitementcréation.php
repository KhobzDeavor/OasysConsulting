<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "oasys";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer et échapper les données POST
$libellé_projet = $conn->real_escape_string($_POST['libellé_projet']);
$nom_client = $conn->real_escape_string($_POST['nom_client']);
$prénom_client = $conn->real_escape_string($_POST['prénom_client']);
$Date_début_projet = $conn->real_escape_string($_POST['Date_début_projet']);
$Date_fin_projet = $conn->real_escape_string($_POST['Date_fin_projet']);
$Domaine_projet = $conn->real_escape_string($_POST['Domaine_projet']);

// Commencer une transaction
$conn->begin_transaction();

try {
    // Insérer dans la table projet
    $sql_projet = "INSERT INTO projet (libellé_projet, Date_début_projet, Date_fin_projet, Domaine_projet)
                   VALUES ('$libellé_projet', '$Date_début_projet', '$Date_fin_projet', '$Domaine_projet')";
    if ($conn->query($sql_projet) !== TRUE) {
        throw new Exception("Erreur lors de l'insertion dans la table projet: " . $conn->error);
    }

    // Insérer dans la table client
    $sql_client = "INSERT INTO client (nom_client, prénom_client)
                   VALUES ('$nom_client', '$prénom_client')";
    if ($conn->query($sql_client) !== TRUE) {
        throw new Exception("Erreur lors de l'insertion dans la table client: " . $conn->error);
    }

    // Si tout va bien, valider la transaction
    $conn->commit();
    echo "Le projet et le client ont été créés avec succès.";
    // Redirection vers Pageprojet.php après 2 secondes
    echo '<script>setTimeout(function() { window.location.href = "Pageprojet.php"; }, 2000);</script>';
} catch (Exception $e) {
    // Si une erreur survient, annuler la transaction
    $conn->rollback();
    echo $e->getMessage();
}

// Fermer la connexion
$conn->close();
?>
