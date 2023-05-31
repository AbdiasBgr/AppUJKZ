
<?php
// Vérification et enregistrement des données dans la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"]; 
    $date_naissance = $_POST["date_naissance"];
    $dateinscription = $_POST["dateinscription"]; 
    $dateadmission = $_POST["dateadmission"];
    $personneprevenir = $_POST["personneprevenir"];


     // Vérification des données
     

    // Enregistrement des données dans la base de données
    $servername = 'localhost';
    $username = 'root';
    $dbname = 'appujkz';
    $password ='';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO appujkzt (nom, prenom, email, date_naissance, dateinscription, dateadmission, personneprevenir) VALUES ('$nom', '$prenom', '$email', '$date_naissance', '$dateinscription', '$dateadmission', '$personneprevenir')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers une autre page après l'enregistrement des données
        header('Location: enregistrement.php');
        exit();
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
    
    $conn->close();    
}
?>



