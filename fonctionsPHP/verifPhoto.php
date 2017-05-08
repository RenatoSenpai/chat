<?php
 
//Indique si le fichier a été téléchargé
if(!is_uploaded_file($_FILES['monfichier']['tmp_name']))
       echo 'Un problème est survenu durant l opération. Veuillez réessayer !';
else {
       //liste des extensions possibles    
       $extensions = array('/png', '/gif', '/jpg', '/jpeg');

       //récupère la chaîne à partir du dernier / pour connaître l'extension
       $extension = strrchr($_FILES['monfichier']['type'], '/');

       //vérifie si l'extension est dans notre tableau            
       if(!in_array($extension, $extensions))
               echo 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg.';
       else {         

               //on définit la taille maximale
               define('MAXSIZE', 2000000);        
               if($_FILES['monfichier']['size'] > MAXSIZE)
                    echo 'Votre image est supérieure à la taille maximale de '.MAXSIZE.' octets';
               else {

                    echo 'OK';
                }
         }
 }