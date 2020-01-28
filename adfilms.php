<html>
   <head>
      <title>Profil</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
      <link rel="stylesheet" href="CSS/admin_style.css" type="text/css"/>     
   </head>
   <body>
      <div class="affiche">
      <form action="adfilmGET.php" method="get">
	    <p>
            <label>Id_film</label><br>
            <input type="text" name="id_film" /><br>
            <label>Id_genre</label><br>
            <input type="text" name="id_genre" /><br>            
            <label>Id_distrib</label><br>
            <input type="text" name="id_distrib" /><br>
            <label>Titre</label><br>
            <input type="text" name="titre" /><br>
            <label>Resum</label><br>
            <input type="text" name="resum" /><br>
            <label>Date debut affiche</label><br>
            <input type="date" name="date_debut_affiche" /><br>
            <label>Date fin affiche</label><br>
            <input type="date" name="date_fin_affiche" /><br>
            <label > Duree_min</label><br>
            <input type="text" name="duree_min" /><br>
            <label > Annee_prod</label><br>
            <input type="text" name="annee_prod" /><br>
	        <input type="submit" value="Valider" />
	    </p>
        </form>