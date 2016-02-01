<!DOCTYPE html>
<html>
  <head>
    <link href='https://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <title>Pinterettes</title>
    <link rel="stylesheet" href="style.css" media="screen">
  </head>
  <body>

    <h1 id="grostitre">Pinterettes</h1>
    <a id="boutoninscription" href="#popup1">Inscription</a>

    <div id="popup1" class="overlay">
      <div class="popup">

        <h2>Inscription</h2>
        <a class="close" href="#">×</a>
        <div class="content">
          <form action="inscription.php" method="post">
            <label for="newpseudo">Pseudo</label>
            <input type="text" name="newpseudo" placeholder="Choisissez votre pseudo" />
            <label for="newmail">E-mail</label>
            <input type="text" name="newmail" placeholder="Insérez votre mail" />
            <label for="newpassword">Mot de passe</label>
            <input type="password" name="newpassword" placholder="Créez votre mot de passe" />
            <button type="submit" name="creer">Créer mon compte</button>
          </form>
        </div>

      </div>
    </div>

    <article class="index">
      <div>
        <form action="functions.php" method="post">
          <label for="pseudo">Pseudo</label>
          <input type="text" name="pseudo" placeholder="Insérez votre pseudo" />
          <label for="password">Password</label>
          <input type="password" name="password" value="" />
          <button type="submit" name="button">Valider</button>
        </form>
      </div>
    </article>

  </body>
</html>
