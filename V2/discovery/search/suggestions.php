<?php

include '../../includes/database.php';
global $bdd;

if(isset($_POST['mailform']))
{
  $name = htmlspecialchars($_POST['title']);
  $email = htmlspecialchars($_POST['mail']);
  $message = htmlspecialchars($_POST['message']);
  if(!empty($_POST['title']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
  {
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Spoilme.fr"<suggestions@spoilme.fr>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $message='
    <html>
      <body>
        <div>
          <b>Titre du sujet : </b>'.$_POST['title'].'<br>
          <b>Mail de l\'expéditeur : </b>'.$_POST['mail'].'<br>
          <br />
          '.nl2br($_POST['message']).'
        </div>
      </body>
      <!--Spoilme.fr, 2021-->
    </html>
    ';

    mail("suggestions@spoilme.fr", "Demande d'ajout de spoil", $message, $header);
    $msg1="<p><span style='color: black;text-align: center;width: 50px;height: 20px;background: #2ecc71;'>Votre demande d'ajout de spoil a bien été envoyé</span></p>";
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
<title>Suggestions | Spoilme.fr</title>
<link rel="shortcut icon" type=image/x-icon href=../../includes/logo.ico>
<meta name=viewport content="width=device-width, initial-scale=1">
<meta name=description content="cherchez, suggérez, spoilez, et si vous le shouitez restez informé des derniers spoils avec notre newsletter">
<link rel=preconnect href=https://fonts.gstatic.com crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&family=Varela+Round&display=swap" rel=stylesheet>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-201117643-1">
</script>
</head>
<body>
<section>
<div class=login-page>
<div class=form>
<form class=login-form method=POST>
<h1>Demande d'ajout de spoil</h1>
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
<input type=text name=title placeholder="Entrez un titre" value=<?php if(isset($_POST['title'])) { echo $_POST['title']; } ?>>
<input type=email name=mail placeholder="Entrez une adresse email" value=<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>>
<input name=message placeholder="Entrez un spoiler"<?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>>
<button type=submit name=mailform>Envoyer</button>
</form>
</div>
</div>
</section>
</body>
<style type=text/css>*{margin:0;padding:0}body{background-color: #2f3640;padding-top: 120px;}a{color:white;text-decoration:none}section .form{font-family:'Oxygen',sans-serif;color:black;position:flex;z-index:1;background:black;max-width:360px;margin:0 auto 100px;padding:45px;text-align:center;box-shadow:0 0 20px 0 rgba(0,0,0,0.2),0 5px 5px 0 rgba(0,0,0,0.24);border-radius: 25px;background-color: #718093;}section .form input{outline:0;background:#f2f2f2;width:100%;border:0;margin:0 0 15px;padding:15px;box-sizing:border-box;font-size:14px}.form button:hover,.form button:active,.form button:focus{background:#dcdde1}section .form button{font-family:'Oxygen',sans-serif;text-transform:uppercase;outline:0;background:#e74c3c;width:100%;border:0;padding:15px;color:#f5f6fa;font-size:14px;-webkit-transition:all .3 ease;transition:all .3 ease;cursor:pointer}</style>
</html>