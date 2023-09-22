<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/background/bg5.jpg);margin-top:-20px;">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Partenariat VTC</h1>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
            <li class="active">Partenariat VTC</li>
        </ul>
    </div>
</div>
<div class="section-full bg-white content-inner">
    <div class="container">
	<? if( $_GET['msg'] == 'ok' ) {
		echo '<div class="row">
			<div class="col-md-12"><h2 class="h3">Votre demande a bien été transmise !</h2></div>
		</div>';
	}elseif( $_GET['msg'] == 'error' ) {
		echo '<div class="row">
			<div class="col-md-12"><h2 class="h3">Oops, une erreur est survenue... Merci de réessayer.</h2></div>
		</div>';
	} ?>
	<div class="row">	
		<div class="col-md-8">
			<div style="padding: 30px; border: solid 5px #8AD542;">
				<h2 class="h3 m-t50">Formulaire d'inscription</h2><br>
				<form action="traitements.php?mode=vtc" method="post">
					<input type="text" id="nom" name="nom" placeholder="Nom" class="form-control" /><br>
					<input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control" /><br>
					<input type="text" id="societe" name="societe" placeholder="Société *" class="form-control" required="required" /><br>
					<input type="text" id="date" name="date" placeholder="Date de création de la société *" class="form-control" required="required" /><br>
					<input type="text" id="email" name="email" placeholder="Email" class="form-control" /><br>
					<input type="text" id="adresse" name="adresse" placeholder="Adresse" class="form-control" /><br>
					<input type="text" id="telephone" name="telephone" placeholder="Téléphone *" class="form-control" required="required" /><br>
					<input type="text" id="promo" name="promo" placeholder="Code promo" class="form-control" /><br>
	                <input type="text" id="parrainage" name="parrainage" placeholder="Nom,email ou tel du parrain*" class="form-control" /><br>
	                <button type="submit" class="btn btn-outline-link btn-lg btn-block">Envoyer ma demande</button><br><br>
				</form>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
				    <h2 class="h4" style="font-weight: bold;">City Car est partenaire de votre réussite !</h2><br>
				    <h2 class="h4">Critères d’éligibilité</h2><br>
					- Etre travailleur indépendant VTC ou capacitaire depuis minimum 5 mois<br>
					- Etre détenteur de son dernier avis d’imposition avec des revenus déclarés<br>

					<h2 class="h4">Documents à fournir</h2>
					
					- CNI ou titre de séjour (Validité 10 ans)<br>
					- 3 derniers Relevés de compte bancaire<br>
					- Avis d’imposition de l’année en cours<br>
					- KBIS ou Répertoire INSEE<br>
					- RIB Original<br>
					- Carte vtc<br>
                    <h4><FONT COLOR="red" >*Parrainage</FONT COLOR="red" ></h4>
                    <small>*offre parrainage 500€ en cadeaux , réduction ou cheques!valable pour tout client ou futur client City car qui parraine un chauffeur acquéreur d un nouveau véhicule.</small><br><br>  
					<a href="/dossier.html"><button type="button" class="site-button button-lg">Envoyer les documents</button></a><br><br>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- For Your Quick Look -->
<div class="section-full bg-white content-inner car-listing">
    <div class="container">
        <div class="section-head">
            <h3 class="h3 text-uppercase">Nos VTC</h3>
        </div>
        <div class="section-content ">
            <div class="row">   
                <div class="dlab-tabs">
                    <div class="tab-content">
                        <div id="upcoming" class="tab-pane active">
                            <div class="col-md-12 owl-carousel owl-btn-style-2 quick-look">
                                <? $leases=$database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_img1 IS NOT NULL AND v_validation = ? AND v_vtc = "1" ORDER BY v_id ASC LIMIT 0,4'); $leases->execute(array($conf_site, 1)); $leases_cnt = $leases->rowCount(); while($leases_d = $leases->fetch()) {
                                    $imgnophoto = ( !empty($leases_d['v_img1']) ) ? '<img src="/crop.php?src='.urlencode('https://admin.city-car.fr/images/' . $leases_d['v_img1']) . '&h=536&w=720" class="img-responsive" alt="'.htmlspecialchars($leases_d['v_marque'].' '.substr($leases_d['v_model'], 0, 30)).'" />' : '<img src="http://www.city-car.fr/img/nophoto.jpg"  class="img-responsive" />'; ?>
                                    <div class="item">
                                        <div class="dlab-feed-list">
                                            <div class="dlab-media"> 
                                                <a href="<?=$leases_d['v_id']?>-<?=str_replace(' ', '-', strtolower($leases_d['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($leases_d['v_model'])) ?>"><?=$imgnophoto?></a>
                                            </div>
                                            <div class="dlab-info">
                                                <h4 class="dlab-title"><a href="<?=$leases_d['v_id']?>-<?=str_replace(' ', '-', (strtolower($leases_d['v_marque'])))?>-<?=str_replace(' ', '-',(strtolower($leases_d['v_model'])))?>" style="height: 43px;overflow: hidden;text-overflow: ellipsis;display: block;"><?=$leases_d['v_marque']?> - <?=$leases_d['v_model']?> <?=$leases_d['v_energie']?></a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price">En leasing à <span class="text-primary"><?=number_format($leases_d['v_prix'], 0, ',', ' ');?>€</span></p>
                                            </div>
                                            <div class="icon-box-btn text-center">
                                                <ul class="clearfix">
                                                    <li><?=explode('-', $leases_d['v_mise_en_circulation'])[2]; ?></li>
                                                    <li><?php switch ($leases_d['v_boite_de_vitesse']) {
                                                            case '0':
                                                                $set = '';
                                                                break;
                                                            case 'Automatique':
                                                                $set = 'Auto';
                                                                break;
                                                            default:
                                                                $set = $leases_d['v_boite_de_vitesse'];
                                                                break;
                                                        } echo $set; ?></li>
                                                    <li><?=$leases_d['v_kilometrage']?> km</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                            <div class="col-xs-12 m-t30"><a href="vehicules.html?vtc=1" class="btn btn-outline-success btn-lg btn-block">Toutes nos voitures VTC</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>