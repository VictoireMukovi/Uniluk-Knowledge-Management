<?php
include("loginAction.php");
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
        <link href="../css/connexion.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../cdnjs/style.css">
    </head>
    <body>
        <!-- Header-->
        <header class="bg-black py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h3 class="display-4 fw-bolder">Uniluk knowledge management</h3>
                    <p class="lead fw-normal text-white-50 mb-0" style="font-size: 2rem; font-family: Georgia, 'Times New Roman', Times, serif; font-weight: bold;"> Page de connexion</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        





        <section class="py-5">
            <div class="container px-4 px-lg-8 mt-5">
            <div class="container-xl">  
                
                <form method="POST">
                    <div class="col-md-8">
                            <div class="d-flex">
                        
                        <?php
                        //$Message="Mer9i de nous fournir les identités";
                            if(isset($Message)){
                                echo $Message;
                            }
                        ?> 
                        </div>
                        <label for="validationCustom01" class="form-label" >Adresse mail</label>
                        <input type="email" class="form-control" id="validationCustom01" placeholder="vanbienfait@.gmail" name="mail" required>
                        <div class="valid-feedback">
                            Cela semble bon!
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="validationCustom02" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="validationCustom02" placeholder="password" name="password" required>
                        <div class="valid-feedback">
                            
                    </div>
                    
                    </div>
                    <div class="col-10">
                        <button class="btn btn-outline-dark" type="submit" name="btnConnecter">Se connecter</button>
                    </div>
                    <div class="col-10">
                        <button class="btn btn-outline-dark" type="submit"><a href="inscription.php" class="text-reset fw-small">S'inscrire</a></button>
                    </div>
                    
                    
            </div>
                   
                </form>
            </div>
            
        </section>
        <!-- Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php
            include("footer.php");
    ?>
</html>
