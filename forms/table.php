<?php
//C'est ici que nous allons creé toutes nos tables
include("connexion.php");//Inclusion de la page de connexion
try{
$tdecanat="CREATE TABLE IF NOT EXISTS `BD_KM`.`tdecanat`  ( `id_decanat` INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY , `description_decanat` VARCHAR(50) NOT NULL ) ENGINE = InnoDB;";
$tactivite="CREATE TABLE IF NOT EXISTS `BD_KM`.`tactivite` ( `id_activite` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `description_activite` VARCHAR(50) NOT NULL , `procedure_activite` VARCHAR(50) NOT NULL , `id_decanat` INT(2) NOT NULL) ENGINE = InnoDB;";
$tutilisateur="CREATE TABLE IF NOT EXISTS `BD_KM`.`tutilisateurs` (`id` int  NOT NULL AUTO_INCREMENT PRIMARY KEY ,`nom` VARCHAR(50) NOT NULL , `prenom` VARCHAR(50) NOT NULL , `mail` VARCHAR(50) NOT NULL , `fonction` VARCHAR(50) NOT NULL , `faculte` VARCHAR(50) NOT NULL , `nationalite` VARCHAR(50) NOT NULL , `telephone` VARCHAR(50) NOT NULL , `photo` BLOB NOT NULL,`password` VARCHAR(50) NOT NULL ) ENGINE = InnoDB; ";
$tanne="CREATE TABLE IF NOT EXISTS`BD_KM`.`tannee` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `description` VARCHAR(50) NOT NULL ) ENGINE = InnoDB;  ";
$tfichier="CREATE TABLE IF NOT EXISTS`BD_KM`.`tfichier`( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `description_fichier` VARCHAR(50) NOT NULL , `id_classeur` INT NOT NULL , `id_utilisateur` INT NOT NULL , `id_type_fichier` INT NOT NULL , `id_anee` INT NOT NULL , `corps` BLOB NOT NULL ) ENGINE = InnoDB;  ";
$ttypefichier="CREATE TABLE IF NOT EXISTS `BD_KM`.ttypefichier( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `description` VARCHAR(50) NOT NULL ) ENGINE = InnoDB;  ";

$tfichier_temp="CREATE TABLE `bd_km`.`tfichiertemp` ( `id` INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY, `description_fichier` VARCHAR(50) NOT NULL , `id_classeur` INT(11) NOT NULL , `id_utilisateur` INT(11) NOT NULL , `corps` BLOB NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `statut` INT NOT NULL DEFAULT '0' ) ENGINE = InnoDB; ";



$alterTfichier="ALTER TABLE `tfichier` ADD `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `corps`; ";
$alterActiviter="ALTER TABLE `tactivite` ADD `fichier` BLOB NOT NULL AFTER `id_decanat`;  ";
$alterUsers="ALTER TABLE `tactivite` ADD `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `fichier`; ";



$tclasseur="CREATE TABLE IF NOT EXISTS `BD_KM`.tclasseur( `id_classeur` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `description` VARCHAR(50) NOT NULL, `id_faculte` INT NOT NULL ) ENGINE = InnoDB;  ";

//$tclasseur="CREATE TABLE `bd_km`.`essaie` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `image` BLOB NOT NULL ) ENGINE = InnoDB;  ";



$connexion->exec($tdecanat);
$connexion->exec($tutilisateur);
$connexion->exec($tactivite);
$connexion->exec($tanne);
$connexion->exec($tfichier);
$connexion->exec($ttypefichier);
$connexion->exec($tclasseur);
$connexion->exec($tfichier_temp);
$connexion->exec($alterActiviter );
$connexion->exec($alterUsers );
$connexion->exec($alterTfichier );

}
catch(PDOException $e){
	echo 'echec de la connection:' .$e->getMessage();
}
?>