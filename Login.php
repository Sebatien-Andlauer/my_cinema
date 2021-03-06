<!DOCTYPE html>
<?php
session_start();

$user = "root";
$pass = "Ii&FXxGh";
$bdd = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND passwd = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['email'] = $userinfo['email'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
    <title>Log in</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
	<link rel="stylesheet" href="CSS/login_style.css" type="text/css"/>      
   </head>
<div class="row">
      <nav class="col-sm-4 text-center" >
        <a class="btn btn-primary" href="Submit.php">S'inscrire ici</a>
        <a class="btn btn-primary" href="index.php"role="button">Accueil</a>
        <a class="btn btn-primary" href="adlog.php"role="button">administrateur</a>
      </nav>
    </div>
   <body>
      <div class="connex">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>