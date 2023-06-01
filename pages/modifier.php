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
    <title>Modifier un étudiant</title>
    <style>
      body {
        background-color:#2B1D1D;
        color: white;
      }
      .t3 {
        color: #0073FA;
        background-color: aliceblue;
        width: 450px;
        height: 60px;
        border-radius: 20px;
        margin-left: 300px;
      }
      .form-container {
        margin-top: 50px;
      }
      .form-container input[type="text"],
      .form-container input[type="email"],
      .form-container input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        background-color: #D9D9D9;
        border: none;
        color: #2B1D1D;
      }
      .form-container button[type="submit"] {
        padding: 10px 20px;
        background-color: #0073FA;
        border: none;
        color: white;
        cursor: pointer;
      }
/* Rien mon code */
      /* .form-container {
        border-top: solid 3px;
        border-top-color: white;
        border-bottom:solid 3px;
        border-bottom-color:  white;
        border-left: solid 3px;
        border-left-color:white ;
        border-right: solid 3px;
        border-right-color: white;
      } */
    </style> 
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center mb-4 t3">Modifier un étudiant</h1>
    <?php 
    // Incluons le fichier de connexion à la base de données
    require_once "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      try {
        // Récupérer les valeurs du formulaire
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $date_naissance = $_POST["date_naissance"];
        $dateinscription = $_POST["dateinscription"];
        $dateadmission = $_POST["dateadmission"];
        $personneprevenir = $_POST["personneprevenir"];

        $conn = connect_db();

        // Effectuons la requête SQL pour mettre à jour l'enregistrement
        $sql = "UPDATE appujkzt SET nom=:nom, prenom=:prenom, email=:email, date_naissance=:date_naissance, dateinscription=:dateinscription, dateadmission=:dateadmission, personneprevenir=:personneprevenir WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
          'id' => $id,
          'nom' => $nom,
          'prenom' => $prenom,
          'email' => $email,
          'date_naissance' => $date_naissance,
          'dateinscription' => $dateinscription,
          'dateadmission' => $dateadmission,
          'personneprevenir' => $personneprevenir
        ]);
        header("Location: liste.php");
        exit();
      } catch (PDOException $e) {
        die("Erreur: " . $e->getMessage());
      }
    } else {
      // Id de l'enregistrement
      $id = $_GET['id'];

      try {

        $conn = connect_db();

        $sql = "SELECT * FROM appujkzt WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
          echo '<div class="form-container">
                  <form method="post">
                    <input type="hidden" name="id" value="'.$result["id"].'">
                    <input type="text" name="nom" value="'.$result["nom"].'" placeholder="Nom" required>
                    <input type="text" name="prenom" value="'.$result["prenom"].'" placeholder="Prénom" required>
                    <input type="email" name="email" value="'.$result["email"].'" placeholder="Adresse E-mail" required>
                    <input type="date" name="date_naissance" value="'.$result["date_naissance"].'" placeholder="Date de Naissance" required>
                    <input type="date" name="dateinscription" value="'.$result["dateinscription"].'" placeholder="Date d\'Inscription" required>
                    <input type="date" name="dateadmission" value="'.$result["dateadmission"].'" placeholder="Date d\'Admission" required>
                    <input type="text" name="personneprevenir" value="'.$result["personneprevenir"].'" placeholder="Personne à Prévenir" required>
                    <button type="submit" class="mb-4">Modifier</button>
                  </form>
                </div>';
        } else {
          echo "Aucun enregistrement trouvé avec l'ID ".$id;
        }

        // Fermer la connexion à la base de données
        $stmt = null;
        $conn = null;
      } catch (PDOException $e) {
        die("Erreur: " . $e->getMessage());
      }
    }
    ?>

    <a href="liste.php" class="btn btn-primary mb-2">Retourner à la liste des étudiants</a>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>
