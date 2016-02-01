<?php
  $newpseudo=strip_tags($_POST['newpseudo']);
  $newmail=strip_tags($_POST['newmail']);
  $newpassword=strip_tags($_POST['newpassword']);

  if(isset($newpseudo)&&isset($newmail)&&isset($newpassword)!=""){
    try {
      $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'root');
    } catch ( Exception $e ) {
       die('Erreur : '.$e->getMessage() );
    }

    $req="INSERT INTO users VALUES(NULL,'$newmail','$newpseudo','$newpassword')";
    $connexion->query($req);
    header('Location: index.php');
  } else {
    header('Location: index.php#popup1');
  }
 ?>
