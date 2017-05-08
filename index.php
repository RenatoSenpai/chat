<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/header.php'; ?>

        <title>Chat Perso - Acceuil</title>
    </head>
	<body>
            <div id="background-chat-acceuil">
                <div id="coince">
                <div class="container" id="main-chat-acceuil">
                    <div class="row">
                        <div id="d1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1>Bienvenue !</h1>
                            <?php
                                if (isset ($_SESSION['loginChat']['email']))
                                {
                                    var_dump($_SESSION);
                                    header('Location: chat.php');
                                    exit();
                                } else {
                                        echo '
                                              <form action="fonctionsPHP/conection.php"  method="post" onsubmit="return document.getElementById(\'form-connxion-chat-acceuil\').style.maxHeight == \'500px\'">
                                                <div id="form-connxion-chat-acceuil" class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon glyphicon glyphicon-user prenms" for="ID" id="glID"></span>
                                                        <input type="text" name="mail" id="ID" class="form-control input-cc" placeholder="Mail">
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon glyphicon glyphicon-lock prenms" for="MDP" id="glMDP"></span>
                                                        <input type="password" name="mdp" id="MDP" class="form-control input-cc" placeholder="Mot de passe">
                                                    </div>
                                                </div>
                                                <button onClick="conecter();" class="btn btn-outline-success btn-lg btn-block">Connexion</button>
                                              </form>
                                              <button onClick="formCreeCompte();" type="button" class="btn btn-outline-primary btn-lg btn-block">Créer un compte</button>';
                                  }
                            ?>
                            <hr>
                            <p class="footer-chat-acceuil">Develloped by Antoine Aiello and Mallet Renaud</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div id="coince2">
                        <div class="container" id="container-form-chat-acceuil">
                            <form class="creerCompteSaisie" action="fonctionsPHP/creerCompte.php" method="post" onsubmit="return verifcases()">
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon prenms glyphicon glyphicon-pencil"></span>
                                        <input  onkeyup="verifNomPrenom(this.parentNode); verifcases();" onChange="verifNomPrenom(this.parentNode); verifcases();" name="nom" type="text" class="form-control input-cc " placeholder="Nom">
                                        <span class="input-group-addon check"><span class="glyphicon glyphicon-record"></span></span>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon prenms glyphicon glyphicon-pencil"></span>
                                        <input onkeyup="verifNomPrenom(this.parentNode); verifcases();" onChange="verifNomPrenom(this.parentNode); verifcases();" name="prenom" type="text" class="form-control input-cc" placeholder="Prenom">
                                        <span class="input-group-addon check"><span class="glyphicon glyphicon-record"></span></span>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon prenms glyphicon glyphicon-envelope"></span>
                                        <input onkeyup="verifMail(this.parentNode); verifcases();" onChange="verifMail(this.parentNode); verifcases();" name="text" type="mail" class="form-control input-cc" placeholder="Adresse E-mail">
                                        <span class="input-group-addon check"><span class="glyphicon glyphicon-record"></span></span>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon prenms glyphicon glyphicon-lock"></span>
                                        <input onkeyup="verifMDP(this.parentNode);verifMDPR(document.getElementsByClassName('input-group')[4]); verifcases();" onChange="verifMDP(this.parentNode); verifcases();" name="mdp" type="password" class="form-control input-cc" placeholder="Mot de passe">
                                        <span class="input-group-addon check"><span class="glyphicon glyphicon-record"></span></span>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon prenms glyphicon glyphicon-lock" ></span>
                                        <input onkeyup="verifMDPR(this.parentNode); verifcases();" onChange="verifMDPR(this.parentNode); verifcases();" name="mdpr" type="password" class="form-control input-cc" placeholder="Confirmez votre mot de passe">
                                        <span class="input-group-addon check"><span class="glyphicon glyphicon-record"></span></span>
                                   </div>
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
                                           <input type="submit" class="btn btn-outline-primary btn-lg btn-submit-creerCompte" value="Créer un compte" />
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>

	</body>
</html>
