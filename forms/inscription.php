<?php
    include("inscriptionAction.php");
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
        <link href="../css/style1.css" rel="stylesheet"/>

        <!-- liaison avec du boostrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../cdnjs/style.css">

    </head>
    <body>
        <?php
            include("entete.php");
            // include("inscription.php");
        ?>
        <section class="py-5">
            <div class="container-xl">  
                <div class="d-flex">
                <?php
                //$Message="Mer9i de nous fournir les identités";
                    if(isset($Message)){
                        echo $Message;
                    }
                ?> 
                </div>
                <form method='POST' enctype="MULTIPART/FORM-DATA" class="row g-3 needs-validation" novalidate   >
                    <div class="col-md-5">
                        <label for="validationCustom01" class="form-label" >Nom</label>
                        <input type="text" class="form-control" id="validationCustom01"  name="nom" required>
                        <div class="valid-feedback">
                            Cela semble bon!
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationCustom02" class="form-label">Post Nom</label>
                        <input type="text" class="form-control" id="validationCustom02"  name="prenom" required>
                        <div class="valid-feedback">
                            Cela semble bon!
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationCustomUsername" class="form-label">Adresse mail</label>
                        <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="mail" required>
                        <div class="invalid-feedback">
                            Veuillez une adresse mail valide
                        </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="validationCustom04" class="form-label">Fonction</label>
                        <select class="form-select" id="validationCustom04" name="fonction" >
                            <option>Secretaire</option>
                            <option>Etudiant</option>
                            <option>Archiveur</option>
                            <option>Decanat</option>
                            <option>Administratif</option>
                        </select>
                        <div class="invalid-feedback">
                        Veuillez sélectionner une Fonction 
                        </div>
                    </div> 
                    <div class="col-md-5">
                        <label for="validationCustom04" class="form-label">Faculté</label>
                        <select class="form-select" id="validationCustom04" name="faculte" >
                            <?php 
                                include("connexion.php");
                                $getAllFac= $connexion->query("SELECT * FROM tdecanat");
                                $dataFac= $getAllFac->fetchAll();
                                foreach( $dataFac as $fa){
                                    ?>
                                         <option value=<?= $fa['id_decanat'] ; ?>><?= $fa['description_decanat'] ; ?></option>
                                    <?php
                                }
                            
                            ?>
                        
                        </select>
                        <div class="invalid-feedback">
                        Veuillez sélectionner une Faculté
                        </div>
                    </div>                   
                    <div class="col-md-5">
                        <label for="validationCustom03" class="form-label">Nationalité</label>
                        <input type="text" class="form-control" id="validationCustom03" name="nationalite" required>
                        <div class="invalid-feedback">
                        Veuillez fournir une Nationalité valide.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationCustom03" class="form-label">Télephone</label>
                        <input type="tel" class="form-control" id="validationCustom03" name="telephone" required>
                        <div class="invalid-feedback">
                        Le numéro de télephone doit avoir 10 chiffres
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationCustom03" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="validationCustom03" name="monfichier" required>
                        <div class="invalid-feedback">
                        Le numéro de télephone doit avoir 10 chiffres
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label for="validationCustom03" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="validationCustom03" name="password" required>
                        <div class="invalid-feedback">
                        Veuillez saisir un mot de passe 
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label for="validationCustom04" class="form-label">Genre</label>
                        <select class="form-select" id="validationCustom04" name="genre" required>
                        <option >Masculin</option>
                        <option>Féminin</option>
                        </select>
                        <div class="invalid-feedback">
                        Veuillez sélectionner une Faculté
                        </div>
                    </div>           
                    <div class="col-10">
                        <button class="btn btn-outline-dark" type="submit" name="btnEnreg">S'inscrire</button>
                    </div>
                    <div class="col-10">
                        <button class="btn btn-outline-dark" type="submit"><a href="login.php" class="text-reset fw-small">Se connecter</a></button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- js pour le boostrap -->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
        <?php
            include("footer.php");
        ?>
</html>
