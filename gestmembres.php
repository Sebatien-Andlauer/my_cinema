
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Administration</title>
   <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
  <link rel="stylesheet" href="CSS/admin_style.css" type="text/css"/> 
</head>
<body>
<?php

try 
{
  $user = "root";
  $pass = "Ii&FXxGh";
  $dbh = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
  $requete = 'SELECT * from membres';
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
    echo 'Id: ' .  $row['id'];
    echo '<br />';
    echo 'Pseudo: ' . $row['pseudo']. " ".
"<a href=\"http://localhost/phpMyAdmin/sql.php?db=cinema&table=user&pos=0\">
 Delete </a>";
    echo '<br />';
    echo 'Email: ' . $row['email'];
    echo '<br />'.'<br />';
  }
?>

   
</body>