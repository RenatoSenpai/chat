<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=chatperso;charset=utf8','root', '');
} catch (Exception $e) {
  die('Erreur : '. $e->getMessage());
}

$type = $_POST['type'];
$valeur = $_POST['valeur'];

if ($type == "mail") {
  $lecture = $bdd->query('SELECT COUNT(mail) FROM perssones WHERE mail="'.$valeur.'"' );
  $reponse = $lecture->fetch();
  if ($reponse[0] == "0") {
    $resultat= "false";
  }
  else {
    $resultat= "true";
  }
}
echo $resultat;
