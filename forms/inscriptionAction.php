<?php
    session_start();
    include("connexion.php");  

    if(isset($_POST["btnEnreg"])){
        if ((!empty($_POST['nom'])) AND (!empty($_POST['prenom'])) AND  (!empty($_POST['faculte']))  AND (!empty($_POST['mail']))AND (!empty($_POST['fonction']))  AND (!empty($_POST['nationalite']))  AND (!empty($_POST['telephone'])) ){
            //Gestion Des Images
            $nomfichier=$_FILES["monfichier"]["name"];

            $message2="Type;  <br>".$_FILES["monfichier"]["tmp_name"]."<br>";

            $message3="Taille;  <br>".$_FILES["monfichier"]["size"]."<br>";

            $message4="Type;  <br>".$_FILES["monfichier"]['type']."<br>";

            move_uploaded_file($_FILES["monfichier"]["tmp_name"],"fichier/".$_FILES["monfichier"]["name"]);
            //Fin Gestion Image

            //Recuperation des données
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $mail=$_POST['mail'];
            $fonction=$_POST['fonction'];
            $faculte=$_POST['faculte'];
            $nationalite=$_POST['nationalite'];
            $telephone=$_POST['telephone'];
            $tpassword= $_POST['password'];

            $cheIfAllreadyExist=$connexion->prepare("SELECT mail FROM tutilisateurs WHERE mail=?");
            $cheIfAllreadyExist->execute(array($mail));
            if($cheIfAllreadyExist->rowCount()==0){
                        
                try{
                    $req= $connexion->prepare("INSERT INTO tutilisateurs(nom,prenom,mail,fonction,faculte,nationalite,telephone,photo,password)VALUES(?,?,?,?,?,?,?,?,?)");
                // $reqrun=mysqli_query($connexion,$req);
                $req->execute(array($nom,$prenom,$mail,$fonction,$faculte,$nationalite,$telephone,$nomfichier,$tpassword));
                $usersInfo=$req->fetch();
            //   print("Enregistrer avec SUcces");
                }catch(Exception $e){
                $e->getMessage();
                }  
                /*    
                    $_SESSION['auth']=true;
                    $_SESSION['id']=$usersInfo['id'];
                    $_SESSION['nom']=$usersInfo['nom'];
                    $_SESSION['prenom']=$usersInfo['prenom'];
                    $_SESSION['mail']=$usersInfo['mail'];
                    $_SESSION['fonction']=$usersInfo['fonction'];
                    $_SESSION['faculte']=$usersInfo['nationalite'];
                    $_SESSION['telephone']=$usersInfo['telephone'];
                    $_SESSION['photo']=$usersInfo['photo'];
                    $_SESSION['password']=$usersInfo['password'];   
                    //header("Location: login.php");*/
                    ?>
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Compte créer avec succès!","Merci ! de vous connectés","success");
                        
                    </script>
                <?php
                    echo"Compte créer avec succès! Merci de vous"?><a href="login.php">Connectées</a><?php
                } else{
                    ?>
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("L'Utilisateur existe deja dans la bdd","Clique pour continuer","error");
                        
                    </script>
                <?php
                  $Message="L'Utilisateur existe deja dans la bdd";
                }
     } else{
        ?>
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Completer touts les shamps d'abord","Clique pour completer","error");
                        
                    </script>
                <?php
         }
                      
 }

    
?>