<html lang="en">
    <head>
        
        <link href="styles.css" rel="stylesheet" />
        <link href="../css/connexion.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../cdnjs/style.css">
    </head>
</html>
<?php
session_start();
include("connexion.php");
$Message="";
$_SESSION['auth']=false;
    if(isset($_POST['btnConnecter'])){
        if(!empty($_POST['mail']) AND !empty($_POST['password']) ){
            
            $mail=$_POST['mail'];
            $password=$_POST['password'];
            

            $checkIfUserExists=$connexion->prepare('SELECT * FROM tutilisateurs WHERE mail=? AND password=?');
            $checkIfUserExists->execute(array($mail,$password));

            //$usersInfo= $checkIfUserExistS->fetch();
            if($checkIfUserExists->rowCount() > 0)
            {  

                ?>
                <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                <script>
                        swal("Quelqu'un existe","Clique pour continuer","success");
                    
                </script>
                
                <?php
                   $usersInfo=$checkIfUserExists->fetch();
                
                   $_SESSION['auth']=true;
                   $_SESSION['id']=$usersInfo['id'];
                   $_SESSION['nom']=$usersInfo['nom'];
                   $_SESSION['prenom']=$usersInfo['prenom'];
                   $_SESSION['mail']=$usersInfo['mail'];
                   $_SESSION['fonction']=$usersInfo['fonction'];
                   $_SESSION['faculte']=$usersInfo['faculte'];
                   $_SESSION['telephone']=$usersInfo['telephone'];
                   $_SESSION['photo']=$usersInfo['photo'];
                   $_SESSION['password']=$usersInfo['password']; 
                   if($usersInfo['fonction']=="Decanat"){
                    ?>
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Decanat","Réesayer","success");
                        
                    </script>
                    
                    <?php
                    header("Location:documents.php");
                   }elseif ($usersInfo['fonction']=="Etudiant") {
                       ?>
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Connecté à l'espace des étudiant avec Success","Clique pour continuer","success");
                        
                    </script>
                    <?php
                    header("Location:../service.php");
                   }elseif ($usersInfo['fonction']=="Archiveur") {
                    ?>
                        
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Connecté à l'espace Archive avec succès","Clique pour completer","success");
                        
                    </script>
                    
                    <?php
                   }
                   elseif ($usersInfo['fonction']=="Administratif") {
                    header("Location:../AcceuilAcademique.php");
                    ?>
                        
                    <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                    <script>
                            swal("Connecté à l'espace Academique","Clique pour completer","success");
                        
                    </script>
                    
                    <?php
                   }
  
  

                    

                 //$usersInfo=$checkIfUserExists->fetch();
               /* if(password_verify($password, $usersInfo['password'])){
                   // echo("Email Correct");
                   // $Message="Tout va bien";
                     //header("Location: document.php");
                     

                    $_SESSION['auth']=true;
                    $_SESSION['nom']=$usersInfo['nom'];
                    $_SESSION['prenom']=$usersInfo['prenom'];
                    $_SESSION['mail']=$usersInfo['mail'];
                    $_SESSION['fonction']=$usersInfo['fonction'];
                    $_SESSION['faculte']=$usersInfo['nationalite'];
                    $_SESSION['telephone']=$usersInfo['telephone'];
                    $_SESSION['photo']=$usersInfo['photo'];
                    $_SESSION['password']=$usersInfo['password'];   

                    header("Location:ducument.php");
                }else{
                    echo("Mot de passe Incorrect");
                    $Message="Mot de passe Incorrect";
                }*/
                //$Message="Tres bien";
                

            }else{

                ?>
                <script rel="stylesheet" src="../cdnjs/sweetalert.min.js"></script>
                <script>
                        swal("Informations fourrnies incorrect","Réesayer","error");
                    
                </script>
                
                <?php
            }
        }
    }
?>