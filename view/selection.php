<?
if(isset($_GET['add'])) {
	if( empty($_SESSION['selection']) ){
		$_SESSION['selection'] = 'v_id = 0 OR v_id = ' . $_GET['id'];
	}else{
		$_SESSION['selection'] = $_SESSION['selection'] . ' OR v_id = ' . $_GET['id'];
	}
	header('Location: '.$settings['domain'].'selection.html');
}
if(isset($_GET['del'])) {
	$_SESSION['selection'] = str_replace(' OR v_id = ' . $_GET['id'], '', $_SESSION['selection']);
	header('Location: '.$settings['domain'].'selection.html');
}

$selection = (!empty($_SESSION['selection']) ) ? $_SESSION['selection'] : '0';
$paginations = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND '.$selection.' GROUP BY v_id ORDER BY v_id DESC');
$paginations->execute(array($conf_site));
$nombre = $paginations->rowCount();

$page = ( isset($_GET['page']) && $_GET['page'] != "0" ) ? htmlspecialchars($_GET['page']) : 0;

$selections = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND '.$selection.' GROUP BY v_id ORDER BY v_id DESC');
$selections->execute(array($conf_site));

?>
<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/background/bg7.jpg);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Sélection</h1>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
            <li>Sélection</li>
        </ul>
    </div>
</div>
<!-- contact area -->
<div class="section-full p-t50 bg-white content-inner-1">
	<!-- Product details -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="woo-entry">
					<table class="table-bordered dlab-cart-tbl">
	                    <thead class="text-center bg-primary">
	                        <tr>
								<th>Image</th>
								<th>Modèle</th>
								<th>Options</th>
								<th>Prix</th>
								<th>Kms</th>
								<th>Année</th>
								<th>Moteur</th>
								<th>Boîte</th>
								<th></th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<?php while( $result = $selections->fetch() )
							{ $imgnophoto = ( !empty($result['v_img1']) ) ? '<img src="/crop.php?src='.urlencode('https://admin.city-car.fr/images/' . $result['v_img1']) . '&w=200&h=100" class="thumbnail img-responsive" alt="'.htmlspecialchars($result['v_marque'].' '.substr($result['v_model'], 0, 30)).'" />' : '<img src="http://www.city-car.fr/img/nophoto.jpg" class="img-responsive" />'; ?>
							<tr>
								<td><?=$imgnophoto?></td>
								<td><a href="vehicule_<?=$result['v_id']?>_<?=urlencode(strtolower($result['v_marque']))?>-<?=urlencode(strtolower($result['v_model']))?>"><strong><?=$result['v_marque']?></strong><br><strong><?=$result['v_model']?></strong></a></td>
								<td><a href="#" class="tooltips" data-toggle="tooltip" data-placement="right" title="<?=$result['v_equipements_options']?>"><?=substr($result['v_equipements_options'], 0, 50)?>...</a></td>
								<td><strong><?=$result['v_prix']?>&euro;</strong></td>
								<td><strong><?=$result['v_kilometrage']?>Km</strong></td>
								<td><strong><?=$result['v_mise_en_circulation']?></strong></td>
								<td><strong><?=$result['v_energie']?></strong></td>
								<td><strong><?=$result['v_boite_de_vitesse']?></strong></td>
							    <td>
							    	<a href="?del&id=<?=$result['v_id']?>" class="site-button red radius-xl" type="button"><i class="fa fa-trash"></i></a>
							    </td>
							</tr>
							<? } ?>
	                    </tbody>
	                </table>
				</div>
			</div>
		</div>
	</div>
	<!-- Product details -->
</div>
<!-- contact area  END -->