<?php

$titre = $_GET["titre"];
$jour = $_GET["jour_visionnage"];
$com = $_GET["commentaire"];
$id = $_GET["id_session"];

$user = "root";
$pass = "Ii&FXxGh";


	try {
	    $conn = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $sql = "INSERT INTO films_deja_vue (titre, jour_visionnage, id_session, commentaire)
	    VALUES ('$titre', '$jour', '$id', '$com')";
	    // use exec() because no results are returned
		$conn->exec($sql);
		header("Location: profil.php?id=".$_SESSION['id']);
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

$conn = null;


?>