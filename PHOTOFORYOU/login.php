<?php
session_start();

if(!isset($_SESSION['zWuppkgTT6o0Y44'])){
    header("Location: ../admin/login.php");
    exit;
}

include ("./Config/commande.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body>
<br>
<br>
<br>   
<div class="container-fluid"></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" name="email" style="width: 80%">
            </div>
            
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="motdepasse" style="width: 80%">
            </div>
             
            <input type="submit" class="btn btn-danger" name= "envoyer" value="Se connecter">
        </form> 
        
        </div>
        <div class="col-md-3">
</div>

</body>
</html>

<?php

if(isset($_POST['envoyer'])){
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse'])){
        $email = htmlspecialchars ($_POST['email']);
        $motdepasse = htmlspecialchars ($_POST['motdepasse']);

        $admin = getAdmin($email, $motdepasse);

        if($admin){

            $_SESSION['zWuppkgTT6o0Y44'] = $admin;

            header("Location: admin/");

        }else{
            echo "Il y a un problème de connexion !";        

        }

    }
}
