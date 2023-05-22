
<?php
// Vérification et enregistrement des données dans la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];

     // Vérification des données
     

    // Enregistrement des données dans la base de données
    $servername = 'localhost';
    $username = 'root';
    $dbname = 'inscription1';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO apprenants (nom, prenom, date_naissance) VALUES ('$nom', '$prenom', '$date_naissance')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers une autre page après l'enregistrement des données
        header("Location: enregistrement.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>