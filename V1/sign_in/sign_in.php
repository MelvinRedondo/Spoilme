<?php

include '../includes/database.php';
global $bdd;

if(isset($_POST['submit'])){
  if(!empty($_POST['email']) AND !empty($_POST['name'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    if(filter_var($email)) {
      $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
      $reqmail->execute(array($email));
      $mailexist = $reqmail->rowCount();
      if($mailexist == 0){
        $sql = $bdd->prepare('INSERT INTO users(email, name, dates) VALUES (?, ?,NOW())');
        $sql->execute(array($email, $name));
        $msg1 = "<p><span style='color: black;text-align: center;width: 50px;height: 20px;background: #2ecc71;'>Bienvenue parmi nous, vous êtes désormais inscrits</span></p>";
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Spoilme.fr"<notifications@spoilme.fr>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        $message='
        <html>
          <header>
            <meta charset="utf-8">
            <meta http-equiv="content-language" content="fr">
          </header
          <body>
              <h1>Bienvenue parmi nous '.$name.',</h1>
              <p>Nous avons hâte de pouvoir bientôt vous spoiler toutes les dernières grosses sorties du moment.</p>
          </body>
          <!--Spoilme.fr, 2021-->
        </html>
        ';
        mail($email, "Confirmation d'inscription chez Spoiler.fr", $message, $header);
      }else{
        $erreur1 = "<p><span style='color: white;text-align: center;width: 50px;height: 20px;background: #ee5253;'>il semblerait que votre email soit déjà utilisé</span></p>";
      }
    }
  }
}
?>
<!DOCTYPE html>

<html>

<head>
   <title>Inscription | Spoilme.fr</title>
   <meta charset="utf-8">
   <meta http-equiv="content-language" content="fr">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="../includes/icon.png">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&family=Roboto:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
</head>

<body>
   <nav>
      <a href="../index.php"><img class="logo" src="../includes/logo.png"></a>
         <ul>
            <li><a href="../help/help.php">Aide</a></li>
         </ul>
  </nav>
<section>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST">
      <h1>Inscription</h1>
      <br>
      <?php 
      if (isset($msg1)) {
        echo $msg1;
      }
      if (isset($erreur1)) {
        echo $erreur1;
      }
      ?>
      <input type="text" name="name" placeholder="Entrez votre prénom">
      <input type="email" name="email" placeholder="Entrez une adresse email">
      <p style="font-size: 12px;">En cliquant sur S’inscrire vous acceptez nos <a href="../terms_of_use/terms_of_use.php">Conditions générales</a></p>
      <br>
      <button type="submit" name="submit">S'inscrire</button>
      <br>
      <br>
      <a href="../unsubscribe/unsubscribe.php">Se désinscrire</a>
    </form>
  </div>
</div>
</section>
<footer>
  <div class="footer-content">
    <h3>Contactez-nous</h3>
    <p>contact@spoilme.fr</p>
    <h3>CGU</h3>
    <a href="../terms_of_use/terms_of_use.php"><p>Conditions générales</p></a>
    <ul class="socials">
      <li><a href="https://www.instagram.com/spoilme.fr/"><img src="../includes/insta.png"></a></li>
    </ul>
  </div>
  <div class="footer-bottom">
    <p>Spoilme.fr, 2021</p>
  </div>
</footer></body>
<style type="text/css">
*{
  margin: 0px;
  padding: 0px;
}

body{
  font-family: "Roboto", sans-serif;
  padding-top: 150px;
}

a{
  color: blacks;
  text-decoration: none;
}

nav{
  top: 0px;
  text-align: right;
  position: fixed;
  width: 100%;
  height: 80px;
  background: #fff;
  border-bottom:1px outset;
}

nav .logo{
  padding: 15px;
  height: 50px;
  width: auto;
  float: left;
}

nav li{
  font-family: 'Quicksand', sans-serif;
  display: inline-block;
  margin: 0px;
  padding: 30px;
}

nav li a{
  color: #757575;
}

section .form {
  position: flex;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

section .form input {
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

.form button:hover,.form button:active,.form button:focus {
  background: #c0392b;
}

section .form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #e74c3c;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

footer{
  background: #111;
  height: auto;
  width: 100vw;
  font-family: "Roboto", sans-serif;
  padding-top: 40px;
  color: #fff;
}

footer .footer-content{
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  text-align: center;
}

footer .footer-content h3{
  font-size: 1.8rem;
  font-weight: 400;
  text-transform: capitalize;
  line-height: 3rem;
}

footer .footer-content p{
  max-width: 500px;
  margin: 10px auto;
  line-height: 28px;
  font-size: 14px;
}

footer .footer-content a{
  color: #fff;
  text-decoration: none;
}

footer .socials{
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 1rem 0 3rem 0;
}

footer .socials img{
  height: auto;
  width: 50px;
}

footer .footer-bottom{
  background: #000;
  width: 100vw;
  padding: 20px 0;
  text-align: center;
}

footer .footer-bottom p{
  font-size: 14px;
  word-spacing: 2px;
  text-transform: capitalize;
}

@media only screen and (max-width: 520px){
  body{
  padding-top: 20%;
  }
  nav{
    text-align: right;
    width: 100%;
    height: 50px;
  }
  nav ul{
    display: inline-block;
    padding-top: 15px;
  }
  nav .logo{
    float: left;
    width: auto;
    height: 30px;
  }
  nav li{
    margin: 4px;
    padding: 4px;
    font-size: 0.7rem;
  }
  section .form {
    width: 200px;
}
  footer .footer-content h3{
  font-size: 1rem;
  }
  footer .footer-content p{
    font-size: 0.5rem;
  }
  footer .footer-content a{
    font-size: 0.5rem;
  }
  footer .socials img{
    height: auto;
    width: 20px;
  }
}
</style>
<!--Spoilme.fr, 2021-->
</html>