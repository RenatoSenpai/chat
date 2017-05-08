<?php
           include  "../includes/conectionBaseDonnees.php";
           $id = $_GET['id'];
           $message = $_GET['message'];
           $date = $_GET['date'];

           $req = $bdd->prepare('INSERT INTO discussion(idPerso,Texte,Date) VALUES(?,?,?)');
           $req->bindValue(1,$id);
           $req->bindValue(2,$message);
           $req->bindValue(3,$date);
           $req->execute();
