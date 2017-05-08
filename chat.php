<!DOCTYPE html>
<html>
	<head>
		<?php
		include 'includes/header.php'
		 ?>
	</head>
	<body onload="actualisation()">
		<div class="row content">
			<div class="col-lg-offset-3 col-lg-6">
				<?php
				session_start();
				if (!isset ($_SESSION['loginChat']['email']) || !isset ($_SESSION['loginChat']['mdp']))
				{
					header('Location: index.php');
  				exit();
				}
				 ?>
				 <div class="jumbotron col-lg-12">
				 	Bienvenue <?php echo $_SESSION['loginChat']['prenom']; ?>! <a href="fonctionsPHP/deconection.php">déconection</a><br />
					<a href="modifCompte.php">modifier COMPTE</a>
				 </div>
			</div>
		    <div class="row">
		        <div class="col-lg-offset-3 col-md-6">
		            <div class="panel">
		                <div class="panel-body">
		                    <ul class="chat">


                                <?php
                                include  "includes/conectionBaseDonnees.php";
                                $count = $bdd->prepare("SELECT perssones.id,Texte,Date,nom,prenom,mail,motdepasse FROM discussion, perssones where discussion.idPerso = perssones.id ");
                                $count->execute();
                                while ($article = $count->fetch()) {
                                        if ($article['mail'] == $_SESSION['loginChat']['email']) {
                                                echo '
                                                <li class="right clearfix"><span class="chat-img pull-right">
			                            <img src="fonctionsPHP/apercu.php?id='.$article['id'].'" alt="'.$article['nom'].'" title="'.$article['nom'].'" height="50px" width="50px" class="img-circleimg-chat" />
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
			                            <img src="fonctionsPHP/apercu.php?id='.$article['id'].'" alt="'.$article['nom'].'" title="'.$article['nom'].'" height="50px" width="50px" class="img-circle img-chat" />
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
                                         ?>
		                    </ul>
		                </div>
		                <div class="panel-footer">
		                    <div class="input-group">
		                        <input id="btn-input" type="text" class="form-control input-sm texteEnvoyer" placeholder="Entrez votre message ici..." />
		                        <span class="input-group-btn">
		                            <button class="btn btn-warning btn-sm" id="btn-chat" onclick="envoyer(<?php echo $_SESSION['loginChat']['id']; ?>)">Send</button>
		                        </span>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>

		</div>
	</body>
</html>
