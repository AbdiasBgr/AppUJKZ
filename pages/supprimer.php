<?php
// // Connexion à la base de données
// function connect_db() {
//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname = "appujkz";
//   try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     return $conn;
//   } catch(PDOException $e) {
//     echo "La connexion a échoué: " . $e->getMessage();
//   }
// }

// connexion à la base de données

require_once "db.php";

$conn = connect_db();

// Récupérer l'ID de l'enregistrement à supprimer depuis la demande POST
$id = $_POST['id'];

// Exécuter la requête SQL DELETE pour supprimer l'enregistrement correspondant
$sql = "DELETE FROM appujkzt WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Vérifier si la suppression a réussi
if ($stmt->rowCount() > 0) {
  echo "L'élement a été supprimé avec succès.";
} else {
  echo "Échec de la suppression de l'élément.";
}

// Fermer la connexion à la base de données
$conn = null;
?>
