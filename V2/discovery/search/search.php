<!DOCTYPE html>
<html lang=fr>
<head>
<title>Découverte | Spoilme.fr</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type=image/x-icon href=../../includes/logo.ico>
<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>
<link rel=preconnect href=https://fonts.gstatic.com crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&family=Varela+Round&display=swap" rel=stylesheet>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-201117643-1">
</script>
</head>
<body>
<nav>
<a href=https://spoilme.fr><img class=logo src=../../includes/logo.png></a>
</nav>
<section>
<form>
<div class=container>
<div class=field-input>
<input type=text class=search_bar id=search placeholder="Cherchez un titre"/><span> </span>
<div id=result class=result></div>
<a href="suggestions.php" style="text-decoration: none;font-family:'Varela Round',sans-serif;">Ajouter un spoil</a>
</div>
</div>
</form></section>
<footer>
<div class=footer>
<div class=row>
<a href=https://www.instagram.com/spoilme.fr><i class=instagram></i><img src=../../includes/insta.png></a>
</div>
<div class=row>
<ul>
<li><a href=mailto:contact@spoilme.fr>Nous contacter</a></li>
<li><a href=mailto:help@spoilme.fr>Aide</a></li>
<li><a href=mailto:bug-report@spoilme.fr>Signaler un bug</a></li>
<li><a href=../../unsubscribe/unsubscribe.php>Se désabonner de la newsletter</a></li>
<li><a href=../../terms_of_use\terms_of_use.php>CGU</a></li>
</ul>
</div>
<div class=row>
Spoilme.fr | 2021
</div>
</div>
</footer>
<script>$(document).ready(function(){$("#search").keyup(function(){var a=$(this).val();$.ajax({url:"fetch.php",method:"POST",data:{search:a},dataType:"TEXT",success:function(b){$("#result").html(b)}})})});</script>
</body>
<style type=text/css>*{margin:0;padding:0}nav{top:0;text-align:right;position:relatives;width:100%;height:80px;background:#111;border-bottom:0;text-align:center}nav .logo{padding:15px;height:50px;width:auto}.container{padding-top:10%;display:block;margin-left:auto;margin-right:auto}.container .field-input{text-align:center}.container .field-input input{text-align:left;border-radius:6rem;border:1px solid #a0a0a0;padding:.6rem 2rem .6rem 1rem;width:20rem;font-family:"roboto";transition:.5s;display:block;margin-left:auto;margin-right:auto}.container .field-input input:focus{outline:0;border-color:#212121;transition:.5s}.container .field-input span:before{cursor:pointer;position:relative;font-family:'Varela Round',sans-serif;top:0;right:1.5rem}.result{text-align:center;font-size:1.2rem;list-style-type:none;background-color:#d1d8e0;margin-left:32%;width:15rem;border-radius:5px;display:block;margin-left:auto;margin-right:auto}.result li a{text-decoration:none;color:white;background-color:#d1d8e0;font-family:'Varela Round',sans-serif}@media only screen and (max-width:425px){.result{font-size:1rem;width:50%}.container .field-input input{width:15rem}}.footer{background:#000;padding:30px 0;margin-top:600px;font-family:'Play',sans-serif;text-align:center}.footer .row{width:100%;margin:1% 0;padding:.6% 0;color:gray;font-size:.8em}.footer .row a{text-decoration:none;color:gray;transition:.5s}.footer .row a:hover{color:#fff}.footer .row ul{width:100%}.footer .row ul li{display:inline-block;margin:0 30px}.footer .row a i{font-size:2em;margin:0 1%}.footer .row img{width:30px;height:auto}@media only screen and (max-width:768px){nav{height:50px}nav .logo{height:25px;width:auto}.footer{text-align:left;padding:5%}.footer .row ul li{display:block;margin:10px 0;text-align:left}.footer .row a i{margin:0 3%}.footer .row img{width:15px;height:auto}}</style>
</html>