<?php
           include  "../includes/conectionBaseDonnees.php";
           $nom = $_POST['nom'];
           $prenom = $_POST['prenom'];
           $mail = $_POST['mail'];
           $mdp = $_POST['mdp'];
           $image = file_get_contents($_FILES['monfichier']['tmp_name']);
           $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM perssones WHERE mail like '".$mail."'");
           $count->execute();
           $req  = $count->fetch(PDO::FETCH_ASSOC);
           if($req['nbr'] == "0")
           {
               $req = $bdd->prepare('INSERT INTO perssones(nom,prenom,mail,motdepasse,photo,extension) VALUES(?,?,?,?,?,?)');
               $req->bindValue(1,$nom);
               $req->bindValue(2,$prenom);
               $req->bindValue(3,$mail);
               $req->bindValue(4,$mdp);
               $req->bindValue(5,$image);
               $req->bindValue(6,$_FILES['monfichier']['type']);
               $req->execute();
               $req = $bdd->prepare('SELECT * FROM perssones WHERE mail = ? AND motdepasse = ?');
               $req->bindValue(1,$mail);
               $req->bindValue(2,$mdp);
               $req->execute();
               $reponse = $req->fetch();
               echo "Compte crée avec succes! <a href='index.php' class='btn btn-primary' role='button'>Continuer</a>";
               session_start();
               $_SESSION['loginChat']['email'] = $reponse[3];
               $_SESSION['loginChat']['mdp'] = $reponse[4];
               $_SESSION['loginChat']['nom'] = $reponse[1];
               $_SESSION['loginChat']['prenom'] = $reponse[2];
               $_SESSION['loginChat']['id'] =  $reponse[0];
               if($_SESSION['loginChat']['email'] == null)
               {
                   echo("<script type=\"text/javascript\">alert('Veuillez mettre un fichier valide, 2MB max et de format png, gif, jpg ou jpeg')</script>");
               }
               
               
               header('Location: index.php');

            }
            else {
                echo '<body onLoad="alert(\'Probleme de création de compte..\')">';
                header('Location: index.php');
                exit();
            }
