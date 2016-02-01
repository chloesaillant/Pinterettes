<?php
  session_start();
  $id_user=$_SESSION['id'];
 ?>

<!DOCTYPE html>
<html>
  <head>
    <link href='https://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>Pinterettes</title>
    <link rel="stylesheet" href="style.css" media="screen">
  </head>
  <body>
    <h1 id="grostitre"><a href="accueil.php">Pinterettes</a></h1>

    <header>
      <form action="" method="">
        <input type="text" name="search" placeholder="Rechercher" />
      </form>
      <p><a href="espaceperso.php">Accéder à mon espace</a></p>
      <a title="Déconnexion" href="logout.php"><?php echo file_get_contents("deco.svg"); ?></a>
    </header>

    <article class="accueil">

      <?php
        try {
          $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'root');
        } catch ( Exception $e ){
           die('Erreur : '.$e->getMessage() );
        }$infos_images = $connexion->query("SELECT * FROM users INNER JOIN images ON images.user_id = users.id");
        while ($board = $infos_images->fetch()){
         ?>
          <div class="imagesaccueil">
          <img class="image" src="<?php echo $board['img_url'] ?>" />
          <p><?php echo $board['img_name'] ?><br /> - <span class="auteurs"><?php echo 'pinteretté par '.$board['pseudo'] ?>.</span></p></div>
      <?php
        };
       ?>


       </article>


  </body>
</html>
