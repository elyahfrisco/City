<?php

session_start();

//-------FONCTIONS
function connect()
{
	$mysqli = mysqli_connect('localhost', 'elje4878_db338418343', '(tXS5(5;KyGH') or die('ERREUR DE CONNEXION A LA BASE DE DONNEES');
	mysqli_select_db($mysqli, 'elje4878_db338418343') or die('ERREUR DE SELECTION DE LA BASE DE DONNEES');
	return $mysqli;
}
$mysqli = connect();

if( $_SESSION['admin'] != 'CityCarOK' )
{
	$_SESSION['admin'] = 'VISITEUR';
}

//-------CONFIGURATION DES PAGES
$conf_site = 'CityCar';
$conf_sql = 'SELECT * FROM g_configuration WHERE conf_site = "' . $conf_site . '"';
$conf_taff = mysqli_query($mysqli, $conf_sql);
$conf_result = mysqli_fetch_array($conf_taff);

$titre = 'CityCar - voiture pas cher, voiture occasion, voiture petit prix, voiture levallois, leasing smart, leasing occasion, achat voiture occasion, reprise véhicule';

$header = '<META NAME="TITLE" CONTENT="CityCar">
<META NAME="KEYWORDS" CONTENT="voiture pas cher, voiture occasion, voiture petit prix, voiture levallois, leasing smart, leasing occasion, achat voiture occasion, reprise véhicule">
<META NAME="LANGUAGE" CONTENT="FR">
<META NAME="SUBJECT" CONTENT="Vente de véhicules">
<META NAME="ROBOTS" CONTENT="index, follow, all">
<META NAME="AUTHOR" CONTENT="TLB Production">
<META NAME="REVISIT-AFTER" CONTENT="1 DAYS">

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-18375911-1\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>';

$recup_recherche = ( $_GET['rapide'] == "0" ) ? '' : htmlspecialchars($_GET['rapide']);

$recherche_barre = '<div align="right">
                <form id="form2" name="form2" method="get" action="vehicules.php?ma=3&amp;categorie=0&amp;energie=0&amp;annee=0&amp;marque=0&amp;prix_min=0&amp;kilometrage=0&amp;photo=0&amp;modele=0&amp;prix_max=0&amp;boite=0&amp;page=0">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td rowspan="2"><div align="center"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" name="dewplayer" width="483" height="70" align="middle" id="dewplayer">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="diapo.swf?img=diapo/1.jpg,diapo/2.jpg,diapo/3.jpg&amp;transition=push&amp;speed=20&amp;timer=3" />
	<param name="quality" value="high" />
	<embed src="diapo.swf?img=diapo/1.jpg,diapo/2.jpg,diapo/3.jpg&amp;transition=push&amp;speed=20&amp;timer=3" quality="high" width="483" height="70" name="dewplayer" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
</object></div></td>
                      <td height="20" colspan="2" valign="bottom"><div align="left" class="t3"><strong>Recherche</strong>
                              <input type="hidden" name="ma" id="ma" value="3" />
                              <input type="hidden" name="photo" id="photo" value="0" />
                              <input type="hidden" name="boite" id="boite" value="0" />
                              <input type="hidden" name="categorie" id="categorie" value="0" />
                              <input type="hidden" name="annee" id="annee" value="0" />
                              <input type="hidden" name="marque" id="marque" value="0" />
                              <input type="hidden" name="prix_min" id="prix_min" value="0" />
                              <input type="hidden" name="kilometrage" id="kilometrage" value="0" />
                              <input type="hidden" name="energie" id="energie" value="0" />
                              <input type="hidden" name="modele" id="modele" value="0" />
                              <input type="hidden" name="prix_max" id="prix_max" value="0" />
                              <input type="hidden" name="page" id="page" value="0" />
                      </div></td>
                      <td width="13" rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="140" height="30"><div align="left">
                          <input name="rapide" type="text" class="FormRecherche" id="rapide" style="width: 130px; height: 18px;" value="' . $recup_recherche . '" />
                      </div></td>
                      <td width="70"><div align="right">
                          <input type="image" src="img/ok.jpg" />
                      </div></td>
                    </tr>
                  </table>
                </form>
              </div>';

$copy = '<table><tr><td><a href="http://www.facebook.com/group.php?gid=57575038248&ref=ts" target="_blank"><img src="img/bouton_facebook.gif" border="0" style="margin-right: 20px;" /></a></td><td><span class="t4">&copy; Tous droits réservés <a href="admin.php"><strong>CityCar</strong></a> - 51 Rue Aristide Briand, 92300 Levallois Perret - Tel : 01 41 34 31 45 - Fax : 01 41 34 31 75 - Photos non contractuelles </span></td></tr></table>
<br />
<br />
<div class="t7" align="justify">voiture pas cher, voiture occasion, voiture petit prix, voiture levallois, leasing smart, leasing occasion, achat voiture occasion, reprise véhicule</div><br />

<map name="menu" id="menu">
  <area shape="rect" coords="602,3,719,49" href="contact.php?ma=6" />
  <area shape="rect" coords="482,3,599,49" href="services.php?ma=5" />
  <area shape="rect" coords="362,3,479,49" href="selection.php?ma=4" />
  <area shape="rect" coords="242,3,359,49" href="vehicules.php?ma=3&categorie=0&energie=0&annee=0&marque=0&prix_min=0&kilometrage=0&photo=0&modele=0&prix_max=0&boite=0&rapide=0&page=0" />
  <area shape="rect" coords="122,3,239,49" href="presentation.php?ma=2" />
<area shape="rect" coords="2,3,119,49" href="index.php?ma=1" />
</map>';

$menu_actif = ( isset($_GET['ma']) && $_GET['ma'] != 0 ) ? htmlspecialchars($_GET['ma']) : 1;

?>