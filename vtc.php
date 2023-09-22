<div class="header">
    <div class="container">
        <h4>Partenariat Chauffeur Privé</h4> 
        <ol class="breadcrumb">
            <li><a href="<?=$settings['domain'];?>">Accueil</a> 
            </li>
            <li class="active">Partenariat Chauffeur Privé</li>
        </ol>
        <div class="clear"></div>
    </div>
</div>
<div class="container">
<?
if( $_GET['msg'] == 'ok' )
{
	echo '<div class="row">
		<div class="col-md-12"><h2 class="h3">Votre demande a bien été transmise !</h2></div>
	</div>';
} elseif( $_GET['msg'] == 'error' ) {
	echo '<div class="row">
		<div class="col-md-12"><h2 class="h3">Oops, une erreur est survenue... Merci de réessayer.</h2></div>
	</div>';
}
?>
	<div class="row">	
		<div class="col-md-8" style="padding: 30px; border: solid 5px #8AD542;">
			<h2 class="h3">Formulaire d'inscription</h2><br>
			<form action="traitements.php?mode=vtc" method="post">
				<input type="text" id="nom" name="nom" placeholder="Nom" class="form-control" /><br>
				<input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control" /><br>
				<input type="text" id="societe" name="societe" placeholder="Société *" class="form-control" required="required" /><br>
				<input type="text" id="date" name="date" placeholder="Date de création de la société *" class="form-control" required="required" /><br>
				<input type="text" id="email" name="email" placeholder="Email" class="form-control" /><br>
				<input type="text" id="adresse" name="adresse" placeholder="Adresse" class="form-control" /><br>
				<input type="text" id="telephone" name="telephone" placeholder="Téléphone *" class="form-control" required="required" /><br>
				<input type="text" id="promo" name="promo" placeholder="Code promo" class="form-control" /><br>
                                <input type="email" id="parrainage" name="parrainage" placeholder="email du parrain" class="form-control" /><br>
				<button type="submit" class="flat-green">Envoyer ma demande</button><br><br>
	
			</form>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
				    <img src="img/chauffeur_fond-clair.jpg" width="70%" /><br><br>
				    <h2 class="h4" style="font-weight: bold;">City Car et Chauffeur Privé, Partenaires de votre réussite !</h2><br>
				    <h2 class="h4">Critères d’éligibilité</h2><br>
					- Etre travailleur indépendant VTC ou capacitaire depuis minimum 5 mois<br>
					- Etre en partenariat avec Chauffeur Privé<br>
					- Etre détenteur de son dernier avis d’imposition avec des revenus déclarés<br><br>
					<h2 class="h4">Documents à fournir</h2>
					<br>
					- CNI ou titre de séjour (Validité 10 ans)<br>
					- 3 derniers Relevés de compte bancaire<br>
					- Avis d’imposition de l’année en cours<br>
					- KBIS ou Répertoire INSEE<br>
					- RIB Original<br>
					- Carte vtc<br><br>
					<a href="/dossier.html"><button type="button" class="flat-green">Envoyer les documents</button></a><br><br>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="dker ">
    <div class="container pf">
        <h3 class="ht">Nos VTC</h3> 
        <div class="hr"></div>
        <div class="row">
            <? $leases=$database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_img1 IS NOT NULL AND v_validation = ? AND v_vtc = "1" ORDER BY v_id ASC LIMIT 0,4'); $leases->execute(array($conf_site, 1)); $leases_cnt = $leases->rowCount(); while($leases_d = $leases->fetch()) { ?>
            <div class="col-sm-3 lease-item">
                <img class="img-responsive" src="http://admin.city-car.fr/images/<?=$leases_d['v_img1']?>">
                <div class="lease-inner">
                    <h4> <?=$leases_d['v_marque'];?></h4>  <span><?=$leases_d['v_carrosserie'];?></span> 
                    <p>
                        <?=$leases_d[ 'v_model'];?>
                    </p>
                </div>
                <div class="lease-footer"> <a href="<?=$leases_d['v_id']?>-<?=str_replace(' ', '-', strtolower($leases_d['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($leases_d['v_model'])) ?>"><i class="fa fa-bookmark-o"></i> En leasing à <?=number_format($leases_d['v_prix'], 0, ',', ' ');?>€ </a> 
                    </li>
                </div>
            </div>
            <? } ?>
        </div> <a href="vehicules.html?vtc=1" class="flat-green lease-btn">Toutes nos voitures VTC</a> 
    </div>
</div>