<?php

include('../lang/PHP.php');
include('scripts/auto_mail.php');

if( $_GET['c'] == '1' )
{
	$destinataire = 'jerome@city-car.fr';
}
if( $_GET['c'] == '2' )
{
	$destinataire = 'jerome@city-car.fr';
}
if( $_GET['c'] == '3' )
{
	$destinataire = 'citycarlease@gmail.com';
}

trait_form('POST', $destinataire, 'Contact', 'CityCar', 'Bonjour, un visiteur souhaite vous contacter :', 'index.php', '');
exit;

?>