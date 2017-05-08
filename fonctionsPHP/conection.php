<?php
include  "../includes/conectionBaseDonnees.php";
include '../includes/header.php';
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$req = $bdd->prepare('SELECT COUNT(mail) FROM perssones WHERE mail = ? AND motdepasse = ?');
$req->bindValue(1,$mail);
$req->bindValue(2,$mdp);
$req->execute();
$reponse = $req->fetch();
if ($reponse[0] == "1") {
  $req = $bdd->prepare('SELECT mail, motdepasse, nom, prenom,id FROM perssones WHERE mail = ? AND motdepasse = ?');
  $req->bindValue(1,$mail);
  $req->bindValue(2,$mdp);
  $req->execute();
  $reponse = $req->fetch();
  session_start();
  $_SESSION['loginChat']['email'] = $reponse[0];
  $_SESSION['loginChat']['mdp'] =  $reponse[1];
  $_SESSION['loginChat']['nom'] =  $reponse[2];
  $_SESSION['loginChat']['prenom'] =  $reponse[3];
  $_SESSION['loginChat']['id'] =  $reponse[4];
  header('Location: ../index.php');
}
else {
  echo "<body><div class=\"row content\"><div class=\"col-lg-offset-3 col-lg-6\"><meta http-equiv=\"refresh\" content=\"5 ; url=index.php\"><div class=\"jumbotron col-lg-12\">Votre session n'est pas valide, veuillez mettre un bon mot de passe ou mail. <br /> Vous allez etre redirigé dans quelques secondes.</div></div></div></body>";

}





 ?>
