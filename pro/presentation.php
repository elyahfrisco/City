<?php
include('lang/PHP.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$titre?></title>

<link href="lang/CSS.css" rel="stylesheet" />

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
              <td height="55" colspan="3"><img src="img/l_menu3.jpg" alt="" width="725" height="55" border="0" usemap="#Map" />
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
          <td height="623"><div align="center">
            <table width="980" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="980" height="622" valign="top" background="img/block9.jpg"><div align="center">
                  <table width="950" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="60">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                </div></td>
              </tr>
            </table>
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
