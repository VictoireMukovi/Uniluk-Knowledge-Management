<?php
//creer un bd
$serveur="localhost";
$login="root";
$pass="";
try{
$connexion= new PDO("mysql:host=localhost",$login,$pass);
$connexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$connexion->exec("CREATE DATABASE IF NOT EXISTS BD_KM");
echo'base des donnees creer';}
catch(PDOException $e){
	echo 'echec de la connection:' .$e->getMessage();
}
?>