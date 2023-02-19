<?php
require('securityAction.php');
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
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style1.css" rel="stylesheet"/>
         <!-- liaison avec du boostrap -->
         <link rel="stylesheet" href="forms/bootstrap/css/bootstrap.min.css">

        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="forms/styles.css" rel="stylesheet" />
       
        
        <style>
        .form-control{
          border: 1px solid #b3a1a1;
          padding: 8px 10px;
        }
  </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
            <form class="d-flex" method="GET">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php
                            if($_SESSION['fonction']=="Etudiant"){
                                ?>
                                    <a class="navbar-brand" href="#!">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="?idd=<?="activites" ?>">Acceuil</a></li>
                        
                        <li class="nav-item"><a href="?idd=<?="documents" ?>" class="nav-link">Documents</a></li>
                        <li class="nav-item"><a href="?idd=<?="publierdocuments" ?>" class="nav-link" >Publier un fichier</a></li>
                        <li class="nav-item"><a href="forms/logAoutAction.php"class="nav-link">Se déconnecter</a></li>
                        
                    
                    <!--
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                              <a href="forms/inscription.php" class="text-reset fw-small" id="btnNav">votre compte</a> 
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>-->
                    
                                <?php
                            }
                            else{
                                ?>
                                 <a class="navbar-brand" href="#!">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="?idd=<?="activites" ?>">Acceuil</a></li>
                        
                        <li class="nav-item"><a href="?idd=<?="documents" ?>" class="nav-link" >Documents</a></li>
                        <li class="nav-item"><a href="?idd=<?="publierdocuments" ?>" class="nav-link" >Publier un fichier</a></li>
                        <li class="nav-item"><a href="forms/logAoutAction.php"" class="nav-link" >Se déconnecter</a></li>

                        
                        <li class="nav-item"><a href="forms/documents.php" class="nav-link" >Espace_Administration</a></li>

                        </li>

                                <?php
                            }
                ?>

                    </ul>
                </div>
                </form>
            </div>
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                 <form method="POST" action="documentsAcceuil.php">
              <input type="search" class="form-control" name="txtSearch">
              <a class="btn btn-outline-dark" type="submit"  href="?idr=<?="recherche" ?>">Recherche</a>
                </form>
            </div>
          </div>
          
        </div>
      </div>
    </nav>
        </nav>
        <!-- Header-->
        <header class="bg-black py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h3 class="display-4 fw-bolder">Uniluk Knowledge Management</h3>
                    <p class="lead fw-normal text-white-50 mb-0">Nos services</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <?php
        
        include("documentsAcceuil.php");
    ?>
       <center>  <h1 class="card-title">Les Informations: </h1> </center>
    <?php
        include("forms/connexion.php");
            $IDFAC=$_SESSION['faculte'];
            $getFac=$connexion->query("SELECT * FROM tdecanat WHERE id_decanat = $IDFAC ");
            $dataFac=$getFac->fetch();-
            $idfacu=$dataFac['id_decanat'];

            $getActiviter=$connexion->query("SELECT * FROM tactivite WHERE id_decanat = $idfacu ORDER BY id_activite DESC ");

            while ($dataActiviter=$getActiviter->fetch()) {
                ?>
                    <center>
                    <section class="py-5">
                <div  class="container px-4 px-lg-5 mt-5">
                  <div class="card" style="width: 25rem;height: 20rem;">
                  <h5 class="card-title">Faculté de <?= $dataFac['description_decanat']; ?></h5>
                  <?=$dataActiviter['created_at'] ?>                      
                        <center>
                        <h5 class="card-title"><i class="bi bi-file-earmark-word-fill"> <?=$dataActiviter['procedure_activite'] ?> </i></h5>
                        <!--<img src="" width="50px"height="50px">-->
                        <div class="col-md-12">
                            
                            <?=$dataActiviter['description_activite'] ?>
                            
                            
                        </div>
                        <div class="col-md-12">
                        <a href="forms/fichier/<?=$dataActiviter['fichier'];?>" class="btn btn-outline-dark stretched-link">Ouvrir le fichier</a>
                        </div>
                        </center>
                        
                        
                   </div>
                 </div>
            </section>
            </center>
                <!--
                        <section class="py-5">
                                <div class="container px-4 px-lg-3 mt-1">
                                    <div class="card" style="width: 30rem;">
                                    <img src="images/amazon.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h1 class="card-text"><php //$dataActiviter['procedure_activite'] ?></h1>
                                            <p class="card-text"><php //$dataActiviter['description_activite'] ?></p>
                                            <a href="#" class="btn btn-outline-dark stretched-link">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                        </section>-->
                <?php

            }
        
        
        ?>
        
        <!-- Footer-->
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-black text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
            <span>Rejoignez-nous sur les réseaux sociaux :</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 link-secondary">
                <i class="fab fa-github"></i>
            </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3 text-secondary"></i>Uniluk
                </h6>
                <p>
                    Visitez nous sur les réseaux sociaux et ici vous verez tout nos Contacts.
                    Trouvez ici égalements nos Produits.
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                    Nos Produits
                </h6>
                <p>
                    <a href="#!" class="text-reset">Travaux de fin de cycle</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Rapports de stage</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Fiches de côtes</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Livres</a>
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                    Liens utiles    
                </h6>
                <p>
                    <a href="service.php" class="text-reset">Acceuil</a>
                </p>
                <p>
                    <a href="forms/documents.php" class="text-reset">Affichage</a>
                </p>
                <p>
                    <a href="forms/inscription.php" class="text-reset">Inscription</a>
                </p>
                <p>
                    <a href="#!" class="text-reset">Aide</a>
                </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Nos Contacts</h6>
                <p><i class="fas fa-home me-3 text-secondary"></i>Lukanga,Uniluk, Maison N°5</p>
                <p>
                    <i class="fas fa-envelope me-3 text-secondary"></i>
                    vanbienfait@.gmail
                </p>
                <p><i class="fas fa-phone me-3 text-secondary"></i> +243 971 964 715</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022 Copyright:
            <a class="text-reset fw-small" href="#">Bienfait Vanghahi</a>
        </div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php 
     if(isset($_GET['idd'])){

        $id= $_GET['idd'];
        
    
        if($id=="documents"){

            echo($id);
        }
    }
?>