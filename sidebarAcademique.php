<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="pagestyle" href="forms/assets/css/material-dashboard.min.css" rel="stylesheet" />

    <title>Document</title>
</head>
<body>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
    <center><h5  class="ms-1 font-weight-bold text-white" >
        Connecté comme: 
        <span class="bg-gradient-primary mt-4 w-100" type="submit">
                   <?= $_SESSION['nom']." ".$_SESSION['prenom'];?>
        </span><br> 
        <?php 
        include("forms/connexion.php");
            $decanat=$_SESSION['faculte'];
            $selectFac=$connexion->query("SELECT * FROM tdecanat WHERE id_decanat=$decanat");
            $getFac=$selectFac->fetch();
        ?>
        <?php echo ($_SESSION['fonction']." ".$getFac['description_decanat']);?>     
    </h5></center>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
          <span class="ms-1 font-weight-bold text-white">Les Classeurs</span>
      </a>
    </div>
    <br><br><br><br>
    <hr class="horizontal light mt-0 mb-2">
    

                       <?php 
                       
                        ?>
                        
                        
                        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
                        <form method="GET"> 
                        <ul class="navbar-nav">
                        <?php
                          $getAllClasseur=$connexion->query("SELECT *FROM tclasseur WHERE description='Rapport Administratif'");

                        while($Infos=$getAllClasseur->fetch()){


                            //include("connexion.php");
                            $idfacu=$Infos['id_faculte'];
                            $getFac=$connexion->query("SELECT *FROM tdecanat WHERE id_decanat=$idfacu ");
                            //$getAllClasseur->execute(array(1));
                            $dec=$getFac->fetch();

                        ?>

  
                              <li class="nav-item">
                                <a class="nav-link text-white active bg-gradient" href="?id=<?=$Infos['id_classeur']; ?>">
                            
                                  <span class="nav-link-text ms-1"><?php echo($Infos['description']." ".$dec['description_decanat'])?></span>
                                </a>
                              </li>
                              
                        
                             
                        <?php 
                        }
                        ?>
                    </ul>
                 </form>
                </div> 
                

                        
                    
                    
    
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="forms/logAoutAction.php" type="button">Déconnexion</a>
      </div>
    </div>
  </aside>
</body>
</html>
<?php 
                    
                        if(isset($_POST['btnClasseur'])){
                              include('classeur.php');
                        }
                        
?>





 
                   