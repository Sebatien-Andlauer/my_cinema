<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Administration</title>
   <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
  <link rel="stylesheet" href="CSS/admin_style.css" type="text/css"/> 
</head>
<a class="btn btn-primary"
  href="http://localhost/phpMyAdmin/sql.php?server=1&db=cinema&table=film&pos=0">Delete </a>
<body>
    <div class="film">
<?php

try 
{
  $user = "root";
  $pass = "Ii&FXxGh";
  $dbh = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
  $requete = 'SELECT titre from film';
  foreach($dbh->query($requete) as $row) {
    afficherLigne($row);
    }
  $dbh = null;
} 
catch (PDOException $e) 
  {
   print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
function afficherLigne($row) 
  {
    echo 'Titre: ' . $row['titre'];
    echo '<br />'.'<br />';
  }
?>
</div>
   
</body>
</html>