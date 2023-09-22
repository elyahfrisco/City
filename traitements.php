<?php

try {
if( $_GET['mode'] == 'vtc' )
{

	$message = 'Une demande de partenariat VTC a été envoyé du site City Car :


Nom : ' . htmlspecialchars(@$_POST['nom']) . '

Prénom : ' . htmlspecialchars(@$_POST['prenom']) . '

Société : ' . htmlspecialchars(@$_POST['societe']) . '

Date de création de la société : ' . htmlspecialchars(@$_POST['date']) . '

Email : ' . htmlspecialchars(@$_POST['email']) . '

Adresse : ' . htmlspecialchars(@$_POST['adresse']) . '

Téléphone : ' . htmlspecialchars(@$_POST['telephone']) . '

Code promo : ' . htmlspecialchars(@$_POST['promo']) . '
parrainage : ' .htmlspecialchars(@$_POST['parrainage']). '


Cordialement';


mail('citycarlease@gmail.com', 'Partenariat VTC', $message);

header('location: http://www.city-car.fr/vtc.html?msg=ok',true);

exit();

}
} catch(Exception $e) {}
header('location: http://www.city-car.fr/vtc.html?msg=error',true);



?>