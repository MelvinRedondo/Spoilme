<!DOCTYPE html>
<html lang=fr>
<head>
<meta charset=utf-8>
<title>Spoilme.fr, la référence du spoil</title>
<link rel="shortcut icon" type=image/x-icon href=includes/logo.ico>
<meta name=viewport content="width=device-width, initial-scale=1">
<meta name=description content="cherchez, suggérez, spoilez, et si vous le shouitez restez informé des derniers spoils avec notre newsletter">
<link rel=preconnect href=https://fonts.gstatic.com crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&family=Varela+Round&display=swap" rel=stylesheet>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-201117643-1">
</script>
<script data-ad-client="ca-pub-8463971267883035" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-201117643-1');
</script>
</head>
<body>
<nav>
<a href=https://spoilme.fr><img class=logo src=includes/logo.png></a>
</nav>
<section>
<h1>Partez à l'aventure, découvrez tous les spoilers dont vous aurez besoin</h1>
<a href=discovery\search\search.php>
<button class=glow-on-hover type=button>explorer</button>
</a>
<div id=wrapper>
<h3 style="font-family:'Varela Round',sans-serif">Ajouts récents</h3>
<div id=carousel>
<div id=content>
<a href=https://spoilme.fr/discovery/spoilers/avatar.html><img class=item src=carousel/1.jpg></a>
<a href=https://spoilme.fr/discovery/spoilers/avengers_engame.html><img class=item src=carousel/2.jpg></a>
<a href=https://spoilme.fr/discovery/spoilers/star_wars_7.html><img class=item src=carousel/3.jpg></a>
<a href=https://spoilme.fr/discovery/spoilers/titanic.html><img class=item src=carousel/4.jpg></a>
<a href=https://spoilme.fr/discovery/spoilers/avengers_infinity_war.html><img class=item src=carousel/5.jpg></a>
</div>
</div>
<button id=prev>
<svg xmlns=http://www.w3.org/2000/svg width=24 height=24 viewBox="0 0 24 24">
<path fill=none d="M0 0h24v24H0V0z" />
<path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
</svg>
</button>
<button id=next>
<svg xmlns=http://www.w3.org/2000/svg width=24 height=24 viewBox="0 0 24 24">
<path fill=none d="M0 0h24v24H0V0z" />
<path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
</svg>
</button>
</div>
<div class=login-page>
<div class=form>
<form class=login-form method=POST>
<?php

include 'includes/database.php';
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
        mail($email, "Confirmation d'inscription chez Spoilme.fr", $message, $header);
      }else{
        $erreur1 = "<p><span style='color: white;text-align: center;width: 50px;height: 20px;background: #ee5253;'>il semblerait que votre email soit déjà utilisé</span></p>";
      }
    }
  }else{
      $erreur2 = "<p><span style='color: white;text-align: center;width: 50px;height: 20px;background: #ee5253;'>Tous les champs doivent être complétés</span></p>";
    }
}
?>
<h3>Ca vous dirait de rester informé des derniers spoilers</h3>
<br>
<?php 
if (isset($msg1)) {
  echo $msg1;
}
if (isset($erreur1)) {
  echo $erreur1;
}
if (isset($erreur2)){
  echo $erreur2;
}
?>
<br>
<input type=text name=name placeholder="Entrez votre prénom">
<br><br>
<input type=email name=email placeholder="Entrez une adresse email">
<p style=font-size:12px;text-align:center>En cliquant sur s’inscrire vous acceptez nos <a href=terms_of_use/terms_of_use.php>Conditions générales d'utilisation</a></p>
<br>
<button type=submit name=submit>S'inscrire</button>
</form>
</div>
</div>
<div class=donate><form action=https://www.paypal.com/donate method=post target=_top>
<input type=hidden name=hosted_button_id value=GE9TDPVA5V4NN />
<input type=image src=https://spoilme.fr/includes/donate.png border=0 name=submit title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt border=0 src=https://www.paypal.com/fr_FR/i/scr/pixel.gif width=1 height=1 />
</form>
</div>
</section>
<footer>
<div class=footer>
<div class=row>
<a href=https://www.instagram.com/spoilme.fr><i class=instagram></i><img src=includes/insta.png></a>
</div>
<div class=row>
<ul>
<li><a href=mailto:contact@spoilme.fr>Nous contacter</a></li>
<li><a href=mailto:help@spoilme.fr>Aide</a></li>
<li><a href=mailto:bug-report@spoilme.fr>Signaler un bug</a></li>
<li><a href=unsubscribe/unsubscribe.php>Se désabonner de la newsletter</a></li>
<li><a href=terms_of_use\terms_of_use.php>CGU</a></li>
</ul>
</div>
<div class=row>
Spoilme.fr | 2021
</div>
</div>
</footer>
</body>
<script>const gap=16;const carousel=document.getElementById("carousel"),content=document.getElementById("content"),next=document.getElementById("next"),prev=document.getElementById("prev");next.addEventListener("click",e=>{carousel.scrollBy(width+gap,0);if(carousel.scrollWidth!==0){prev.style.display="flex";}
if(content.scrollWidth-width-gap<=carousel.scrollLeft+width){next.style.display="none";}});prev.addEventListener("click",e=>{carousel.scrollBy(-(width+gap),0);if(acarousel.scrollLeft-width-gap<=0){prev.style.display="none";}
if(!content.scrollWidth-width-gap<=carousel.scrollLeft+width){next.style.display="flex";}});let width=carousel.offsetWidth;window.addEventListener("resize",e=>(width=carousel.offsetWidth));</script>
<style type=text/css>*{margin:0;padding:0}nav{top:0;text-align:right;position:relatives;width:100%;height:80px;background:#111;border-bottom:0;text-align:center}nav .logo{padding:15px;height:50px;width:auto}section{padding:30px}h1{padding-top:80px;font-size:3rem;font-family:'Varela Round',sans-serif}.glow-on-hover{top:40px;font-family:'Oxygen',sans-serif;width:20%;height:30px;border:0;outline:0;color:#fff;background:#111;cursor:pointer;position:relative;z-index:0;border-radius:10px}.glow-on-hover:before{content:'';background:linear-gradient(45deg,#ff0000,#ff7300,#fffb00,#48ff00,#00ffd5,#002bff,#7a00ff,#ff00c8,#ff0000);position:absolute;top:-2px;left:-2px;background-size:400%;z-index:-1;filter:blur(5px);width:calc(100% + 4px);height:calc(100% + 4px);animation:glowing 20s linear infinite;opacity:0;transition:opacity .3s ease-in-out;border-radius:10px}.glow-on-hover:active{color:#000}.glow-on-hover:active:after{background:transparent}.glow-on-hover:hover:before{opacity:1}.glow-on-hover:after{z-index:-1;content:'';position:absolute;width:100%;height:100%;background:#111;left:0;top:0;border-radius:10px}#wrapper{display:block;margin-left:auto;margin-right:auto;top:150px;width:100%;max-width:964px;position:relative}#carousel{overflow:auto;scroll-behavior:smooth;scrollbar-width:none}#carousel::-webkit-scrollbar{height:0}#prev,#next{display:flex;justify-content:center;align-content:center;background:white;border:0;padding:8px;border-radius:50%;outline:0;cursor:pointer;position:absolute}#prev{top:50%;left:0;transform:translate(50%,-50%);display:none}#next{top:50%;right:0;transform:translate(-50%,-50%)}#content{display:grid;grid-gap:16px;grid-auto-flow:column;margin:auto;box-sizing:border-box}.item{width:180px;height:180px;background:green}@keyframes glowing{0%{background-position:0 0}50%{background-position:400% 0}100%{background-position:0 0}}section .form h3{padding-top:180px;text-align:center;font-family:'Varela Round',sans-serif}section .form input{outline:0;background:#f2f2f2;width:40%;border:0;margin-left:30%;padding:15px;box-sizing:border-box;font-size:14px}.form button:hover,.form button:active,.form button:focus{background:#353b48}section .form button{font-family:"Roboto",sans-serif;text-transform:uppercase;outline:0;background:black;width:30%;border:0;padding:15px;margin-left:35%;color:#fff;font-size:14px;-webkit-transition:all .3 ease;transition:all .3 ease;cursor:pointer}@media only screen and (max-width:580px){section .form button{margin-left:30%;width:40%}section .form input{font-size:.7rem;margin-left:20%;width:60%}}.footer{background:#000;padding:30px 0;font-family:sans-serif;text-align:center}.footer .row{width:100%;margin:1% 0;padding:.6% 0;color:gray;font-size:.8em}.footer .row a{text-decoration:none;color:gray;transition:.5s}.footer .row a:hover{color:#fff}.footer .row ul{width:100%}.footer .row ul li{display:inline-block;margin:0 30px}.footer .row a i{font-size:2em;margin:0 1%}.footer .row img{width:30px;height:auto}.donate{text-align:center;padding-top:180px}.btn{display:inline-block;background:transparent;color:inherit;font:inherit;border:0;outline:0;padding:0;transition:all 200ms ease-in;cursor:pointer}.btn--primary{background:#7f8ff4;color:#fff;box-shadow:0 0 10px 2px rgba(0,0,0,0.1);border-radius:2px;padding:12px 36px}.btn--primary:hover{background:#6c7ff2}.btn--primary:active{background:#7f8ff4;box-shadow:inset 0 0 10px 2px rgba(0,0,0,0.2)}.btn--inside{margin-left:-96px}.form__field{width:360px;background:#fff;color:#a3a3a3;font:inherit;box-shadow:0 6px 10px 0 rgba(0,0,0,0.1);border:0;outline:0;padding:22px 18px}@media only screen and (max-width:768px){nav{height:50px}nav .logo{height:25px;width:auto}h1{padding-top:30px;font-size:1.5rem}#wrapper{top:80px}.item{width:80px;height:80px}.newsletter input{width:50%;margin:15px;height:35px;font-size:14px}.newsletter button{margin:20px;width:50%;height:35px}.newsletter h3{font-family:'Varela Round',sans-serif;font-size:1.5rem}.donate{padding-top:80px}.footer{text-align:left;padding:5%}.footer .row ul li{display:block;margin:10px 0;text-align:left}.footer .row a i{margin:0 3%}.footer .row img{width:15px;height:auto}}</style>
</body>
</html>