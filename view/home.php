<? //-------Catégories
$categories = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_carrosserie ORDER BY v_carrosserie ASC');
$categories->execute(array($conf_site));

//-------Marques
$marques = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_marque ORDER BY v_marque ASC');
$marques->execute(array($conf_site));

//-------Modèles
$modeles = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_model ORDER BY v_model ASC');
$modeles->execute(array($conf_site));

//-------Energies
$sql = 'SELECT * FROM g_voitures WHERE v_site = "' . $conf_site . '" GROUP BY v_energie ORDER BY v_energie ASC';
$taff = mysqli_query($mysqli, $sql);
while( $result = mysqli_fetch_array($taff) )
{
  $energies_liste .= '<option value="' . $result['v_energie'] . '">' . $result['v_energie'] . '</option>
  ';
}

//-------Années
for( $i = 1990; $i <= date('Y'); $i++ )
{
  $annees_liste .= '<option value="' . $i . '">' . $i . '</option>
  ';
}

//-------Kilométrages
for( $i = 10000; $i < 210000; $i = ($i + 10000) )
{
  $kilometrages_liste .= '<option value="' . $i . '">' . number_format($i, 0, ',', ' ') . ' km</option>
  ';
}

//-------Prix
for( $i = 1000; $i <= 100000; $i = ($i + 500) )
{
  $prix_liste .= '<option value="' . $i . '">' . number_format($i, 0, ',', ' ') . ' €</option>
  ';
} ?>

<div class="main-slider style-two default-banner">
    <!-- Form --> 
    <div class="form-slide">
      <div class="container">
		  <h1 class="h2 text-white text-center"><span class="h1 show">CityCar</span> <span class="show text-uppercase ">Leasing de voitures d'occasion</span></h1>
        <form class="search-car" role="form" method="GET" action="/vehicules.html" style="overflow:visible">
			<div class="form-head" style="overflow:hidden">
            <h2>Recherche rapide</h2>
          </div>
          <!-- TABS -->
          <div class="form-find-area">
            <div class="tab-content">
             <div id="brand-car"  class="tab-pane active clearfix">
                <div id="used_budgetDiv" class="used_form_div">
                  <div class="input-group">
					  <select class="form-control" name="categorie">
						  <option selected value="0">Catégories</option>
                      <? while( $result = $categories->fetch()) { ?>
                      <option value="<?=$result['v_carrosserie'];?>">
                      <?=$result['v_carrosserie'];?>
                      </option>
                      <? } ?>
                    </select>
                  </div>
                  <div class="input-group">
					  <select class="form-control" name="marque">
                      <option selected value="0">Marques</option>
                        <? while( $result = $marques->fetch()) { ?>
                        <option value="<?=$result['v_marque'];?>">
                        <?=$result['v_marque'];?>
                        </option>
                        <? } ?>
                    </select>
                  </div>
                  <div class="input-group">
					<select class="form-control" name="prix-max">
						<option selected value="0">Prix maximum</option>
                      <option value="150">moins de 150€/mois</option>
                      <option value="299">moins de 299€/mois</option>
                      <option  value="499">moins de 499€/mois</option>
                      <option value="699">moins de 699€/mois</option>
                      <option value="100000">700€/mois et plus</option>
                    </select>
                  </div>
                </div>                
                <div class="input-group">
                  <button class="site-button button-lg btn-block" type="submit">RECHERCHER</button>
                </div>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>  
    <!-- Form END --> 
</div>

<!-- About Us -->
<div class="section-full about-us bg-white content-inner-2">
  <div class="container">
    <div class="text-center">
        <h2 class="h3 text-uppercase"><div class="text-primary">Notre sélection</div> de voitures fiables</h2>
        <div class="dlab-separator bg-gray-dark"></div>
    </div>
    <div class="row">
      <div class="img-carousel-content owl-carousel owl-none col-md-12">
        
        <div class="item" style="background:white;">
          <div class="dlab-box product-item">
            <div class="dis-tbl m-auto">
              <a href="/vehicules.html?prix-max=150" class="m-b30 dis-tbl-cell dlab-box text-center counter-style-3 rounded text-primary">
                <span class="small text-muted">Moins de</span> 
                <div class="h2 text-primary m-b0 m-t0">150€</div>
                <span class="counter-text text-uppercase text-black">par mois</span> 
              </a>
            </div>
            <!--<div class="dlab-media">
              <img src="images/car1.png" alt="">
            </div>-->
          </div>
        </div>

        <div class="item" style="background:white;">
          <div class="dlab-box product-item">
            <div class="dis-tbl m-auto">
              <a href="/vehicules.html?prix-min=150&prix-max=299" class="m-b30 dis-tbl-cell dlab-box text-center counter-style-3 rounded text-black">
                <span class="small text-muted">de 150€ à</span> 
                <div class="h2 text-primary m-b0 m-t0">299€</div>
                <span class="counter-text text-uppercase text-black">par mois</span> 
              </a>
            </div>
            <!--<div class="dlab-media">
              <img src="images/car2.png" alt="">
            </div>-->
          </div>
        </div>
		  
        <div class="item" style="background:white;">
          <div class="dlab-box product-item">
            <div class="dis-tbl m-auto">
              <a href="/vehicules.html?prix-min=300&prix-max=499" class="m-b30 dis-tbl-cell dlab-box text-center counter-style-3 rounded text-primary">
                <span class="small text-muted">de 300€ à</span> 
                <div class="h2 text-primary m-b0 m-t0">499€</div>
                <span class="counter-text text-uppercase text-black">par mois</span> 
              </a>
            </div>
            <!--<div class="dlab-media">
              <img src="images/car3.png" alt="">
            </div>-->
          </div>
        </div>

        <div class="item" style="background:white;">
          <div class="dlab-box product-item">
            <div class="dis-tbl m-auto">
              <a href="/vehicules.html?prix-min=500&prix-max=700" class="m-b30 dis-tbl-cell dlab-box text-center counter-style-3 rounded text-black">
                <span class="small text-muted">de 500€ à</span> 
                <div class="h2 text-primary m-b0 m-t0">700€</div>
                <span class="counter-text text-uppercase text-black">par mois</span> 
              </a>
            </div>
            <!--<div class="dlab-media">
              <img src="images/car4.png" alt="">
            </div>-->
          </div>
        </div>	  

      </div>
      <div class="col-xs-12 text-center">
        <a href="/vehicules.html" class="site-button button-lg m-b15 m-t30" type="button">Toutes nos voitures en leasing</a>
      </div>

    </div>
  </div>
</div>
<!-- About Us END -->

<!-- Promos VTC -->
<div class="section-full bg-img-fix dlab-new-work overlay-white-dark ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-4  p-a0 no-of-item">
        <div class="no-of-item-dtl">
          <h2 style="color:#8bd545;opacity:1;font-size:60px">VTC</h2>
          <h3 class="text-uppercase">Nos promotions</h3>
        </div>
      </div>
      <div class="col-md-9 col-sm-8 p-a0">
        <div class="new-item owl-btn-style-1 owl-carousel">
          <?php $promos = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_promo = ? AND v_validation = ? ORDER BY v_id DESC LIMIT 4,4');
          $promos->execute(array($conf_site, 2, 1));
          $promos_cnt = $promos->rowCount();
          while($result = $promos->fetch()){
            $imgnophoto = ( !empty($result['v_img1']) ) ? '/images/' . $result['v_img1'] : '/img/nophoto.jpg'; ?>
            <div class="item dlab-new-item">
              <div class="dlab-box">
                <div class="dlab-media"> 
					<a href="<?=$result['v_id']?>-<?=str_replace(' ', '-', strtolower($result['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($result['v_model'])) ?>"><img src="https://admin.city-car.fr<?=$imgnophoto;?>" alt="<?php echo htmlspecialchars($result['v_marque'].' '.substr($result['v_model'], 0, 30)); ?>"></a> 
                </div>
                <div class="dlab-info">
                  <p class="event-date"><?=$result['v_prix'];?> € / mois*</p>
                  <h4 class="dlab-title"><a href="<?=$result['v_id']?>-<?=str_replace(' ', '-', strtolower($result['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($result['v_model'])) ?>"><?php echo $result['v_marque'].'<br>'.substr($result['v_model'], 0, 30); ?>  <i class="fa fa-angle-right pull-right"></i></a></h4>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
	  <div class="text-center">
		  <a href="/vehicules.html?vtc=1" class="site-button button-lg m-b60 m-t30" type="button">Toutes nos promotions VTC</a>
	  </div>
  </div>
</div>
<!-- Promos VTC END -->

<!-- Promos leasing -->
<div class="section-full bg-img-fix dlab-new-work overlay-white-dark ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-4  p-a0 no-of-item">
        <div class="no-of-item-dtl">
          <h2 style="color:#8bd545;opacity:1;font-size:60px">Leasing</h2>
          <h3 class="text-uppercase">Nos promotions</h3>
        </div>
      </div>
      <div class="col-md-9 col-sm-8 p-a0">
        <div class="new-item owl-btn-style-1 owl-carousel">
          <?php $promos = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_promo = ? AND v_validation = ? ORDER BY v_id DESC LIMIT 0,4');
          $promos->execute(array($conf_site, 2, 1));
          $promos_cnt = $promos->rowCount();
          while($result = $promos->fetch()){
            $imgnophoto = ( !empty($result['v_img1']) ) ? '/images/' . $result['v_img1'] : '/img/nophoto.jpg'; ?>
            <div class="item dlab-new-item">
              <div class="dlab-box">
                <div class="dlab-media"> 
                  <a href="<?=$result['v_id']?>-<?=str_replace(' ', '-', strtolower($result['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($result['v_model'])) ?>"><img src="https://admin.city-car.fr<?=$imgnophoto;?>" alt="<?php echo htmlspecialchars($result['v_marque'].' '.substr($result['v_model'], 0, 30)); ?>"></a> 
                </div>
                <div class="dlab-info">
                  <p class="event-date"><?=$result['v_prix'];?> € / mois*</p>
                  <h4 class="dlab-title"><a href="<?=$result['v_id']?>-<?=str_replace(' ', '-', strtolower($result['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($result['v_model'])) ?>"><?php echo $result['v_marque'].'<br>'.substr($result['v_model'], 0, 30); ?>  <i class="fa fa-angle-right pull-right"></i></a></h4>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
	  <div class="text-center">
		  <a href="/vehicules.html" class="site-button button-lg m-b60 m-t30" type="button">Tous nos véhicules en leasing</a>
	  </div>
  </div>
</div>
<!-- Promos leasing END -->

<div class="section-full content-inner text-white bg-gray bg-img-fix overlay-black-middle" style="background-image: url(images/main-slider/slide2.jpg);min-height:400px"></div>

<div class="section-full content-inner-1"
  <div class="dlab-info-about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="about-us-info text-left">
              <span class="text-primary">Concessionnaire multimarques</span>
              <h3 class="h3">CITY-CAR.FR à Levallois depuis 2007</h3>
              <div class="dlab-separator bg-gray-dark"></div>
              <p class="text-muted">installé depuis 2007 au cœur de Levallois perret vous propose la solution entreprise et particuliers pour répondre à vos besoins dans les meilleurs délais et les meilleurs coûts.</p>
              <p>Professionnel reconnu pour la qualité du service et des offres de leasing, city car Lease vous permet de recevoir votre véhicule en un temps recors et Grace a notre centrale d'achat city car Lease fait bénéficier ses nombreux clients de remises constructeur.
              Fort de l'expertise de ses fondateurs, city car Lease est un groupe national qui étend son activité auprès de particuliers, d'entreprises et de professions libérale.
              City car Lease met a votre disposition des véhicules neuf ou occasions récente, type véhicule collaborateur ou direction a des tarifs très intéressant. Contactez nous pour connaître les différentes options de leasing qui s'offre a vous et vous recevrez un devis sur mesure en 24h.</p>
          </div>  
        </div>
        <!--<div class="col-md-6">
          <div class="about-side-img wow fadeInRight" data-wow-duration="1.50s" data-wow-delay="0.50s">
			<div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ydyGiq7hnOg?controls=0" allowfullscreen></iframe>
			</div>
          </div>
        </div>-->
	  </div>
		<div class="row">
			<div class="col-md-6 col-md-push-6">
				<div class="about-us-info text-left">
					<h3 class="h3">Jusqu’à 30 % de remise sur le prix du neuf</h3>
					<div class="dlab-separator bg-gray-dark"></div>
					<p>Bénéficiez de <strong>20 à 30 % de remise</strong> sur l’achat de votre véhicule neuf ou d’occasion.<br/>
						Sur city-car.fr vous accédez à une offre exclusive de <strong>véhicules neufs et d’occasions récentes</strong> à des prix imbattables.<br/>
						Tous nos véhicules sont <strong>disponibles immédiatement</strong> sur notre site de Levallois Perret.<br/>
						Votre véhicule est <strong>entièrement révisé</strong> avant de vous être livré. </p>
				</div>
			</div>
			<div class="col-md-6 col-md-pull-6">
				<div class="wow fadeInLeft" data-wow-duration="1.50s" data-wow-delay="0.50s">
					<img src="images/main-slider/slide2.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="about-us-info text-right">
					<h3 class="h3">6 à 12 mois de garantie incluse</h3>
					<div class="dlab-separator bg-gray-dark"></div>
					<p>Grâce à notre partenaire « Garanties France », vous bénéficiez de <strong>6 à 12 mois de garantie</strong> mécanique pour votre nouveau véhicule. <br/>
						Chaque véhicule de notre parc est <strong>entièrement révisé</strong> avant d’être vendu et dispose d’un <strong>contrôle technique valide</strong>.</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow fadeInRight" data-wow-duration="1.50s" data-wow-delay="0.50s">
					<img src="images/main-slider/slide2.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-6">
				<div class="about-us-info text-left">
					<h3 class="h3">Financez votre véhicule en quelques clics</h3>
					<div class="dlab-separator bg-gray-dark"></div>
					<p>Remplissez votre <strong>dossier de financement</strong> en vous rendant directement sur la page « dossier ».<br/>
						Envoyez vos documents grâce au formulaire sécurisé et recevez une <strong>réponse sous 48 h</strong>.  <br/>
						Une fois votre mensualité validée par notre partenaire financier, il ne vous reste qu’à <strong>choisir le véhicule de vos rêves</strong> et à le réserver. </p>
				</div>
			</div>
			<div class="col-md-6 col-md-pull-6">
				<div class="wow fadeInLeft" data-wow-duration="1.50s" data-wow-delay="0.50s">
					<img src="images/main-slider/slide2.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="about-us-info text-right">
					<h3 class="h3">Offre spéciale VTC</h3>
					<div class="dlab-separator bg-gray-dark"></div>
					<p>Nos offres de leasing incluent <strong>la maintenance et l’assurance</strong> de votre véhicule. <br/>
						<strong>Vous roulez et City car s’occupe du reste !</strong><br/>
						Concentrez-vous sur votre métier et laissez-nous <strong>prendre soin de votre outil de travail</strong>. <br/>
						Le leasing vous permet de <strong>limiter vos frais</strong> tout en profitant de <strong>tous les avantages d’un véhicule neuf</strong>. </p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow fadeInRight" data-wow-duration="1.50s" data-wow-delay="0.50s">
					<img src="images/main-slider/slide2.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>
		<div class="about-us-info">
			<h2 class="h2">Votre nouvelle voiture est forcément chez City Car</h2>
			<div class="dlab-separator bg-gray-dark"></div>
			<p>Sur city-car.fr vous disposez d’une <strong>sélection exclusive</strong> de véhicules neufs et d’occasions récentes <strong>disponibles immédiatement</strong>. Tous nos véhicules possèdent un contrôle technique en cours de validité et font l’objet d’une <strong>révision complète avant livraison</strong>. </p>
			<p>En choisissant votre voiture chez City Car, vous optez pour <strong>un véhicule haut de gamme au meilleur tarif</strong>. Nos voitures bénéficient d’une <strong>garantie mécanique de 6 à 12 mois</strong>. </p>
			<p>Nous disposons d’une <strong>large collection de véhicules</strong> sur notre parc de <strong>Levallois Perret</strong>. BMW, Mercedes, Audi, Renault, Citroën, nous offrons un <strong>grand choix de marques</strong> pour vous permettre de satisfaire toutes vos envies. <strong>Berlines</strong> spacieuses, <strong>monospaces</strong> familiaux ou <strong>4x4</strong>, vous trouverez forcément la voiture qui vous convient dans notre catalogue.</p>
			<p>Avec City Car, vous faites <strong>des économies sur l’achat de votre véhicule</strong>. Nos tarifs négociés nous permettent d’afficher des prix entre <strong>20 et 30 % moins chers que le neuf</strong>. Et grâce à notre partenaire financier, vous réalisez jusqu’à <strong>50 % d’économies sur votre mensualité</strong>. </p>
			<p>Et vous avez la possibilité de <strong>financer votre véhicule en quelques clics</strong> seulement. En vous rendant à la page « Dossier » de notre site, vous accédez à un <strong>formulaire sécurisé</strong> qui vous permet de nous transmettre vos documents en toute confidentialité. Une fois votre dossier validé, il ne vous reste plus qu’à <strong>choisir votre véhicule</strong> dans notre sélection. </p>
		</div>
    </div>
  </div>
</div>

<!-- Latest News -->
<?php
function get_latest_news($count = 10) {
	$count = max(0, $count);
	$posts = array();
	try {
		$feed_cache = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'latest-news.json';
		if(is_file($feed_cache) && (time() - filemtime($feed_cache) < 86400)) { // 1 day
			$posts = json_decode(file_get_contents($feed_cache), true);
			return $posts;
		}
		$feed = simplexml_load_file('https://blog.city-car.fr/feed/', 'SimpleXMLElement', LIBXML_NOCDATA);
		foreach($feed->channel->item as $feed_item) {
			if(--$count < 0) {
				break;
			}
			$posts[] = array(
				'title' => (string) $feed_item->title,
				'link' => (string) $feed_item->link,
				'description' => (string) $feed_item->description,
				'image' => (string) @$feed_item->children('media', true)->content->attributes()['url']
			);
		}
		file_put_contents($feed_cache, json_encode($posts));
	} catch(Exception $e) {
		//
	}
	return $posts;
}
if($posts = get_latest_news(3)):
?>
<div class="section-full bg-primary content-inner-1">
  <div class="container">
    <div class="section-head text-center head-1">
      <h3 class="h3 text-uppercase">Le blog de CityCar</h3>
    </div>
    <div class="row">
      <div class="blog-carousel owl-carousel col-md-12">
		<?php foreach($posts as $post): ?>
        <div class="item">
          <div class="ow-blog-post date-style-2 dlab-latest-blog">
			<?php if($post['image']): ?>
            <div class="ow-post-media dlab-img-effect zoom-slow"> <img src="<?php echo $post['image'] ?>" alt="<?php echo $post['title'] ?>"> </div>
			<?php endif ?>
            <div class="ow-post-info ">
              <div class="ow-post-title">
				  <h4 class="post-title"> <a href="<?php echo $post['link'] ?>"><?php echo $post['title'] ?></a> </h4>
              </div>
              <div class="ow-post-text">
                <p><?php echo $post['description'] ?></p>
              </div>
              <div class="ow-post-readmore "> 
                <a href="<?php echo $post['link'] ?>" class="site-button-link"> Lire la suite <i class="fa fa-angle-right"></i></a> 
              </div>
            </div>
          </div>
        </div>
		<?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<!-- Latest News END-->
