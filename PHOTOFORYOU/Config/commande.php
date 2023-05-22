<?php

require(__DIR__ . "/../login.php");
require(__DIR__ . "./Config/connexion.php");

function modifier($image, $nom, $prix, $desc, $id)
{
    if ($db) {
        $req = $db->prepare("UPDATE produits SET image=?, nom=?, prix=?, description=? WHERE id=?");
        $req->execute(array($image, $nom, $prix, $desc, $id));
        $req->closeCursor();
    }
}

function getProduit($id)
{
    require("../connexion.php");
    
    $req = $db->prepare("SELECT * FROM produits WHERE id=?"); 

    $req->execute(array($id));
        
    if ($req->rowCount() == 1) {
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    } else {
        $req->closeCursor();
        return false;  
    }
}



function ajouter($image, $nom, $prix, $desc)
{
    if(require("connexion.php")) {
        $req = $db->prepare("INSERT INTO produits (`image`, nom, prix, `description`) VALUES (?, ?, ?, ?)");

        $req->execute(array($image, $nom, $prix, $desc));

        $req->closeCursor();
    }
}

function afficher()
{
    if(require("connexion.php"))
    {
        $req = $db->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        $req->closeCursor();

        return $data;
    }
}

function supprimer($id)
{
    if(require("connexion.php"))
    {
        $req=$db->prepare("DELETE FROM produits WHERE id=?");
        $result = $req->execute(array($id));
        
        if ($result) {
            $req->closeCursor();
            return true;
        } else {
            $error = $req->errorInfo();
            echo "Erreur pour supprimer le produit avec ID $id: " . $error[2];
            return false;
        }
    }
}

function getAdmin($email, $motdepasse)
{
    require("connexion.php");

    $req = $db->prepare("SELECT * FROM admin WHERE email=? AND motdepasse=?");

    $req->execute(array($email, $motdepasse));

    if ($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    } else {
        $req->closeCursor();
        return false;
    }
}



