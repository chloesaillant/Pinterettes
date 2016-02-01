<?php
  session_start();

  $dossier = 'images/';
  $fichier = basename($_FILES['image']['name']);
  $taille_maxi = 1000000;
  $taille = filesize($_FILES['image']['tmp_name']);
  $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.svg');
  $extension = strrchr($_FILES['image']['name'], '.');
  $table=[];

  if(!in_array($extension, $extensions)) {
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou svg.';
  }
  if($taille>$taille_maxi) {
    $erreur = 'Le fichier est trop gros...';
  }
  if(!isset($erreur)) {
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
      if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {

        $id_user=$_SESSION['id'];
        $titre_image=$_POST['titrephoto'];

        try {
          $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'root');
        } catch ( Exception $e ) {
           die('Erreur : '.$e->getMessage() );
        }

        $req="INSERT INTO images VALUES(NULL,'$id_user','images/$fichier','$titre_image')";
        $connexion->query($req);
        array_push($table, header('Location: espaceperso.php'));

      } else {
        echo 'Echec de l\'upload !';
      }
  } else {
    echo $erreur;
  }
?>
