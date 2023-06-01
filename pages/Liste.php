<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../style/styl.css">
    <title>Liste des étudiants</title>
    <style>
      .t2 {
    border-top: solid 3px;
    border-top-color: black;
    border-bottom:solid 3px;
    border-bottom-color:  black;
    border-left: solid 3px;
    border-left-color: black ;
    border-right: solid 3px;
    border-right-color: black;
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
  <div class="container-fluid py-5 " style=" background-color: #2B1D1D; ">
    <h1 class="text-center mb-4 t3">Liste des étudiants</h1>
    <?php 
    
    require_once "db.php";

    try {
      
      $conn = connect_db();

      // Effectuer la requête SQL pour récupérer les données de la table
      $sql = "SELECT * FROM appujkzt";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
      if (count($result) > 0) {
        
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
                          <th style=' padding-left: 100px;'>Action</th>
                      </tr>
                  </thead>
                  <tbody>";
        foreach ($result as $row) {

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
                        <button class='btn btn-primary btn-details' data-id='".$id."'>Détails</button>
                        <button onclick='confirmDelete(".$id.")' class='btn btn-danger delete-button'>Supprimer</button>
                      </div>
                    </td>
                </tr>";
        }
 
        echo "</tbody></table>";
      } else {
        echo "0 résultats trouvés dans la table appujkzt.";
      }

      $stmt = null;
      $conn = null;
    } catch (PDOException $e) {
      die("Erreur: " . $e->getMessage());
    }
    ?>

    <a href="../index.php" class="btn btn-primary">Retourner à la page d'accueil</a>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informations personnelles</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="person-details"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<!-- Include Bootstrap and jQuery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Script Pour le Bouton détails -->
    <script>
      $(document).ready(function() {
        $('.btn-details').click(function() {
          var id = $(this).data('id');
          $.ajax({
            url: 'personinfo.php',
            type: 'GET',
            data: { id: id },
            success: function(response) {
              $('#person-details').html(response);
              $('#exampleModal').modal('show'); 
            },
            error: function() {
              console.log('Une erreur s\'est produite lors de la récupération des informations de la personne.');
            }
          });
        });
      });
    </script>

    <!-- Bootstrap JavaScript Script Pour la Suppression -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
      function confirmDelete(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement ?")) {
          $.post("supprimer.php", {id: id}, function(data){
            alert(data);
            location.reload(); 
          });
        } else {
          return false;
        }
      }
    </script>
  </body>
</html>
