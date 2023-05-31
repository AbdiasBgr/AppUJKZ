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
    <style>
      .t2 {
        border-top: solid 3px;
        border-top-color: white;
        border-bottom:solid 3px;
        border-bottom-color:  white;
        border-left: solid 3px;
        border-left-color:white ;
        border-right: solid 3px;
        border-right-color: white;
      }
      body {
        background-color:#2B1D1D;
        color: white;
      }
      .table-striped tbody tr:nth-of-type(odd) {
        background-color: #0073FA;
      }
      .table-striped tbody tr:nth-of-type(even) {
        background-color: #D9D9D9;
      }

      .table-hover tbody tr:hover {
        background-color: #6D84FE;
      }
      thead th {
        color: white;
        font-style: italic;
      }

      .t3 {
        color: #0073FA;
        background-color: aliceblue;
        width: 450px;
        height: 60px;
        border-radius: 20px;
        margin-left: 300px;
      }
    </style> 
</head>
<body>
  <div class="container py-5 ">
    <h1 class="text-center mb-4 t3">Liste des étudiants</h1>
    <?php 
    // Inclure le fichier de connexion à la base de données
    require_once "db.php";

    try {
      // Se connecter à la base de données en utilisant la fonction connect_db() définie dans db.php
      $conn = connect_db();

      // Effectuer la requête SQL pour récupérer les données de la table
      $sql = "SELECT * FROM appujkzt";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Vérifier si des données ont été trouvées
      if (count($result) > 0) {
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
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>";
        foreach ($result as $row) {
          // Extraire l'ID de l'enregistrement courant
          $id = $row['id'];
          echo "<tr>
                    <td>".$row["nom"]."</td>
                    <td>".$row["prenom"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["date_naissance"]."</td>
                    <td>".$row["dateinscription"]."</td>
                    <td>".$row["dateadmission"]."</td>
                    <td>".$row["personneprevenir"]."</td>
                    <td>
                      <div class='btn-group' role='group'>
                        <a href='modifier.php?id=".$row['id']. "'class='btn btn-success'>Modifier</a>
                        <button onclick='confirmDelete(".$id.")' class='btn btn-danger delete-button'>Supprimer</button>
                      </div>
                    </td>
                </tr>";
        }
 
        echo "</tbody></table>";
      } else {
        echo "0 résultats trouvés dans la table appujkzt.";
      }

      // Fermer la connexion à la base de données
      $stmt = null;
      $conn = null;
    } catch (PDOException $e) {
      die("Erreur: " . $e->getMessage());
    }
    ?>

    <a href="../index.php" class="btn btn-primary">Retourner à la page d'accueil</a>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
      function confirmDelete(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement ?")) {
          // Si l'utilisateur clique sur "OK", appeler la fonction AJAX pour supprimer l'enregistrement
          $.post("supprimer.php", {id: id}, function(data){
            alert(data);
            location.reload(); // Recharger la page après avoir supprimé l'enregistrement
          });
        } else {
          // Si l'utilisateur clique sur "Annuler", ne rien faire
          return false;
        }
      }
</script>
</body>
</html>
