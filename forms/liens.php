<?php
include("connexion.php");
if(isset($_GET['idf'])){
    $id=$_GET['idf'];
    echo($id);
    

$getAllClasseur=$connexion->query("SELECT * FROM tfichier where id='$id'");

while($Infos=$getAllClasseur->fetch()){
    
    $nomfichier='fichier/'.$Infos['corps'];
    header("content-type:application/pdf");
    
    header('Accept-Ranger:bytes');
    @readfile($nomfichier);
  
   
       
   
   
}
}


?>