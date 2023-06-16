<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire de connexion en HTML & CSS - Frenchcoder</title>
  <link rel="stylesheet" href="styl.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    body{
      display: flex;
      justify-content:center;
      flex-direction: columns;
      align-items: center;
      background-color: #f5f5f5;
      font-family: 'Roboto', sans-serif;
    }
    form {
      margin-top: 20px;
      background-color: #fff;
      padding: 40px 60px;
      border-radius: 10px;
      min-width: 300px;
    } 
    form h1{
      color: #eb7371;
      text-align:center;
    }
    form .social-media{
      margin-top: -10px;
      display: flex;
      flex-wrap:wrap;
      justify-content:center;
    }
    form .social-media p{
      padding: 5px;
      width: 20px;
      margin-left: 10px;
      border-radius: 100%;
      border: 1px solid #545454;
      text-align: center;
      cursor:pointer;
      color: #545454;
    }
    form p.choose-email{
      text-align:center;
    }
    form .inputs {
      display: flex;
      flex-direction: column;
    }
    form .inputs input[type='email'], input[id='motpass']{
      padding: 15px;
      border:none;
      border-radius: 5px;
      background-color:#f2f2f2;
      outline:none;
      margin-bottom: 15px;
    }
    form p.inscription{
      font-size: 14px;
      margin-bottom: 20px;
      color: #878787;
    }
    form p.inscription span{
      color: #eb7371;
    }
    form button{
      padding: 15px 25px;
      border-radius: 5px;
      border:none;
      font-size: 15px;
      color: #fff;
      background-color: #eb7371;
      outline:none;
      cursor:pointer;
      }
  </style>
</head>
<body>
  <form method="post" action="enregistadmin.php">
    <h1>Enregistrement Admin</h1>
    <div class="social-media">
      <p><i class="fab fa-google"></i></p>
      <p><i class="fab fa-youtube"></i></p>
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
    </div>
    <p class="choose-email">ou utiliser mon adresse e-mail :</p>
    <div class="inputs">
      <input type="email" id="email" name="email" placeholder="Email" />
      <input id="motpass" name="motpass" placeholder="Mot de passe">
    </div>
    <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
    <div align="center">
      <button type="submit">S'inscrire</button>
    </div>
  </form>
</body>
</html>
