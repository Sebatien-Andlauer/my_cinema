<?php

	$id_film= $_GET["id_film"];
	$id_genre = $_GET["id_genre"];
	$id_distrib = $_GET["id_distrib"];
	$titre= $_GET["titre"];
	$resum = $_GET["resum"];
	$date_debut = $_GET["date_debut_affiche"];
	$date_fin = $_GET["date_fin_affiche"];
	$duree_min = $_GET["duree_min"];
	$anee_prod = $_GET["annee_prod"];

	try {
		$user = "root";
		$pass = "Ii&FXxGh";
	    $conn = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $sql = "INSERT INTO film (id_film, id_genre, id_distrib, titre, resum,
		 date_debut_affiche, date_fin_affiche, duree_min, annee_prod)
	    VALUES ('$id_film', '$id_genre', '$id_distrib', '$titre', '$resum', 
		'$date_debut', '$date_fin', '$duree_min', '$anee_prod')";
	    // use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully";
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

$conn = null;

?>