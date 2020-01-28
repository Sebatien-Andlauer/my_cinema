<!DOCTYPE html>
<htlm>
<head>
  <meta charset="utf-8">

<!--css-->
<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/genre_style.css" type="text/css"/>
</head>
<!--contenue site-->
<body>
    <h1>Historique film</h1>
<div class="php">
<?php
          try 
          {
            $user = "root";
            $pass = "Ii&FXxGh";
            $dbh = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
            $requete = 'SELECT * from films_deja_vue';
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
              echo 'films : ' .  $row['titre'];
              echo '<br />';
              echo 'vue le: ' . $row['jour_visionnage'];
              echo '<br />';
              echo 'Commentaire: ' . $row['commentaire'];
              echo '<br />'.'<br />';
            }
        ?>
        </div>
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