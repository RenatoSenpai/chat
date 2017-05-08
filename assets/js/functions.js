
function formCreeCompte(){
    document.getElementById('main-chat-acceuil').style.marginLeft = '-260px';
    document.getElementById('form-connxion-chat-acceuil').style.maxHeight = '0px';
    setTimeout("document.getElementById('container-form-chat-acceuil').style.display = 'block'",200);
    setTimeout("document.getElementById('container-form-chat-acceuil').style.opacity = '1'",400);
    setTimeout("document.getElementById('container-form-chat-acceuil').style.marginLeft = '280px'",500);
}

function conecter()
{
    setTimeout("document.getElementById('form-connxion-chat-acceuil').style.maxHeight = '500px'",5);
    document.getElementById('main-chat-acceuil').style.marginLeft = '0px';
    setTimeout("document.getElementById('container-form-chat-acceuil').style.opacity = '0'",10);
    setTimeout("document.getElementById('container-form-chat-acceuil').style.marginLeft = '200px'",300);
    setTimeout("document.getElementById('container-form-chat-acceuil').style.display = 'none'",500);

}

//************************************************************************
//*******************CREATION DE COMPTE***********************************
//************************************************************************
//regex
function verifNomPrenom(objet)
{
  regex = new RegExp("^[a-zA-Z]{2,}$");
  valeur = objet.children[1].value;
  if (valeur=="") {
    objet.children[2].innerHTML = "<span class='glyphicon glyphicon-refresh'></span>";
    document.getElementsByClassName('NomPrenom')[0].style.display = "none";
  }
  else {
    if (regex.test(valeur)) {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";
      document.getElementsByClassName('NomPrenom')[0].style.display = "none";


    } else {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'></span>";
      document.getElementsByClassName('atentionRefaire')[0].style.display = "block";
      document.getElementsByClassName('NomPrenom')[0].style.display = "block";

    }
  }

}

function verifMail(objet)
{
  regex = new RegExp("[@].[a-z]*.[.].[a-z]{1,3}$");
  valeur = objet.children[1].value;
  if (valeur=="") {
    objet.children[2].innerHTML = "<span class='glyphicon glyphicon-refresh'></span>";
    document.getElementsByClassName('Mail')[0].style.display = "none";
    document.getElementsByClassName('MailBDD')[0].style.display = "none";

  }
  else {
    if (regex.test(valeur)) {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";

      document.getElementsByClassName('Mail')[0].style.display = "none";
      verifcases();

      requeteHttp = new XMLHttpRequest();
      requeteHttp.open("POST", "verif.php");
      requeteHttp.onreadystatechange = function() {
        if (requeteHttp.readyState == 4 && requeteHttp.status == 200 && requeteHttp.responseText == "false") {
          objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";
          document.getElementsByClassName('MailBDD')[0].style.display = "none";

        }
        if (requeteHttp.readyState == 4 && requeteHttp.status == 200 && requeteHttp.responseText == "true") {
          objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'>";
          document.getElementsByClassName('atentionRefaire')[0].style.display = "block";
          document.getElementsByClassName('MailBDD')[0].style.display = "block";

        }
      };
      requeteHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      requeteHttp.send('type=mail&valeur=' + valeur);
    }
    else {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'>";
      document.getElementsByClassName('atentionRefaire')[0].style.display = "block";
      document.getElementsByClassName('Mail')[0].style.display = "block";
    }
  }

}

function verifMDP(objet)
{
  regexmin = new RegExp("[a-z]+");
  regexmaj = new RegExp("[A-Z]+");
  regexchif = new RegExp("[0-9]+");
  valeur = objet.children[1].value;
  if (valeur=="") {
    objet.children[2].innerHTML = "<span class='glyphicon glyphicon-refresh'>";
    document.getElementsByClassName('MDP')[0].style.display = "none";
  }
  else {
    if (regexmin.test(valeur) && regexmaj.test(valeur) && regexchif.test(valeur)) {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";
      document.getElementsByClassName('MDP')[0].style.display = "none";

    } else {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'>";
      document.getElementsByClassName('atentionRefaire')[0].style.display = "block";
      document.getElementsByClassName('MDP')[0].style.display = "block";

    }
  }

}
function verifMDPR(objet)
{
  motDePasseSaisie = document.getElementsByClassName('form-control')[3].value;
  valeur = objet.children[1].value;
  if (valeur=="") {
    objet.children[2].innerHTML = "<span class='glyphicon glyphicon-refresh'>";
    document.getElementsByClassName('MDPverif')[0].style.display = "none";
  }
  else {
    if (valeur == motDePasseSaisie) {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";
      document.getElementsByClassName('MDPverif')[0].style.display = "none";

    } else {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'>";
      document.getElementsByClassName('atentionRefaire')[0].style.display = "block";
      document.getElementsByClassName('MDPverif')[0].style.display = "block";

    }
  }

}
function verifcases()
{
  nom = document.getElementsByClassName('check')[0].innerHTML;
  prenom = document.getElementsByClassName('check')[1].innerHTML;
  mail = document.getElementsByClassName('check')[2].innerHTML;
  MotDeP = document.getElementsByClassName('check')[3].innerHTML;
  MotDeV = document.getElementsByClassName('check')[4].innerHTML;

  if (nom == "<span class='glyphicon glyphicon-remove'>" || prenom == "<span class='glyphicon glyphicon-remove'>" || mail == "<span class='glyphicon glyphicon-remove'>" || MotDeP == "<span class='glyphicon glyphicon-remove'>" || MotDeV == "<span class='glyphicon glyphicon-remove'>" ) {
    document.getElementsByClassName('atentionRefaire')[0].style.display = "block";
    return false;
  }
  else {
    document.getElementsByClassName('atentionRefaire')[0].style.display = "none";
    if (nom == "<span class='glyphicon glyphicon-ok'></span>" && prenom == "<span class='glyphicon glyphicon-ok'></span>" && mail == "<span class='glyphicon glyphicon-ok'></span>" && MotDeP == "<span class='glyphicon glyphicon-ok'></span>" && MotDeV == "<span class='glyphicon glyphicon-ok'></span>" ) {
      return true;
    }
    else {
      return false;
    }

  }
}



//************************************************************************
//*******************CONECTION********************************************
//************************************************************************
function verifcasesCON()
{
  mail = document.getElementsByClassName('check')[5].innerHTML;
  MotDeP = document.getElementsByClassName('check')[6].innerHTML;

  if (mail == "<span class='glyphicon glyphicon-remove'>" || MotDeP == "<span class='glyphicon glyphicon-remove'>") {
    return false;
    document.getElementsByClassName('atentionRefaire')[1].style.display = "block";
  }
  else {
    document.getElementsByClassName('atentionRefaire')[1].style.display = "none";
    if (mail == "<span class='glyphicon glyphicon-ok'></span>" && MotDeP == "<span class='glyphicon glyphicon-ok'></span>") {
      return true;
    }
    else {
      return false;
    }

  }
}


function verifMDPCON(objet)
{
  valeur = objet.children[1].value;
  if (valeur=="") {
    objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'>";
    document.getElementsByClassName('atentionRefaire')[1].style.display = "block";
    document.getElementsByClassName('MDPconection')[0].style.display = "block";
  }
  else {

      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";
      document.getElementsByClassName('MDPconection')[0].style.display = "none";

  }

}

function verifMailCON(objet)
{
  regex = new RegExp("[@].[a-z]*.[.].[a-z]{1,3}$");
  valeur = objet.children[1].value;
  if (valeur=="") {
    objet.children[2].innerHTML = "<span class='glyphicon glyphicon-refresh'>";
    document.getElementsByClassName('Mail')[1].style.display = "none";

  }
  else {
    if (regex.test(valeur)) {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-ok'></span>";
      document.getElementsByClassName('Mail')[1].style.display = "none";
      verifcases();
    }
    else {
      objet.children[2].innerHTML = "<span class='glyphicon glyphicon-remove'>";
      document.getElementsByClassName('atentionRefaire')[1].style.display = "block";
      document.getElementsByClassName('Mail')[1].style.display = "block";
    }
  }

}


//************************************************************************
//*******************CHAT*************************************************
//************************************************************************

function envoyer(id) {
  var dLocal = new Date();
  date = dLocal.getHours()+':'+dLocal.getMinutes()+' '+dLocal.getDate()+'/'+ dLocal.getMonth()+'/'+dLocal.getFullYear();
  nom = id.toString();
  message = document.getElementsByClassName('texteEnvoyer')[0].value;
  requeteHttp = new XMLHttpRequest();
  var CodePost = "envoyer.php?id="+ nom + "&message="+message+"&date="+date;
  requeteHttp.open("GET", CodePost);
  requeteHttp.onreadystatechange=function(){reponseRecue(requeteHttp);};
  requeteHttp.send();
  document.getElementsByClassName('texteEnvoyer')[0].value = "";

}

function reponseRecue(requeteHttp){
    if (requeteHttp.readyState==4 && requeteHttp.status==200)
    {
    }
}

function reponseRecueRempli(requeteHttp) {
  if (requeteHttp.readyState==4 && requeteHttp.status==200)
  {
      document.getElementsByClassName('chat')[0].innerHTML = requeteHttp.responseText;
      mondiv = document.getElementsByClassName('panel-body')[0];
      if(mondiv.scrollHeight - mondiv.scrollTop < 600)
      {
        mondiv.scrollTop = mondiv.scrollHeight;
      }
  }
}

var x = '';

function actualisation() {
  requeteHttp = new XMLHttpRequest();
  var CodePost = "actualisation.php";
  requeteHttp.open("GET", CodePost);
  requeteHttp.onreadystatechange=function(){reponseRecueRempli(requeteHttp);};
  requeteHttp.send();
  clearTimeout(x);
   x = setTimeout(function(){actualisation();},2000);
}
