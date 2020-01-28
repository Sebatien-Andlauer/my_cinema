<?php
 try 
 {
 $user = "root";
 $pass = "Ii&FXxGh";
 $dbh = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
 
 } 
catch (PDOException $e) 
{
   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
}