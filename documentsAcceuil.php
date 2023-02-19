<link rel="stylesheet" href="cdnjs/style.css">
<link rel="stylesheet" href="forms/bootstrap/css/bootstrap.min.css">
<style>
        .form-control{
          border: 1px solid #b3a1a1;
          padding: 8px 10px;
        }
  </style>
<?php 
     if(isset($_GET['idd'])){

        $id= $_GET['idd'];
        
 
include("forms/connexion.php");
        if($id=="documents"){?>
            <center>  <h1 class="card-title">Les Ouvrages: </h1> </center>
            <?php
            
            //TFC
            ?>
            <center>  <h4 class="card-title">Les TFC: </h4> </center>
            <?php
            $idfac=$_SESSION['faculte'];
           // echo($idfac);
            $getAllClasseur=$connexion->query("SELECT * FROM tclasseur  WHERE  id_faculte=$idfac AND description='Travaux de fin de cycle' ");
            $clsr=$getAllClasseur->fetch();
            $idClsr=$clsr['id_classeur'];
            echo($idClsr);
            




            $getAllFile=$connexion->query("SELECT * FROM tfichier WHERE id_classeur=$idClsr ORDER BY id DESC  ");

            
    if($getAllFile->rowCount()>0){

        while($file=$getAllFile->fetch()){?>
        
        

            <!-- Section-->
             <section class="py-5">
             
                <div class="container px-4 px-lg-5 mt-5">
                    <center>
                  <div class="card" style="width: 24rem;height: 17rem;">
                        
                        
                        
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                   
                         echo($file['description_fichier']) ; ?>  </i></h5>
                        <p class="card-text">
               
               </p>
                         <form method="GET">
                               <a href="forms/liens.php?idf=<?=$file['id'];?>" class="btn btn-outline-dark stretched-link">Ouvrir le fichier</a>
                               <a href="forms/liens.php?idf=<?=$file['id'];?>" class="btn btn-outline-dark stretched-link">Telecharger</a>
                        </form>
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                        $idU=$file['id_utilisateur'];
                        $getUserPublier=$connexion->query("SELECT * FROM tutilisateurs WHERE id=$idU");
                        $getU=$getUserPublier->fetch();
                         echo("Publier par: ".$getU['nom']." ".$getU['prenom']) ; ?>  </i><!--<img src="fichier/<?php //$getU['photo'] ?>" width="50px"height="50px" border-radius="100px 100px 100px 100px">--></h5>

                        <h6 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                   
                                 echo("En date du ".$file['created_at']) ; ?>  </i></h6>
                        
                   </div>
                 </center>
                 </div>
            </section>
          
   
       <?php 
       }

    }
    ///Fin TFC
    //Debut Projet Tuto
    ?>
    <center>  <h4 class="card-title">Les Projets Tutauré: </h4> </center>
    <?php
    $idfac=$_SESSION['faculte'];

    $getAllClasseurP=$connexion->query("SELECT * FROM tclasseur  WHERE  id_faculte=$idfac AND description='Projets Tutauré' ");
    $clsrP=$getAllClasseurP->fetch();
    $idClsrP=$clsrP['id_classeur'];
    //echo($idClsr);





    $getAllFileP=$connexion->query("SELECT * FROM tfichier WHERE id_classeur=$idClsrP ORDER BY id DESC");

    
if($getAllFileP->rowCount()>0){

while($fileP=$getAllFileP->fetch()){?>



    <!-- Section-->
     <section class="py-5">
     
        <div class="container px-4 px-lg-5 mt-5">
            <center>
          <div class="card" style="width: 24rem;height: 17rem;">
                
                
                
                <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
           
                 echo($fileP['description_fichier']) ; ?>  </i></h5>
                <p class="card-text">
       
       </p>
                 <form method="GET">
                       <a href="forms/liens.php?idf=<?=$fileP['id'];?>" class="btn btn-outline-dark stretched-link">Ouvrir le fichier</a>
                       <a href="forms/liens.php?idf=<?=$fileP['id'];?>" class="btn btn-outline-dark stretched-link">Telecharger</a>
                </form>
                <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                $idUP=$fileP['id_utilisateur'];
                $getUserPublierP=$connexion->query("SELECT * FROM tutilisateurs WHERE id=$idUP");
                $getUP=$getUserPublierP->fetch();
                 echo("Publier par: ".$getUP['nom']." ".$getUP['prenom']) ; ?>  </i><!--<img src="fichier/<?php //$getU['photo'] ?>" width="50px"height="50px" border-radius="100px 100px 100px 100px">--></h5>

                <h6 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
           
                         echo("En date du ".$fileP['created_at']) ; ?>  </i></h6>
                
           </div>
         </center>
         </div>
    </section>
  

<?php 
}

}
//FinProj Tutore
 //Debut Rapport de stage
 ?>
 <center>  <h4 class="card-title">Les Rapports des stages: </h4> </center>
 <?php
 $idfac=$_SESSION['faculte'];

 $getAllClasseurPR=$connexion->query("SELECT * FROM tclasseur  WHERE  id_faculte=$idfac AND description='Rapport de Stage' ");
 $clsrPR=$getAllClasseurPR->fetch();
 $idClsrPR=$clsrPR['id_classeur'];
 //echo($idClsr);





 $getAllFilePR=$connexion->query("SELECT * FROM tfichier WHERE id_classeur=$idClsrPR ORDER BY id DESC");

 
if($getAllFilePR->rowCount()>0){

while($filePR=$getAllFilePR->fetch()){?>



 <!-- Section-->
  <section class="py-5">
  
     <div class="container px-4 px-lg-5 mt-5">
         <center>
       <div class="card" style="width: 24rem;height: 17rem;">
             
             
             
             <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
        
              echo($filePR['description_fichier']) ; ?>  </i></h5>
             <p class="card-text">
    
    </p>
              <form method="GET">
                    <a href="forms/liens.php?idf=<?=$filePR['id'];?>" class="btn btn-outline-dark stretched-link">Ouvrir le fichier</a>
                    <a href="forms/liens.php?idf=<?=$filePR['id'];?>" class="btn btn-outline-dark stretched-link">Telecharger</a>
             </form>
             <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
             $idUPR=$filePR['id_utilisateur'];
             $getUserPublierPR=$connexion->query("SELECT * FROM tutilisateurs WHERE id=$idUPR");
             $getUPR=$getUserPublierPR->fetch();
              echo("Publier par: ".$getUPR['nom']." ".$getUPR['prenom']) ; ?>  </i><!--<img src="fichier/<?php //$getU['photo'] ?>" width="50px"height="50px" border-radius="100px 100px 100px 100px">--></h5>

             <h6 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
        
                      echo("En date du ".$filePR['created_at']) ; ?>  </i></h6>
             
        </div>
      </center>
      </div>
 </section>


<?php 
}

}
//Fin Rapport de stage
            
    
       }elseif($id=="publierdocuments"){
        $idfac=$_SESSION['faculte'];
        $getClasseur=$connexion->query("SELECT *FROM tclasseur WHERE id_faculte=$idfac LIMIT 3 ");
        ?>
          
        <!-- Section-->
        <center>
              <!-- Section-->
              <section class="">
                <div  class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 30rem; height:23rem;">
                        
                        
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"> Publier ouvrage </i></h5>
                        <form method='POST' enctype="MULTIPART/FORM-DATA">
                            <p class="card-text">
                            <div class="col-md-12">
                                        <label for="">Titre de l'Ouvrage</label>
                                        <input  required  class="form-control" type="text" name="description_fichier" placeholder="Entrez la description ">                            
                            </div>
                            <div class="col-md-12">
                                        <label for="">Type d'ouvrage</label>
                                        <select class="form-control" id="idclasseur" name="idclasseur" placeholder="Choisir facullté" >
                                            <?php 
                                                $classeur=$getClasseur->fetchAll();

                                                foreach ($classeur as $fa) {
                                                    ?>
                                                        <option value=<?= $fa['id_classeur'] ; ?>><?= $fa['id_classeur']." ".$fa['description'] ; ?></option>
                                                    <?php 
                                                    
                                                }
                                            ?>
                                

                            
                                         </select>  
                                                                  
                            </div>
                            <div class="col-md-12">
                                        <label for="">Choisir fichier</label>
                                        <input  class="form-control" type="file" name="nomfichier" required >                            
                            </div>

                            
                            </p>
                            <button name="btnPub" class="btn btn-primary">Publier le fichier </button>

                        </form>
                        
                        
                   </div>
                 </div>
            </section>
        </center>
        <?php
       }
    }

    
    if(isset($_GET['idr'])){

        $id= $_GET['idr'];
        if($id=="recherche"){
           echo "bb";
           $txtSearch=$_POST['txtSearch'];
           echo $txtSearch;
        }
        
       
    }
    if (isset($_POST['btnPub'])) {
        # Gestion Image
        
        $nomfichier=$_FILES["nomfichier"]["name"];

        $_FILES["nomfichier"]["tmp_name"];

       $sizefile= $_FILES["nomfichier"]["size"];

       $typefile= $_FILES["nomfichier"]['type'];
       $fileExxtension=strrchr($nomfichier,".");
       $extensionAutorisees=array('.pdf','.PDF');
       if ($sizefile<41943040 ) {
           # code...

           if (in_array($fileExxtension,$extensionAutorisees)) {
               # code...
               
           move_uploaded_file($_FILES["nomfichier"]["tmp_name"],"fichier/".$_FILES["nomfichier"]["name"]);

           
           //Recuperation des données
          // $annee=$_POST['annee'];
           $classeur=$_POST['idclasseur'];
           // $idutilisateur=$_SESSION['id'];
            $description=$_POST['description_fichier'];
           // $idtypefichier=$_POST['typefichier'];
            $id=$_SESSION['id'];


            #Requete insertion 41943040
            $InsertFile= $connexion->prepare("INSERT INTO tfichiertemp(description_fichier,id_classeur,id_utilisateur,corps)VALUES(?,?,?,?)");
            
            $InsertFile->execute(array($description,$classeur,$id,$nomfichier));
            ?>
                <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
                <script>
                            swal("Fichier ajouter à la fil d'attente avec success","Les administrateurs vont dévoir examiner l'ouvrage avant de le rendre public ! Merci de patienter ! ","success");
                        
                </script>
            <?php
           }
        }
    }
?>