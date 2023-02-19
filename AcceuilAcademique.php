<?php
require('forms/securityAction.php');
?>
        
        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="styles.css" rel="stylesheet" />
        <link href="css/documents.css" rel="stylesheet"/>

        <!-- liaison avec du boostrap -->
        <link rel="stylesheet" href="forms/bootstrap/css/bootstrap.min.css">

    </head>
    <body>
    
    
        
        
         <?php 
        // include('navbar.php'); 
       
         include('sidebarAcademique.php'); 
        
                                    ?>
        
                 <?PHP 
              include('testAcademique.php');
/*
                 if (isset($_GET['btnclasseur'])){
                    

                    
                    
                    if(isset($_GET['id'])){

                        $id= $_GET['id'];
                        echo($id);
                    }

                    include("connexion.php");
                                            $getAllFile=$connexion->query("SELECT * FROM tfichier WHERE id_classeur=$id");
                                            while($file=$getAllFile->fetch()){
                                                header('Location:documents.php')
                                                ?>
                                                
                                                <a href="#" class="text-reset fw-small">
                                                <div class="card" style="width: 10rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"><?php echo($file['description_fichier']) ; ?>  </i></h5><br>
                                                        <p class="card-text"></p>
                                                        
                                                    </div>
                                                </div>
                                                </a>

                                            <?php 
                                            }
                                         

                                    

                                }
                                          */ ?>



            </div>
         
          <?php  //include("connexion.php");         ?>
        
     
</html>


