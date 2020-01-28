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
  <!--header en-tête-->
  <header class="container">
    <div class="row">

    <nav class="col-sm-4 text-center" >
      <a class="btn btn-primary" href="Films.php"role="button">Films</a>
      <a class="btn btn-primary" href="index.php"role="button">Accueil</a>
    </nav>
    
  </header>
  <!--end header-->
  <h1>Short film</h1>
<div class="php">
        <?php
          try 
          {
            $user = "root";
            $pass = "Ii&FXxGh";
            $dbh = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
            $requete = 'SELECT genre.nom as genre, film.titre as titre, 
            film.resum as resum, film.duree_min as duree from genre left join 
            film using(id_genre) where genre.nom = "short film"';
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
              echo 'genre: ' . $row['genre'];
              echo '<br />';
              echo 'Resume: ' . $row['resum'];
              echo '<br />';
              echo 'Duree du film: ' . $row['duree']." minutes";
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