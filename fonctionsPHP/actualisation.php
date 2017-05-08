<?php
session_start();
if (!isset ($_SESSION['loginChat']['email']) || !isset ($_SESSION['loginChat']['mdp']))
{
  header('Location: ../index.php');
  exit();
}
$final = "";
include  "../includes/conectionBaseDonnees.php";
$count = $bdd->prepare("SELECT perssones.id,Texte,Date,nom,prenom,mail,motdepasse FROM discussion, perssones where discussion.idPerso = perssones.id ");
$count->execute();
while ($article = $count->fetch()) {
        if ($article['mail'] == $_SESSION['loginChat']['email']) {
                echo '
                <li class="right clearfix"><span class="chat-img pull-right">
                    <img src="apercu.php?id='.$article['id'].'" alt="'.$article['nom'].'" title="'.$article['nom'].'" height="50px" width="50px" class="img-circle img-chat" />
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$article['Date'].'</small>
                            <strong class="pull-right primary-font">'.$article['prenom'].' '.$article['nom'].'</strong>
                        </div>
                        <p>
                            '.$article['Texte'].'
                        </p>
                    </div>
                </li>';
        }
        else {
                echo '<li class="left clearfix"><span class="chat-img pull-left">
                    <img src="apercu.php?id='.$article['id'].'" alt="'.$article['nom'].'" title="'.$article['nom'].'" height="50px" width="50px" class="img-circle img-chat" />
                </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">'.$article['prenom'].' '.$article['nom'].'</strong> <small class="pull-right text-muted">
                                <span class="glyphicon glyphicon-time"></span>'.$article['Date'].'</small>
                        </div>
                        <p>
                            '.$article['Texte'].'
                        </p>
                    </div>
                </li>';
                }
        }
echo $final;
