<?php

include '../includes/database.php';
global $bdd;

if(isset($_POST['mailform']))
{
  $name = htmlspecialchars($_POST['nom']);
  $email = htmlspecialchars($_POST['mail']);
  $message = htmlspecialchars($_POST['message']);
  if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
  {
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Spoilme.fr"<unsubscribe@spoilme.fr>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $message='
    <html>
      <body>
        <div>
          <b>Nom de l\'expéditeur : </b>'.$_POST['nom'].'<br>
          <b>Mail de l\'expéditeur : </b>'.$_POST['mail'].'<br>
          <br />
          '.nl2br($_POST['message']).'
        </div>
      </body>
      <!--Spoilme.fr, 2021-->
    </html>
    ';

    mail("unsubscribe@spoilme.fr", "Demande de suppresion de compte", $message, $header);
    $msg1="<p><span style='color: black;text-align: center;width: 50px;height: 20px;background: #2ecc71;'>Votre message a bien été envoyé</span></p>";
  }
  else
  {
    $msg2="<p><span style='color: white;text-align: center;width: 50px;height: 20px;background: #ee5253;'>Tous les champs doivent être complétés</span></p>"
    ;
  }
}
?>
<!DOCTYPE html>
<html lang=fr>
<head>
<meta charset=utf-8>
<title>Désinscription | Spoilme.fr</title>
<link rel="shortcut icon" type=image/x-icon href=../includes/logo.ico>
<meta name=viewport content="width=device-width, initial-scale=1">
<meta name=description content="cherchez, suggérez, spoilez, et si vous le shouitez restez informé des derniers spoils avec notre newsletter">
<link rel=preconnect href=https://fonts.gstatic.com crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&family=Varela+Round&display=swap" rel=stylesheet>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-201117643-1">
</script>
</head>
<body>
<nav>
<a href=https://spoilme.fr><img class=logo src=../includes/logo.png></a>
</nav>
<section>
<div class=login-page>
<div class=form>
<form class=login-form method=POST>
<h1>Demande de désinscription</h1>
<br>
<?php
      if(isset($msg1))
      {
        echo $msg1;
      }
      if(isset($msg2))
      {
        echo $msg2;
      }
      ?>
<input type=text name=nom placeholder="Entrez votre prénom" value=<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>>
<input type=email name=mail placeholder="Entrez une adresse email" value=<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>>
<input name=message placeholder="Entrez un motif (optionnelle)"<?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>>
<button type=submit name=mailform>Envoyer</button>
<br>
<br>
<a href=../index.php>S'inscrire</a>
</form>
</div>
</div>
</section>
<footer>
<div class=footer>
<div class=row>
<a href=https://www.instagram.com/spoilme.fr><i class=instagram></i><img src=../includes/insta.png></a>
</div>
<div class=row>
<ul>
<li><a href=mailto:contact@spoilme.fr>Nous contacter</a></li>
<li><a href=mailto:help@spoilme.fr>Aide</a></li>
<li><a href=mailto:bug-report@spoilme.fr>Signaler un bug</a></li>
<li><a href=unsubscribe.php>Se désabonner de la newsletter</a></li>
<li><a href=../terms_of_use\terms_of_use.php>CGU</a></li>
</ul>
</div>
<div class=row>
Spoilme.fr | 2021
</div>
</div>
</footer>
</body>
<style type=text/css>*{margin:0;padding:0}nav{top:0;text-align:right;position:relatives;width:100%;height:80px;background:#111;border-bottom:0;text-align:center}nav .logo{padding:15px;height:50px;width:auto}section{padding:30px}a{color:white;text-decoration:none}section .form{font-family:'Oxygen',sans-serif;color:white;position:flex;z-index:1;background:black;max-width:360px;margin:0 auto 100px;padding:45px;text-align:center;box-shadow:0 0 20px 0 rgba(0,0,0,0.2),0 5px 5px 0 rgba(0,0,0,0.24)}section .form input{outline:0;background:#f2f2f2;width:100%;border:0;margin:0 0 15px;padding:15px;box-sizing:border-box;font-size:14px}.form button:hover,.form button:active,.form button:focus{background:#dcdde1}section .form button{font-family:'Oxygen',sans-serif;text-transform:uppercase;outline:0;background:#e74c3c;width:100%;border:0;padding:15px;color:#f5f6fa;font-size:14px;-webkit-transition:all .3 ease;transition:all .3 ease;cursor:pointer}.footer{background:#000;padding:30px 0;font-family:sans-serif;text-align:center}.footer .row{width:100%;margin:1% 0;padding:.6% 0;color:gray;font-size:.8em}.footer .row a{text-decoration:none;color:gray;transition:.5s}.footer .row a:hover{color:#fff}.footer .row ul{width:100%}.footer .row ul li{display:inline-block;margin:0 30px}.footer .row a i{font-size:2em;margin:0 1%}.footer .row img{width:30px;height:auto}.donate{text-align:center;padding-top:180px}.btn{display:inline-block;background:transparent;color:inherit;font:inherit;border:0;outline:0;padding:0;transition:all 200ms ease-in;cursor:pointer}.btn--primary{background:#7f8ff4;color:#fff;box-shadow:0 0 10px 2px rgba(0,0,0,0.1);border-radius:2px;padding:12px 36px}.btn--primary:hover{background:#6c7ff2}.btn--primary:active{background:#7f8ff4;box-shadow:inset 0 0 10px 2px rgba(0,0,0,0.2)}.btn--inside{margin-left:-96px}.form__field{width:360px;background:#fff;color:#a3a3a3;font:inherit;box-shadow:0 6px 10px 0 rgba(0,0,0,0.1);border:0;outline:0;padding:22px 18px}@media only screen and (max-width:768px){nav{height:50px}nav .logo{height:25px;width:auto}h1{padding-top:30px;font-size:1.5rem}#wrapper{top:80px}.item{width:80px;height:80px}.newsletter input{width:50%;margin:15px;height:35px;font-size:14px}.newsletter button{margin:20px;width:50%;height:35px}.newsletter h3{font-family:'Varela Round',sans-serif;font-size:1.5rem}.donate{padding-top:80px}.footer{text-align:left;padding:5%}.footer .row ul li{display:block;margin:10px 0;text-align:left}.footer .row a i{margin:0 3%}.footer .row img{width:15px;height:auto}}</style>
</html>