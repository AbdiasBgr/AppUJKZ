<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../style/styl.css">
    <title>Liste des étudiants</title>
</head>
<body>
    <div class="container py-5 ">
        <h1 class="text-center mb-5 t3">Liste des étudiants</h1>
    <?php 
// Se connecter à la base de données
$servername = 'localhost';
$username = 'root';
$dbname = 'appujkz';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("La connexion a échoué: " . $conn->connect_error);
}

// Effectuer la requête SQL pour récupérer les données de la table
$sql = "SELECT * FROM appujkzt";
$result = $conn->query($sql);

// Vérifier si des données ont été trouvées
if ($result->num_rows > 0) {
  // Générer le tableau HTML et ajouter chaque entrée de la table comme une nouvelle ligne dans le tableau
  echo "<table class='table table-striped table-hover t2'>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse E-mail</th>
                    <th>Date de Naissance</th>
                    <th>Date d'Inscription</th>
                    <th>Date d'Admission</th>
                    <th>Personne à Prévenir</th>
                </tr>
            </thead>
            <tbody>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>
              <td>".$row["nom"]."</td>
              <td>".$row["prenom"]."</td>
              <td>".$row["email"]."</td>
              <td>".$row["date_naissance"]."</td>
              <td>".$row["dateinscription"]."</td>
              <td>".$row["dateadmission"]."</td>
              <td>".$row["personneprevenir"]."</td>
          </tr>";
  }
  echo "</tbody></table>";
} else {
  echo "0 résultats trouvés dans la table appujkzt.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
</div>
    <!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>


