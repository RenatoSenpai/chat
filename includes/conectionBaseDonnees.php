<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=chatperso;charset=utf8','root', '');
    // $bdd = new PDO('mysql:host=sql4.cluster1.easy-hebergement.net;dbname=sauveuraiello3;charset=utf8','sauveuraiello3', 'tovenaar');
} catch (Exception $e) {
  die('Erreur : '. $e->getMessage());
}
?>
