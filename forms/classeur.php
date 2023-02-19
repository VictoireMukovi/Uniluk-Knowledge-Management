<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method='POST'>
        <input type="text" placeholder="Description Classeur"name="description">
        <input type="text" placeholder="Id Faculté" name="faculte">
        <input type="submit" name="btnEnreg"  >
    </form>
    
</body>
</html>
<?php 
include('connexion.php');
        if(isset($_POST['btnEnreg'])){
            $description= $_POST['description'];
            $faculte= $_POST['faculte'];
            $InsertIntoClassuer= $connexion->prepare("INSERT INTO tclasseur(description,id_faculte) VALUES(?,?)");
            $InsertIntoClassuer->execute(array($description,$faculte));
        }


?>