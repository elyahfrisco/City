<?
$vehicule = htmlspecialchars($_GET['v']);

$categories = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_id = ?');
$categories->execute(array($conf_site, $vehicule));
$result = $categories->fetch();

if( !empty($result['v_img1']) ){ $images[] = 'https://admin.city-car.fr/images/' . $result['v_img1']; }
if( !empty($result['v_img2']) ){ $images[] = 'https://admin.city-car.fr/images/' . $result['v_img2']; }
if( !empty($result['v_img3']) ){ $images[] = 'https://admin.city-car.fr/images/' . $result['v_img3']; }
if( !empty($result['v_img4']) ){ $images[] = 'https://admin.city-car.fr/images/' . $result['v_img4']; }
if( !empty($result['v_img5']) ){ $images[] = 'https://admin.city-car.fr/images/' . $result['v_img5']; }

$similars = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_validation = ? AND v_marque = ? AND v_id <> ? ORDER BY v_id DESC LIMIT 0, 4');
$similars->execute(array($conf_site, 1, $result['v_marque'], $result['v_id']));

?>
<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(<?php echo $images[0]; ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white"><?=$result['v_marque']?> <?=$result['v_model']?></h1>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
            <li><a href="<?=$settings['domain'];?>vehicules.html">Véhicules</a></li>
            <li class="active"><?=$result['v_marque']?> <?=$result['v_model']?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb row END -->
<div class="section-full p-t50 bg-white content-inner-1">
    <div class="container">
        <div class="row">
            <!-- Side bar start -->
            <div class="col-md-8 col-lg-9 col-sm-7">
              <div class="row">
                <div class="col-md-6">
                  <div class="icon-bx-wraper bx-style-1 p-a20 p-b10 m-b30">
                    <h3 class="h2 m-t0 m-b20"><?=number_format($result['v_prix'], 0, ',', ' ')?>&euro; /mois</h3>
                    <h4 class="h4 m-b20"><?=$result['v_marque']?> <?=$result['v_model']?></h4> 
                    <ul class="list-check-circle primary">
                      <?php if($result['v_couleur_ext']){ ?><li><strong>Couleur Ext. : </strong><? echo $result['v_couleur_ext']; ?></li><?php } ?>
                      <?php if($result['v_couleur_int']){ ?><li><strong>Couleur Int. : </strong><? echo $result['v_couleur_int']; ?></li><?php } ?>
                      <?php if($result['v_carrosserie']){ ?><li><strong>Carrosserie : </strong><? echo $result['v_carrosserie']; ?></li><?php } ?>
                      <?php if($result['v_garantie']){ ?><li><strong>Garantie : </strong><? echo $result['v_garantie']; ?></li><?php } ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6 m-b30">
                  <div class="owl-fade-one owl-carousel owl-btn-center-lr popupgalerie">
                    <?php foreach ($images as $img) {
                      echo '<a href="'.$img.'" href="#" class="item onePopup"><div class="dlab-thum-bx"><img class="mfp-gallery" src="'.$img.'" alt="'.htmlspecialchars($result['v_marque'].' '.substr($result['v_model'], 0, 30)).'"></div></a>';
                    } ?>
                  </div>
                </div>
              </div>
              <div class="clearfix">
                <h3 class="h5 m-b20 m-t0">Équipements et options :</h3>
                <div class="dlab-separator bg-primary"></div>
              </div>
              <div class="clearfix">
                <div class="used-car-features grid2 clearfix m-b30 m-t30">
                  <div class="car-features">
                    <i class="flaticon-calendar text-primary"></i>
                    <h5><? echo $result['v_mise_en_circulation'] ?></h5>
                    <span>1<sup>ere</sup> Circulation</span>  
                  </div>
                  <div class="car-features">
                    <i class="flaticon-dashboard text-primary"></i>
                    <h5><? echo $result['v_kilometrage'] ?>&nbsp;Km</h5>
                    <span>Au compteur</span> 
                  </div>
                  <div class="car-features">
                    <i class="flaticon-gas-station text-primary"></i>
                    <h5><? echo $result['v_energie'] ?></h5>
                    <span>Énergie</span> 
                  </div>
                  <div class="car-features">
                    <i class="flaticon-transport-4 text-primary"></i>
                    <h5><? echo $result['v_nombre_de_portes'] ?></h5>
                    <span>Portes</span> 
                  </div>
                  <div class="car-features">
                    <i class="flaticon-engine text-primary"></i>
                    <h5><? echo $result['v_puissance'] ?></h5>
                    <span>CV</span> 
                  </div>
                  <div class="car-features">
                    <i class="flaticon-gearshift text-primary"></i>
                    <h5><? echo $result['v_boite_de_vitesse'] ?></h5>
                    <span>Transmission</span>  
                  </div>
                </div>
                <div class="icon-bx-wraper bx-style-1 p-a20">
                  <p><?=$result['v_equipements_options']?></p>
                  <p><? echo $result['v_pleasing'] ?></p>
                </div>
              </div>
            </div>
            <!-- Side bar END -->
            <div class="col-md-4 col-lg-3 col-sm-5">
              <aside  class="side-bar">
                <div class="widget recent-posts-entry">
                  <h4 class="widget-title">Voitures similaires</h4>
                  <div class="widget-post-bx">
                    <?php while($resulta = $similars->fetch()){
                      $imgnophoto = ( !empty($resulta['v_img1']) ) ? '<img src="https://admin.city-car.fr/images/' . $resulta['v_img1'] . '" alt="'.htmlspecialchars($resulta['v_marque'].' '.substr($resulta['v_model'], 0, 30)).'" width="200" height="143">' : '<img src="http://www.city-car.fr/img/nophoto.jpg" alt="" width="200" height="143">'; ?>
                      <div class="widget-post clearfix">
                        <div class="dlab-post-media"><a href="<?=$resulta['v_id']?>-<?=str_replace(' ', '-', strtolower($resulta['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($resulta['v_model'])) ?>"><?= $imgnophoto ?></a></div>
                        <div class="dlab-post-info">
                          <div class="dlab-post-header">
                            <p class="m-b5"><a href="<?=$resulta['v_id']?>-<?=str_replace(' ', '-', strtolower($resulta['v_marque'])) ?>-<?= str_replace(' ', '-', strtolower($resulta['v_model'])) ?>"><?php echo $resulta['v_model']; ?></a></p>
                          </div>
                          <div class="dlab-post-meta">
                            <ul>
                              <li class="post-author open-sans"><b><i class="fa fa-bookmark-o"></i> En leasing à <?=number_format($resulta['v_prix'], 0, ',', ' ');?>€ </b></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </aside>
            </div>
        </div>
    </div>
</div>