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
      <link rel="stylesheet" href="CSS/admin_style.css" type="text/css"/>     
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
        <a class="btn btn-primary" href="gestmembres.php"role="button">Gestion membres</a>
        <a class="btn btn-primary" href="adfilms.php"role="button">Ad films</a>
        <a class="btn btn-primary" href="deletfilms.php"role="button">Delete films</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>