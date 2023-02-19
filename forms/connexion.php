<?php
//session_start();
$serveur="localhost";
$login="root";
$pass="";
try{
$connexion= new PDO("mysql:host=localhost;dbname=BD_KM",$login,$pass);
$connexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//echo'connexion re';
}
catch(PDOException $e){
	echo 'echec de la connection:' .$e->getMessage();
}
//session_distroy(); 
?>