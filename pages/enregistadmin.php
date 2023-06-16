<?php
// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs email et motpass
    $email = $_POST['email'];
    $motpass = $_POST['motpass'];

    // Valider les données et effectuer l'enregistrement de l'administrateur dans la base de données
    if (!empty($email) && !empty($motpass)) {
        // Effectuer la connexion à la base de données (utilisez vos propres informations de connexion)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "appujkz";

        // Créer une connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier si la connexion a échoué
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Échapper les valeurs pour éviter les attaques par injection SQL
        $email = $conn->real_escape_string($email);
        $motpass = $conn->real_escape_string($motpass);

        // Créer la requête SQL pour insérer l'administrateur dans la table user1
        $sql = "INSERT INTO user1 (email, motpass) VALUES ('$email', '$motpass')";

        // Exécuter la requête SQL
        if ($conn->query($sql) === TRUE) {
            echo "Enregistrement administrateur réussi.";
        } else {
            echo "Erreur lors de l'enregistrement de l'administrateur : " . $conn->error;
        }

        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
