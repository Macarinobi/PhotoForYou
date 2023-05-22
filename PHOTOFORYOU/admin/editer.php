<?php
session_start();

require("./config/commande.php");

// Définir la variable $id
$id = $_GET['pdt'];

$Produits = getProduit($id);

foreach ($Produits as $Produit) {

  $nom = $Produit->nom;
  $idPdt = $Produit->id;
  $image = $Produit->image;
  $description = $Produit->description;
  $prix = $Produit->prix;

}

// Afficher les informations du produit
echo $nom;
echo $idPdt;
echo $image;
echo $description;
echo $prix;

?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <title></title>
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
          <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="supprimer.php" style="font-weight: bold">Suppression</a>
          <li class="nav-item">
          <a class="nav-link " href="afficher.php" >Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#" style="font-weight: bold; color: green;" >Modification</a>
        </li>
      </ul>
      <div style="display: flex; justify-content: flex-end;">
        <a href="deconnexion.php" class= "btn btn-danger">Se déconnecter</a>
    </div>
  </div>
</nav>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<?php foreach ($Produits as $Produit): ?>

 

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
    <input type="name" class="form-control" name="image" value="<?= $image ?>" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix" value="<?= $prix ?>" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" value="<?= $description ?>" required></textarea>
  </div>
    
  <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
</form>


<?php endforeach; ?>

    </div></div></div>

</body>
</html>

<?php

  if (isset($_POST['valider']))
  {
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))

        {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));
        
            modifier($image, $nom, $prix, $desc, $id);

            header("Location: ../admin/afficher.php");
 
        }


        
      }

    }
  

?>