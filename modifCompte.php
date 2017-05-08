<!DOCTYPE html>
<html>
	<head>
		<?php
		include 'includes/header.php';
		 ?>
	</head>
	<body>
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
				 <div class="changementCron jumbotron col-lg-12">
					 <form class="creerCompteSaisie" action="fonctionsPHP/creerCompte.php" method="post" enctype="multipart/form-data" onsubmit="return verifcases()">
						 <div class="input-group input-group-lg">
                                                    <span class="input-group-addon prenms" id="sizing-addon1">Nom</span>
                                                    <input value="<?php echo $_SESSION['loginChat']['nom'] ?>" onkeyup="verifNomPrenom(this.parentNode); verifcases();" onChange="verifNomPrenom(this.parentNode); verifcases();" name="nom" type="text" class="form-control" placeholder="Nom" aria-describedby="sizing-addon1">
                                                    <span class="input-group-addon check" id="sizing-addon1"><span class="glyphicon glyphicon-record"></span></span>
						</div>
						<div class="input-group input-group-lg">
                                                    <span class="input-group-addon prenms" id="sizing-addon1">Prenom</span>
                                                    <input value="<?php echo $_SESSION['loginChat']['prenom'] ?>" onkeyup="verifNomPrenom(this.parentNode); verifcases();" onChange="verifNomPrenom(this.parentNode); verifcases();" name="prenom" type="text" class="form-control" placeholder="Prenom" aria-describedby="sizing-addon1">
                                                    <span class="input-group-addon check" id="sizing-addon1"><span class="glyphicon glyphicon-record"></span></span>
                                                </div>
                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-addon prenms" id="sizing-addon1">E-mail</span>
                                                    <input value="<?php echo $_SESSION['loginChat']['email'] ?>" onkeyup="verifMail(this.parentNode); verifcases();" onChange="verifMail(this.parentNode); verifcases();" name="mail" type="text" class="form-control" placeholder="Adresse E-mail" aria-describedby="sizing-addon1">
                                                    <span class="input-group-addon check" id="sizing-addon1"><span class="glyphicon glyphicon-record"></span></span>
						</div>
						<div class="input-group input-group-lg">
                                                    <span class="input-group-addon prenms" id="sizing-addon1">Mot de Passe</span>
                                                    <input value="<?php echo $_SESSION['loginChat']['mdp'] ?>" onkeyup="verifMDP(this.parentNode);verifMDPR(document.getElementsByClassName('input-group')[4]); verifcases();" onChange="verifMDP(this.parentNode); verifcases();" name="mdp" type="password" class="form-control" placeholder="*****" aria-describedby="sizing-addon1">
                                                    <span class="input-group-addon check" id="sizing-addon1"><span class="glyphicon glyphicon-record"></span></span>
                                                </div>
                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-addon prenms" id="sizing-addon1">Ressaisir votre Mot de passe</span>
                                                    <input value="<?php echo $_SESSION['loginChat']['mdp'] ?>" onkeyup="verifMDPR(this.parentNode); verifcases();" onChange="verifMDPR(this.parentNode); verifcases();" name="mdpr" type="password" class="form-control" placeholder="*****" aria-describedby="sizing-addon1">
                                                    <span class="input-group-addon check" id="sizing-addon1"><span class="glyphicon glyphicon glyphicon-record"></span></span>
                                                </div>
                                                <input type="file" onChange="verifPhoto(this)" name="monfichier" /><br />
                                                <div class="alert alert-danger atentionRefaire" role="alert">
                                                        <div class="NomPrenom">
                                                                Veuillez saisir au moins 2 lettres au nom et au prenom.
                                                        </div>
                                                        <div class="Mail">
                                                                Veuillez saisir une adresse mail corecte.
                                                        </div>
                                                        <div class="MailBDD">
                                                                Cette adresse mail est deja prise.
                                                        </div>
                                                        <div class="MDP">
                                                                Votre mot de passe doit avoir au moins une lettre minuscule, une lettre majuscule et un chifre.
                                                        </div>
                                                        <div class="MDPverif">
                                                                Vos deux mot de passes ne corespondent pas.
                                                        </div>
                                                </div>
					 	<input type="submit" class="btn btn-default navbar-btn"value="Modifier mon compte" />

					 </form>


				 </div>
			</div>

		</div>
	</body>
</html>
