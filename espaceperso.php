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
      <form action="espaceperso.php" method="">
        <input type="text" name="search" placeholder="Rechercher" />
      </form>
      <p>Bienvenue chez toi, <?php echo $_SESSION['pseudo'] ?> !</p>
      <a title="Déconnexion" href="logout.php"><?php echo file_get_contents("deco.svg"); ?></a>
    </header>

    <article class="espaceperso">

      <div id="formulaireupload">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <?php echo file_get_contents("upload.svg"); ?>
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
          <input type="file" name="image" />
          <textarea name="titrephoto" rows="1" cols="34" placeholder="Insérez ici le titre de votre photo"></textarea>
          <input type="submit" name="submitfile" value="Envoyer" />
        </form>
        <h3>Mes pinterettes</h3>
      </div>

      <div class="blocimages">
      <?php
        try {
          $connexion = new PDO('mysql:host=localhost; dbname=pinterettes', 'root', 'root');
        } catch ( Exception $e ){
           die('Erreur : '.$e->getMessage() );
        }$infos_images = $connexion->query("SELECT * FROM images WHERE user_id=$id_user");
        while ($board = $infos_images->fetch()){
         ?>
          <img class="image" src="<?php echo $board['img_url'] ?>" />
      <?php
        };
       ?>
     </div>

      <h3>Mes trucs pinterettés</h3>
    </article>

  </body>
