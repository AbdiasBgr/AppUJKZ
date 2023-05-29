<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/styl.css">
  <title>Page d'accueil</title>

  <style>
    body {
      background-color: #301B52;
      color: white;
    }

    .logo-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items:center;
      height: 100vh;
    }

    .logo {
      width: 200px;
      height: 200px;
      border-radius: 20%;
      object-fit: cover;
      margin-right: 0px;
      border: black solid 1px;
    }
    .container-fluid {
			margin-top: 70px;
			background-color: white;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      		width: 350px;
            height: 400px;
            padding-bottom: 30px;
		}
    h3{
      color: black;

    }
  </style>
</head>

<body>
  <div class="container-fluid logo-container">
    <h3 class="pb-3">ZerboLink</h3>
    <a href="index.php"><img src="images/logo.jpeg" alt="Logo" class="logo mb-5"></a>
    <div>
      <a href="pages/inscription.php" class="btn btn-success me-3" style="width: 130px;">S'inscrire</a>
      <a href="pages/Liste.php" class="btn btn-danger">Afficher la liste</a>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>

</html>
