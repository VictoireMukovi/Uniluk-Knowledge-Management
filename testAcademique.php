<link rel="stylesheet" href="cdnjs/style.css">
<style>
        .form-control{
          border: 1px solid #b3a1a1;
          padding: 8px 10px;
        }
  </style>
<?php 


?>
               
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-10">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="serviceAcademique.php">Acceuill</a></li>
                <li class="nav-item"><a class="nav-link" href="?id=<?='pblfichier'?>">Publier un fichier</a></li>
                <li class="nav-item"><a class="nav-link" href="?id=<?='clsr'?>">Ajouter Classeur</a></li>
                <li class="nav-item"><a class="nav-link"   href="?id=<?='pblactivite'?>">Publier un activité</a></li>
                <li class="nav-item"><a class="nav-link"   href="?id=<?='ajoutfac'?>">Ajouter une faculte</a></li>
                <li class="nav-item"><a class="nav-link"href="forms/logAoutAction.php" >Déconnexion</a></li>

                
            </ul>
            
           
            
            
        </div>
    </div>
</nav>
<?php













 //session_start();

 include("forms/connexion.php");
 
                    
 if(isset($_GET['id'])){

    $id= $_GET['id'];
    

    if($id=="clsr"){

      //Chargement du clé étranger faculté
                        include("forms/connexion.php");
                        $idDec=$_SESSION['faculte'];
                        $getFac=$connexion->query("SELECT *FROM tdecanat WHERE id_decanat=$idDec");
        ?>

        <!-- Section-->
             <section class="py-5">
                <div  class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 30rem;">
                        
                        <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"> Ajouter un Classeur </i></h5>
                        <form method='POST'>
                            <p class="card-text">
                            <div class="col-md-12">
                                        <label for="">Description</label>
                                        <input  class="form-control" type="text" name="description" placeholder="Entrez la description " required>                            
                            </div>
                                                       
                            </p>
                            <button name="btnEnregClsr" class="btn btn-primary ">Enregistrer </button>
                        </form>
                        
                        </div>
                   </div>
                 </div>
            </section>
            <?php

    }elseif ($id=="pblfichier") {
        $idfac=$_SESSION['faculte'];
        $getClasseur=$connexion->query("SELECT *FROM tclasseur WHERE id_faculte= $idfac");


        ?>

        <!-- Section-->
             <section class="">
                <div  class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 30rem;">
                        
                        <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"> Publier fichier </i></h5>
                        <form method='POST' enctype="MULTIPART/FORM-DATA">
                            <p class="card-text">
                            <div class="col-md-12">
                                        <label for="">Description fichier</label>
                                        <input  class="form-control" type="text" name="description_fichier" placeholder="Entrez la description ">                            
                            </div>
                            <div class="col-md-12">
                                        <label for="">Classeur</label>
                                        <select class="form-contro" id="idclasseur" name="idclasseur" placeholder="Choisir facullté" >
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
                                        <input  class="form-control" type="file" name="nomfichier" >                            
                            </div>

                            
                            </p>
                            <button name="btnPub" class="btn btn-primary ">Publier le fichier </button>
                        </form>
                        
                        </div>
                   </div>
                 </div>
            </section>
            <?php
    }elseif ($id=="pblactivite") {
        $idfac=$_SESSION['faculte'];
        $getClasseur=$connexion->query("SELECT *FROM tclasseur WHERE id_faculte= $idfac");


        ?>

        <!-- Section-->
             <section class="">
                <div  class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 30rem;">
                        
                        <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"> Publier une activité</i></h5>
                        <form method='POST' enctype="MULTIPART/FORM-DATA">
                        <p class="card-text">  
                            <div class="col-md-12">
                                        <label for="">Titre activité</label>
                                        <input required="required" class="form-control" type="text" name="titre_activiter" placeholder="Entrez le titre de l'activiter ">                            
                            </div>
                            <div class="col-md-12">
                                        <label for="">Description de l'activité</label>
                                        <textarea required="required" class="form-control" type="text" name="description_activiter" placeholder="Entrez la description de l'activiter "> </textarea>                           
                            </div>
                            <div class="col-md-12">
                                        <label for="">Joindre un fichier</label>
                                        <input class="form-control" type="file" name="fichier_activiter" placeholder="Joindre un fichier ">                        
                            </div>
                            
                        </p>

                            
                            
                            <button name="btnEnregActiviter" class="btn btn-primary ">Publier activité </button>
                        </form>
                        
                        </div>
                   </div>
                 </div>
            </section>
            <?php
    }
    elseif ($id=="ajoutfac") {
        $idfac=$_SESSION['faculte'];
        $getClasseur=$connexion->query("SELECT *FROM tclasseur WHERE id_faculte= $idfac");


        ?>

        <!-- Section-->
             <section class="">
                <div  class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 30rem;">
                        
                        <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"> Enregistrer une faculté</i></h5>
                        <form method='POST' enctype="MULTIPART/FORM-DATA">
                        <p class="card-text">  
                            <div class="col-md-12">
                                        <label for="">Description de la faculté</label>
                                        <input required="required" class="form-control" type="text" name="description_fac" placeholder="Entrez la description de la faculté ">                       
                            </div>
                            
                            
                        </p>

                            
                            
                            <button name="btnEnregFac" class="btn btn-primary ">Ajouter une faculté </button>
                        </form>
                        
                        </div>
                   </div>
                 </div>
            </section>
            <?php
    }
    else{
            
    $getAllFile=$connexion->query("SELECT * FROM tfichier WHERE id_classeur=$id");
    //Vérification si une recherche à été rentrer par l'Utilisateur
    if (isset($_POST['Btnsearch']) ) {
       // $userSearch=$_GET['search'];
        ?>
            <script>
                alert(<?= "Bhonjour"?>);
            </script>
        <?php
       // echo($userSearch);

        $getAllFile=$connexion->query("SELECT * FROM tfichier WHERE description_fichier LIKE'%'.$usrSearch.'%' ");
    }

    if($getAllFile->rowCount()>0){

        while($file=$getAllFile->fetch()){?>
        
        

            <!-- Section-->
             <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 24rem;">
                        
                        <div class="card-body">
                        
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                   
                         echo($file['description_fichier']) ; ?>  </i></h5>
                        <p class="card-text">
               
               </p>
                         <form method="GET">
                               <a href="forms/liens.php?idf=<?=$file['id'];?>" class="btn btn-outline-dark stretched-link">Ouvrir le fichier</a>
                               <a href="#" download="forms/fichier/<?=$file['corps'];?>" class="btn btn-outline-dark stretched-link">Telecharger</a>
                        </form>
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                        $idU=$file['id_utilisateur'];
                        $getUserPublier=$connexion->query("SELECT * FROM tutilisateurs WHERE id=$idU");
                        $getU=$getUserPublier->fetch();
                         echo("Publier par: ".$getU['nom']." ".$getU['prenom']) ; ?>  </i><img src="fichier/<?= $getU['photo'] ?>" width="50px"height="50px" border-radius="100px 100px 100px 100px"></h5>

                        <h6 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php 
                   
                                 echo("En date du ".$file['created_at']) ; ?>  </i></h6>
                        </div>
                   </div>
                 </div>
            </section>
          
   
       <?php 
       }

    }
    else{
        ?>
        
            <script>
                        swal("Cette classeur est encore vide","Clique pour continuer","error");
                    
            </script>
    <?php
        
        $_SESSION['message']="Cette classeur est vide";
        //unset($_SESSION['message']);
    }
    
    }

 



    ///Publication d'un fichier pblfichier


    
}
else{
    ?>
    <script>
                swal("Cette classeur est encore vide","Clique pour continuer","error");
               
    </script>
    <?php
}

?>
         
<?php 
//Insertion classeur
//include('connexion.php');
        if(isset($_POST['btnEnregClsr'])){
            if(!empty($_POST['description'])){
            $description= $_POST['description'];
            
            $InsertIntoClassuer= $connexion->prepare("INSERT INTO tclasseur(description,id_faculte) VALUES(?,?)");
            $InsertIntoClassuer->execute(array($description,0));

            $_POST['description']="";
            
            unset($_COOKIE['description']);
           ?>
           <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
           <script>
                swal("Classeur enregistrer avec success","Clique pour continuer","success");
               
           </script>
           <?php
        }else{
            ?>
            <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
            <script>
                 swal("Completer touts les shamp d'abord","Clique pour continuer","error");
                
            </script>
            <?php
        }
    }
        elseif(isset($_POST['btnEnregActiviter'])){


                 # Gestion Image
            
            $nomfichier=$_FILES["fichier_activiter"]["name"];

            $_FILES["fichier_activiter"]["tmp_name"];

           $sizefile= $_FILES["fichier_activiter"]["size"];

           $typefile= $_FILES["fichier_activiter"]['type'];
           $fileExxtension=strrchr($nomfichier,".");
           $extensionAutorisees=array('.pdf','.PDF');
           if ($sizefile<41943040 ) {
               # code...

               if (in_array($fileExxtension,$extensionAutorisees)) {
                   # code...
                   
               move_uploaded_file($_FILES["fichier_activiter"]["tmp_name"],"fichier/".$_FILES["fichier_activiter"]["name"]);

               
               $descriptionActiviter= $_POST['description_activiter'];
            $titreActiviter= $_POST['titre_activiter'];
            $idfac=$_SESSION['faculte'];
            $getClasseur=$connexion->query("SELECT *FROM tclasseur WHERE id_faculte= $idfac");
            $IDFAC=$getClasseur->fetch();
            $InsertIntoActiviter= $connexion->prepare("INSERT INTO tactivite(description_activite,procedure_activite,id_decanat,corps) VALUES(?,?,?,?)");
            $InsertIntoActiviter->execute(array($descriptionActiviter,$titreActiviter,$idfac,$nomfichier));
                ?>
                    <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Fichier publier avec success","Clique pour continuer","success");
                        
                    </script>
                <?php
               }
               else {
                ?>
                <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
                <script>
                        swal("Type de fichier non prise en charge","Choissisez un fichier pdf svp","error");
                    
                </script>
                <?php
               }
           }else {
            ?>
            <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
           <script>
                swal("Fichier trop grand","Le maximum des fichiers à publier est de 41943040 byte","error");
               
           </script>
            
            <?php
           }

           
            //Fin Gestion Image






            ///////////////////////////
            
           
        }
        elseif (isset($_POST['btnPub'])) {
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
                $InsertFile= $connexion->prepare("INSERT INTO tfichier(description_fichier,id_classeur,id_utilisateur,corps)VALUES(?,?,?,?)");
                
                $InsertFile->execute(array($description,$classeur,$id,$nomfichier));
                ?>
                    <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Fichier publier avec success","Clique pour continuer","success");
                        
                    </script>
                <?php
               }
               else {
                ?>
                <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
                <script>
                        swal("Type de fichier non prise en charge","Choissisez un fichier pdf svp","error");
                    
                </script>
                <?php
               }
           }else {
            ?>
            <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
           <script>
                swal("Fichier trop grand","Le maximum des fichiers à publier est de 41943040 byte","error");
               
           </script>
            
            <?php
           }

           
            //Fin Gestion Image

        }
        //Enregistrer Faculté
        elseif (isset($_POST['btnEnregFac'])) {
            

               
               //Recuperation des données
              
                $description=$_POST['description_fac'];
              
    
    
                #Requete insertion 41943040
                $InsertFile= $connexion->prepare("INSERT INTO tdecanat(description_decanat)VALUES(?)");
                
                $InsertFile->execute(array($description));
                ?>
                    <script rel="stylesheet" src="cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Faculté enregistrer avec success","Clique pour continuer","success");
                        
                    </script>
                <?php

           
            //Fin Gestion Image

        }



?>
<?php
               if(isset($_POST["btnEnreg"])){
                   include("fichier.php");
                   echo "bonjour";
               }
               ?>

               











