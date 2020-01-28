<?php
session_start();

$user = "root";
$pass = "Ii&FXxGh";
$bdd = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Profil</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
      <link rel="stylesheet" href="CSS/profil_style.css" type="text/css"/>     
   </head>
   <body>
      <div class="affiche">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['email']; ?>
         <br />
         <?php
         if($userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a class="btn btn-primary" href="editprofil.php">Modifier</a>
        <a class="btn btn-primary" href="logout.php"role="button">Log out</a>
         <?php
         }
         ?>
         <form action="formulaireGET.php" method="get">
	<p>
      <label>Titre</label><br>
       <input type="text" name="titre" /><br>
       <label>Jour de visionnage</label><br>
       <input type="date" name="jour_visionnage" /><br>
       <label > Id de la session</label><br>
       <input type="text" name="id_session" /><br>
       <label>Commentaire que je lui donne</label><br>
       <TEXTAREA name="commentaire" rows=4 cols=40>Valeur par défaut</TEXTAREA><br> 
	    <input type="submit" value="Valider" />
	</p>
   </form>
   <a class="btn btn-primary" href="histoprofil.php">historique profil</a>
      </div>
</body>
</html>
<?php   
}
?>