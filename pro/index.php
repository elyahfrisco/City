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

<!--
  jQuery library
-->
<script type="text/javascript" src="lib/jquery-1.4.2.min.js"></script>
<!--
  jCarousel library
-->
<script type="text/javascript" src="lib/jquery.jcarousel.min.js"></script>
<!--
  jCarousel skin stylesheet
-->
<link rel="stylesheet" type="text/css" href="skins/tango/skin.css" />

<script type="text/javascript">

function mycarousel_initCallback(carousel)
{
	    jQuery('.jcarousel-control a').bind('mouseover', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
        return false;
    });
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        wrap: 'last',
		scroll: 1,
        initCallback: mycarousel_initCallback
    });
});

</script>

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
              <td height="55" colspan="3"><img src="img/l_menu1.jpg" width="725" height="55" border="0" usemap="#Map" /></td>
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
          <td align="center" valign="top">
          
<div id="wrap">

  <ul id="mycarousel" class="jcarousel-skin-tango">
    <li><a href="leasing.php#l1"><img src="img/d1.png" alt="" width="910" height="400" border="0" /></a></li>
    <li><a href="leasing.php#l2"><img src="img/d2.png" alt="" width="910" height="400" border="0" /></a></li>
    <li><a href="leasing.php#l3"><img src="img/d3.png" alt="" width="910" height="400" border="0" /></a></li>
    <li><a href="leasing.php#l4"><img src="img/d4.png" alt="" width="910" height="400" border="0" /></a></li>
  </ul>
  
  <div id="mycarousel" class="jcarousel-skin-tango">
    <div class="jcarousel-control">
    
    <table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="225" align="center"><a href="#"><span style="display: none;">1</span><img src="img/b1.png" width="150" height="80" border="0" /></a></td>
        <td width="225" align="center"><a href="#"><span style="display: none;">2</span><img src="img/b2.png" width="150" height="80" border="0" /></a></td>
        <td width="225" align="center"><a href="#"><span style="display: none;">3</span><img src="img/b3.png" width="150" height="80" border="0" /></a></td>
        <td width="225" align="center"><a href="#"><span style="display: none;">4</span><img src="img/b4.png" width="150" height="80" border="0" /></a></td>
      </tr>
    </table></div>
  </div>
          
          </td>
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

<map name="Map" id="Map"><area shape="rect" coords="486,6,596,48" href="contact.php" /><area shape="rect" coords="366,6,476,48" href="presentation.php" /><area shape="rect" coords="246,6,356,48" href="leasing.php" />
  <area shape="rect" coords="126,6,236,48" href="index.php" />
</map>
</body>
</html>
