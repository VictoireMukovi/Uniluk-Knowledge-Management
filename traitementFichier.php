<?php
include("forms/connexion.php");
if(isset($_GET['idf'])){
    $id=$_GET['idf'];
    echo($id);
    

$getAllClasseur=$connexion->query("SELECT * FROM tactivite WHERE id_activite='$id'");

while($Infos=$getAllClasseur->fetch()){
    
    $nomfichier='forms/fichier/'.$Infos['corps'];
    header("content-type:application/pdf");
    
    header('Accept-Ranger:bytes');
    @readfile($nomfichier);
  
   
       
   
   
}
}


?>