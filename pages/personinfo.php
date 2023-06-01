<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = connect_db();
    $query = "SELECT * FROM appujkzt WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<h1>Détails de l'étudiant</h1>";
        echo "<p>Nom: " . $row['nom'] . "</p>";
        echo "<p>Prénom: " . $row['prenom'] . "</p>";
        echo "<p>Adresse-Email: " . $row['email'] . "</p>";
        echo "<p>Date de naissance: " . $row['date_naissance'] . "</p>";
        echo "<p>Date d'inscription: " . $row['dateinscription'] . "</p>";
        echo "<p>Date d'admission: " . $row['dateadmission'] . "</p>";
        echo "<p>Personne à prévenir: " . $row['personneprevenir'] . "</p>";
    } else {
        echo "Aucun étudiant trouvé avec cet ID.";
    }

    $stmt = null;
    $conn = null;
} else {
    echo "ID d'étudiant non spécifié.";
}
?>
