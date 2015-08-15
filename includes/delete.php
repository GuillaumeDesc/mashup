<?php
$item = $_POST['deleteItem']; // detection de la value de l'input, comportant le nom du fichier

if(isset($_POST['deleteItem']))
{

$fileAdress = str_replace('Supprimer ', '../img/', $item); // modification pour remplacer le 'supprimer ' par le path du fichier, donnant aini le lien exact
$fileName = str_replace('Supprimer ', '', $item); // pour avoir juste le nom du fichier.
  
    if (file_exists($fileAdress)) { //detection de l'existance du fichier (au cas ou..) et pour ne pas supprimer dans le vide

          unlink($fileAdress); // supprime le fichier image
          $delete = $req->prepare("DELETE FROM images WHERE name='" . $fileName . "'"); // peparation pour supprimer la ligne correspondante dans la base de donnee
          $delete->execute(); // exectution

        $alert =  '<section  id="alert"><p>'. $fileName . ' supprimé.</p></section>'; // echo pour afficher une alerte confirmant que tout a bien ete supprime
    }
    else {$alert = '<section  id="alert"><p>Erreur de suppression</p></section>';} // si le fichier n'existe pas
}