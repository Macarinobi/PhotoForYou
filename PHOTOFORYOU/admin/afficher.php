<?php
session_start();
require("./Config/commande.php");
require("./Config/login.php");

$Produits=afficher();


?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <title>Tous les produits</title>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Photoforyou</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="./admin" style="font-weight: bold">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="supprimer.php" >Suppression</a>
          <li class="nav-item">
          <a class="nav-link active" href="afficher.php" style="font-weight: bold">Produits</a>
       
                    </ul>
                    <div style="display: flex; justify-content: flex-end;">
                        <a href="deconnexion.php" class= "btn btn-danger">Se déconnecter</a>
                    </div>
                    </div>
                </div>
                </nav>

                <div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Images</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Description</th>
                        <th scope="col">Editer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= $Produit->id ?></th>
                        <td>
                            <img src="<?= $Produit->image ?>" style="width: 15%">
                        </td>
                        <td><?= $Produit->nom ?></td> <!-- Le nom de la variable est "nom" et non "Nom" -->
                        <td style="font-weight:bold; color: green;"><?= $Produit->prix ?>$</td> <!-- La variable est
                         $Produit et non $monproduit -->
                        <td><?= substr($Produit->description, 0, 100); ?>...</td>
                        <td>
                            <a href="editer.php?pdt=<?= $Produit->id ?>"><i class="fa fa-pencil" style="font-size: bold"></i></a> <!-- 
                              La variable est $Produit et non $monProduit -->
                        </td>
                    </tr>

                    <!-- Les autres lignes du tableau sont des exemples et peuvent être supprimées -->
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>

            <form method="post"> <!-- "methode" doit être "method" -->
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Identifiant du produit</label>
                    <input type="number" class="form-control" name="idproduit" required>
                </div>
                <button type="submit" name="valider" class="btn btn-primary">Supprimer le produit</button>
            </form>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($Produits as $Produit): ?> <!-- $Produits est utilisé ici mais il n'a pas été défini dans ce code -->
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?= $Produit->image ?>"></svg>
                        <h3><?= $Produit->id ?></h3>
                        <div class="card-body">
                            <!-- Le contenu de la carte doit être ajouté ici -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php

if (isset($_POST['valider']))
{
      if(isset($_POST['idproduit']))
      {
      if(!empty($_POST['idproduit']) AND is_numeric($_POST['idproduit']))
          {
              $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
        
          try 
          {
              supprimer($idproduit);
          } 
          catch (Exception $e)
          {
              $e->getMessage();  
          }


        
          }

      }
  }

?>