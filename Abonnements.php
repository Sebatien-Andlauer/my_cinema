<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

<!--css-->
<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/abo_style.css" type="text/css"/>
<?php session_start();?>
</head>
<!--contenue site-->
<body>
  <!--header en-tête-->
  <header class="container">

      <div class="row">
      <nav class="col-sm-4 text-center" >
        <a class="btn btn-primary" href="Films.php"role="button">Films</a>
        <a class="btn btn-primary" href="Abonnements.php"role="button">Abonnements</a>
        <a class="btn btn-primary" href="Login.php"role="button">Connexion</a>
        <a class="btn btn-primary" href="Submit.php">S'inscrire ici</a>
        <a class="btn btn-primary" href="index.php"role="button">Accueil</a>
      </nav>
      </div>
    </header>
    <div class="php">
    <?php
        try 
        {
        $user = "root";
        $pass = "Ii&FXxGh";
        $dbh = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
        $requete = 'SELECT * from abonnement';
          foreach($dbh->query($requete) as $row) {
              afficherLigne($row);
              //print_r($row);
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
        echo 'Abonnement : ' .  $row['nom'];
        echo '<br />';
        echo 'Prix: ' . $row['prix']. " €";
        echo '<br />';
        echo 'Resume: ' . $row['resum'];
        echo '<br />';
        echo 'Duree de l abonnement: ' . $row['duree_abo']." jour(s)";
        echo '<br />'.'<br />';
      }
        ?>
        </div>
    <!--end header-->
      <!--footer-->
        <footer class="container">
          <div class="row">
          <p class="col-sm-4">&copy; 2019, Sébastien Andlauer</p>
        </div>
          </footer>
          <!--end footer-->
          <!--end contenue site-->
</body>
</html>
