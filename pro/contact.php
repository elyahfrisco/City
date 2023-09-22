<?php
include('lang/PHP.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$titre?></title>

<link href="lang/CSS.css" rel="stylesheet" />

<style>
body
{
	background-image: url(img/fond1.jpg);
	background-repeat: repeat-x;
}
</style>

<?=$header?>

</head>

<body>
<div align="center">
  <table width="990" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="990" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="265"><a href="index.php"><img src="img/logo.jpg" width="265" height="150" border="0" /></a></td>
          <td width="725"><table width="725" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="95" align="center"><img src="img/tel.png" width="300" height="80" /></td>
              <td align="center"><a href="http://www.city-car.fr/" target="_blank"><img src="img/bt1cc.jpg" width="100" height="30" border="0" /></a></td>
              <td align="center"><a href="http://www.citycarlease.com/" target="_blank"><img src="img/bt2cc.jpg" width="100" height="30" border="0" /></a></td>
            </tr>
            <tr>
              <td height="55" colspan="3"><img src="img/l_menu4.jpg" width="725" height="55" border="0" usemap="#Map" />
                <map name="Map" id="Map">
                  <area shape="rect" coords="486,6,596,48" href="contact.php" />
                  <area shape="rect" coords="366,6,476,48" href="presentation.php" />
                  <area shape="rect" coords="246,6,356,48" href="leasing.php" />
                  <area shape="rect" coords="126,6,236,48" href="index.php" />
                  </map></td>
            </tr>
          </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="990" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"></td>
          </tr>
        <tr>
          <td width="20" height="400" valign="middle" style="background-image: url(img/bl1.png); background-position: center; background-repeat: no-repeat;"><div align="center">
            <form id="form3" name="form1" method="post" action="trait_contact.php?c=3">
              <table width="900" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="280" height="30"><div align="left">Nom :</div></td>
                  <td width="20" rowspan="9">&nbsp;</td>
                  <td width="280" rowspan="9" align="center"><strong>Adresse :</strong><br />
                    51 Rue Aristide Briand,&nbsp;92300 Levallois Perret<br />
  <br />
  <strong>Horaires d'ouverture :</strong><br />
                    Du Lundi au Vendredi<br />
                    de 9h30 &agrave; 19h30 (20h sur RDV)<br />
                    et Dimanche sur RDV&nbsp;de 10h30 &agrave; 17h30.<br />
  <br />
  <strong>Contact :</strong><br />
                    Tel : 01 41 34 31 45<br />
                    Fax : 01 41 34 31 75&nbsp;<br />
                    Port : 06 68 90 10 10</td>
                  <td width="20" rowspan="9" align="center">&nbsp;</td>
                  <td rowspan="9" align="left"><p>Vous avez besoin d'un renseignement suppl&eacute;mentaire? Un conseil?<br />
                    Faites appel &agrave; votre interlocuteur City Car Lease<br />
                    au 01 41 34 31 45</p>
                    <p><strong>Pour toute &eacute;tude de dossier merci de nous faire parvenir les documents suivants par fax<br />
                      au 01 41 34 31 75 ou par mail &agrave; <a href="mailto:citycarlease@gmail.com">citycarlease@gmail.com</a>:</strong></p>
                    <p>- Pi&egrave;ce d'identit&eacute; recto/verso du titulaire.<br />
                      - 3 derniers bulletins de salaires.<br />
                      - Un RIB original<br />
                      - Quittance EDF (-3mois)<br />
                      - vos coordon&eacute;es t&eacute;l&eacute;phoniques et le modele du v&eacute;hicule souhait&eacute;</p>
                    <p><strong>Une r&eacute;ponse vous sera donn&eacute;e sous 24H maximum et le v&eacute;hicule vous sera mis &agrave; disposition au plus tard dans un d&eacute;lai de 8 jours sous r&eacute;serve d'acceptation de votre dossier.</strong></p></td>
                </tr>
                <tr>
                  <td><div align="left">
                    <input name="nom" type="text" class="FormNormal" id="textfield9" style="width: 280px;" />
                  </div></td>
                  </tr>
                <tr>
                  <td height="30"><div align="left">Email :</div></td>
                  </tr>
                <tr>
                  <td><div align="left">
                    <input name="email" type="text" class="FormNormal" id="textfield10" style="width: 280px;" />
                  </div></td>
                  </tr>
                <tr>
                  <td height="30"><div align="left">T&eacute;l&eacute;phone :</div></td>
                  </tr>
                <tr>
                  <td><div align="left">
                    <input name="telephone" type="text" class="FormNormal" id="textfield11" style="width: 280px;" />
                  </div></td>
                  </tr>
                <tr>
                  <td height="30"><div align="left">Message :</div></td>
                  </tr>
                <tr>
                  <td><div align="left">
                    <textarea name="message" rows="5" class="FormNormal" id="textfield12" style="width: 280px;"></textarea>
                  </div></td>
                  </tr>
                <tr>
                  <td height="35" valign="bottom"><div align="center">
                    <input type="image" src="img/envoyer.jpg" />
                  </div></td>
                  </tr>
              </table>
            </form>
          </div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
    </tr>
    <tr>
      <td height="20"><div align="center"><?=$copy?></div></td>
    </tr>
  </table>
</div>

</body>
</html>
