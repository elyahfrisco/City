  <?
//-------Catégories
$categories = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_carrosserie ORDER BY v_carrosserie ASC');
$categories->execute(array($conf_site));
//-------Marques
$marques = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_marque ORDER BY v_marque ASC');
$marques->execute(array($conf_site));
//-------Modeles
$modeles = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_model ORDER BY v_marque ASC, v_model ASC');
$modeles->execute(array($conf_site));
//-------Energies
$energies = $database->prepare('SELECT * FROM g_voitures WHERE v_site = ? GROUP BY v_energie ORDER BY v_energie ASC');
$energies->execute(array($conf_site));
//-------Boite de vitesses
$sql = 'SELECT * FROM g_voitures WHERE v_site = "' . $conf_site . '" GROUP BY v_boite_de_vitesse ORDER BY v_boite_de_vitesse ASC';
$taff = mysqli_query($mysqli, $sql);
while( $result = mysqli_fetch_array($taff) )
{
    $boites_liste .= '<option value="' . $result['v_boite_de_vitesse'] . '">' . $result['v_boite_de_vitesse'] . '</option>
    ';
}

//-------Ann&eacute;es
for( $i = 1990; $i <= date('Y'); $i++ )
{
    $annees_liste .= '<option value="' . $i . '">' . $i . '</option>
    ';
}

//-------Kilom&eacute;trages
for( $i = 10000; $i < 210000; $i = ($i + 10000) )
{
    $kilometrages_liste .= '<option value="' . $i . '">' . number_format($i, 0, ',', ' ') . ' km</option>
    ';
}

//-------Prix
for( $i = 1000; $i <= 100000; $i = ($i + 500) )
{
    $prix_liste .= '<option value="' . $i . '">' . number_format($i, 0, ',', ' ') . ' &euro;</option>
    ';
}
?>
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/background/bg9.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Notre séléction de véhicules</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
                    <li class="active">Véhicules</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="section-full content-inner bg-white">
            <div class="container">
                <div class="row">
                    <!-- Side bar start -->
                    <div class="col-sm-4 col-md-4 col-lg-3">
                        <aside  class="side-bar">
                            <div class="widget recent-posts-entry">
                                <h4 class="widget-title">Recherche avancée</h4>
                                <form class="dlab-accordion advanced-search toggle form-vehicules" id="accordion1" role="form">
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title"> 
                                                <a data-toggle="collapse" href="#cat">
                                                    Catégorie
                                                </a> 
                                            </h5>
                                        </div>
                                        <div id="cat" class="acod-body collapse in">
                                            <div class="acod-content">
                                                <div class="input-group">
                                                    <select class="form-control" id="categorie" name="categorie">
                                                        <option value="0">Catégories</option>
                                                        <? while( $result = $categories->fetch()) { if($result['v_carrosserie']!='0'){ ?>
                                                        <option value="<?=$result['v_carrosserie'];?>" <? if($result['v_carrosserie']==@$_GET['categorie']){ echo 'selected'; } ?>>
                                                        <?=$result['v_carrosserie'];?>
                                                        </option>
                                                        <? }} ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title"> 
                                                <a data-toggle="collapse"  href="#brand">
                                                    Marque
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="brand" class="acod-body collapse in">
                                            <div class="acod-content">
                                                <div class="product-brand" id="searchable-area">
                                                    <? while( $result = $marques->fetch()) { ?>
                                                        <div class="search-content">
                                                            <input id="<?=$result['v_marque'];?>" value="<?=$result['v_marque'];?>" type="radio" name="marque" <? if($result['v_marque']==@$_GET['marque']){ echo 'checked'; } ?>>
                                                            <label for="<?=$result['v_marque'];?>" class="search-content-area"><?=$result['v_marque'];?> </label>
                                                        </div>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title"> 
                                                <a data-toggle="collapse" href="#modele">
                                                    Modèle
                                                </a> 
                                            </h5>
                                        </div>
                                        <div id="modele" class="acod-body collapse in">
                                            <div class="acod-content">
                                                <div class="input-group">
                                                    <select class="form-control" id="model" name="model">
                                                        <option value="0">Modèles</option>
														<? while( $result = $modeles->fetch()) { ?>
                                                        <option value="<?=$result['v_model'];?>" <? if($result['v_model']==@$_GET['model']){ echo 'selected'; } ?>>
                                                        <?=$result['v_marque'];?> - <?=$result['v_model'];?>
                                                        </option>
                                                        <? } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title"> 
                                                <a data-toggle="collapse"  href="#energies">
                                                    Moteur
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="energies" class="acod-body collapse in">
                                            <div class="acod-content">
                                                <div class="vehicle-type clearfix transmission">
                                                    <div class="btn-group " data-toggle="buttons">
                                                        <?php while( $result = $energies->fetch()) {  if($result['v_energie'] != '0'){ ?>
                                                            <div class="btn btn-primary <? if($result['v_energie']==@$_GET['energie']){ echo 'active'; } ?>">
                                                                <input type="radio" name="energie" value="<?=$result['v_energie'];?>" <? if($result['v_energie']==@$_GET['energie']){ echo 'checked'; } ?>>
                                                                <h5><?=$result['v_energie'];?></h5>
                                                            </div>
                                                        <?php }
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title">
												<a data-toggle="collapse" href="#price-range">
                                                   Prix
                                                </a> 
                                            </h5>
                                        </div>
                                        <div id="price-range" class="acod-body collapse in">
                                            <div class="acod-content">
                                            
                                                <div class="price-slide range-slider m-b30">
                                                    <div class="price">
                                                        <label>Votre budget</label>
														<? $priceMin = @$_GET['prix-min'] ? max(100, min($_GET['prix-min'], 1000)) : 100;
															$priceMax = @$_GET['prix-max'] ? max(100, min($_GET['prix-max'], 1000)) : 1000; ?>
														<span style="font-size:11px;width:115px;" class="price-text"><?=$priceMin;?>€ - <?=$priceMax;?>€</span>
                                                        <input type="hidden" name="prix-min" value="<?=$priceMin;?>">
														<input type="hidden" name="prix-max" value="<?=$priceMax;?>">
                                                        <div id="slider-range"></div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title"> 
                                                <a data-toggle="collapse" href="#milesime">
                                                    Année
                                                </a> 
                                            </h5>
                                        </div>
                                        <div id="milesime" class="acod-body collapse in">
                                            <div class="acod-content">
                                                <div class="input-group">
                                                    <select class="form-control" id="annee" name="annee">
                                                        <option value="0">Milésime</option>
                                                        <?php for ($y = 1990; $y < date('Y'); $y++) { ?>
															<option value="<?= $y ?>" <?php if(@$_GET['annee']==$y){ echo 'selected'; } ?>><?= $y ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h5 class="acod-title">
                                                <a data-toggle="collapse" href="#kms-range">
                                                   Kilometrage
                                                </a> 
                                            </h5>
                                        </div>
                                        <div id="kms-range" class="acod-body collapse in">
                                            <div class="acod-content">
                                            
                                                <div class="kms-slide range-slider m-b30">
                                                    <div class="price">
														<? $kilometrage = @$_GET['kilometrage'] ? max(1, min($_GET['kilometrage'], 200000)) : 200000; ?>
                                                        <label for="kilometrage">Kilometrage</label>
														<span style="font-size:11px;width:115px;" class="price-text">max <?=$kilometrage;?>Km</span>
                                                        <input type="hidden" name="kilometrage" value="<?=$kilometrage;?>">
														<div id="slider-range2"></div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                      <button type="submit" class="site-button button-lg btn-block" >RECHERCHER</button>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                    <!-- Side bar END -->
                    <!-- left part start -->
                    <div class="col-sm-8 col-md-8 col-lg-9">
                        <div class="row">
                            <div id="masonry" class="dlab-blog-grid-3">
                                <?
                                    //-------VTC
                                    $recherche = ( isset($_GET['vtc']) && $_GET['vtc'] == "1" ) ?  ' AND v_vtc = "1"' : $recherche;
                                    //-------Leasing
                                    $recherche = ( isset($_GET['leasing']) && $_GET['leasing'] == "1" ) ?  ' AND v_featured = "1"' : $recherche;
                                    //-------Catégorie
                                    $recherche = ( isset($_GET['categorie']) && $_GET['categorie'] != "0" ) ?  ' AND v_carrosserie = "' . htmlspecialchars($_GET['categorie']) . '"' : $recherche;
                                    //-------Marque
                                    $recherche = ( isset($_GET['marque']) && $_GET['marque'] != "0" ) ? $recherche . ' AND v_marque = "' . htmlspecialchars($_GET['marque']) . '"' : $recherche;
                                    //-------Modèle
                                    $recherche = ( isset($_GET['model']) && $_GET['model'] != "0" ) ? $recherche . ' AND v_model = "' . htmlspecialchars($_GET['model']) . '"' : $recherche;
                                    //-------Energie
                                    $recherche = ( isset($_GET['energie']) && $_GET['energie'] != "0" ) ? $recherche . ' AND v_energie = "' . htmlspecialchars($_GET['energie']) . '"' : $recherche;
                                    //-------Prix minimum
                                    $recherche = ( isset($_GET['prix-min']) && $_GET['prix-min'] != "0" ) ? $recherche . ' AND v_prix >= "' . htmlspecialchars($_GET['prix-min']) . '"' : $recherche;
                                    //-------Prix maximum
                                    $recherche = ( isset($_GET['prix-max']) && $_GET['prix-max'] != "0" ) ? $recherche . ' AND v_prix <= "' . htmlspecialchars($_GET['prix-max']) . '"' : $recherche;
                                    //-------Année
                                    $recherche = ( isset($_GET['annee']) && $_GET['annee'] != "0" ) ? $recherche . ' AND v_mise_en_circulation LIKE "%' . htmlspecialchars($_GET['annee']) . '%"' : $recherche;
                                    //-------Kilométrage
                                    $recherche = ( isset($_GET['kilometrage']) && $_GET['kilometrage'] != "0" ) ? $recherche . ' AND v_kilometrage <= "' . htmlspecialchars($_GET['kilometrage']) . '"' : $recherche;
                                    //-------Boite de vitesses
                                    $recherche = ( isset($_GET['boite']) && $_GET['boite'] != "0" ) ? $recherche . ' AND v_boite_de_vitesse = "' . htmlspecialchars($_GET['boite']) . '"' : $recherche;
                                    //-------Photos
                                    $recherche = ( isset($_GET['photo']) && $_GET['photo'] == "1" ) ? $recherche . ' AND v_img1 LIKE "%.%"' : $recherche;
                                    //-------Recherche rapîde
                                    $_GET['rapide'] = ( empty($_GET['rapide']) ) ? 0 : $_GET['rapide'];
                                    if( isset($_GET['rapide']) && $_GET['rapide'] != "0" )
                                    {
                                        $recherche_rapide = explode(' ', $_GET['rapide']);
                                        $nbr_rapide = count($recherche_rapide);
                                        
                                        for( $i = 0; $i < $nbr_rapide; $i++ )
                                        {
                                            $recherche = $recherche . ' AND (v_carrosserie LIKE "%' . htmlspecialchars($recherche_rapide[$i]) . '%" OR v_marque LIKE "%' . htmlspecialchars($recherche_rapide[$i]) . '%" OR v_model LIKE "%' . htmlspecialchars($recherche_rapide[$i]) . '%" OR v_energie LIKE "%' . htmlspecialchars($recherche_rapide[$i]) . '%" OR v_mise_en_circulation LIKE "%' . htmlspecialchars($recherche_rapide[$i]) . '%" OR v_boite_de_vitesse LIKE "%' . htmlspecialchars($recherche_rapide[$i]) . '%")';
                                        }
                                    }

                                    //-------Pagination
                                    $limit = 10;
                                    $pageno =  1;
                                    $total_pages_sql = 'SELECT * FROM g_voitures WHERE v_site = "' . $conf_site . '" AND v_validation = "1"' . $recherche . ' ORDER BY v_id DESC';
                                    $total = $database->prepare($total_pages_sql);
                                    $total->execute();
                                    $total_cnt = $total->rowCount();
                                    $total_pages = ceil($total_cnt / $limit);

                                    //-------Requete
                                    #$sql = 'SELECT * FROM g_voitures WHERE v_site = "' . $conf_site . '" AND v_validation = "1"' . #$recherche . ' ORDER BY v_id DESC';
                                    #$taff = mysql_query($sql);

                                    $limit = 15;
                                    $pageno =  1;
                                    if( isset($_GET['page']) && $_GET['page'] != "0" ){
                                        $pageno =  htmlspecialchars($_GET['page']);
                                    }
                                    $offset = ($pageno-1) * $limit;
                                    $qry = 'SELECT * FROM g_voitures WHERE v_site = "' . $conf_site . '" AND v_validation = "1"' . $recherche . ' ORDER BY v_id DESC;// LIMIT '.$offset.', '.$limit;
                                    $voitures = $database->prepare($qry);
                                    $voitures->execute();
                                    $voitures_cnt = $voitures->rowCount();
                                    $count = 0;


                                    while($result = $voitures->fetch())
                                    {
                                        $imgnophoto = ( !empty($result['v_img1']) ) ? '<img src="/crop.php?src='.urlencode('https://admin.city-car.fr/images/' . $result['v_img1']) . '&h=536&w=720" class="img-responsive" alt="'.htmlspecialchars($result['v_marque'].' '.substr($result['v_model'], 0, 30)).'" />' : '<img src="http://www.city-car.fr/img/nophoto.jpg"  class="img-responsive" />';
                                    ?>
                                    <div class="post card-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="dlab-feed-list m-b30">
                                            <a href="<?=$result['v_id']?>-<?=str_replace(' ', '-', (strtolower($result['v_marque'])))?>-<?=str_replace(' ', '-',(strtolower($result['v_model'])))?>" class="dlab-media"> 
                                                <?=$imgnophoto?> 
                                            </a>
                                            <div class="dlab-info" style="padding:15px;">
                                                <h4 class="dlab-title"><a href="<?=$result['v_id']?>-<?=str_replace(' ', '-', (strtolower($result['v_marque'])))?>-<?=str_replace(' ', '-',(strtolower($result['v_model'])))?>" style="height: 43px;overflow: hidden;text-overflow: ellipsis;display: block;"><?=$result['v_marque']?> - <?=$result['v_model']?> <?=$result['v_energie']?></a></h4>
                                                <div class="dlab-separator bg-black"></div>
                                                <p class="dlab-price"><span><strong class="text-primary"><?=$result['v_prix']?> &euro;</strong> /mois</span></p>
                                            </div>
                                            <div class="icon-box-btn text-center">
                                                <ul class="clearfix">
                                                    <li><?=explode('-', $result['v_mise_en_circulation'])[2]; ?></li>
                                                    <li>
                                                        <?php switch ($result['v_boite_de_vitesse']) {
                                                            case '0':
                                                                $set = '';
                                                                break;
                                                            case 'Automatique':
                                                                $set = 'Auto';
                                                                break;
                                                            default:
                                                                $set = $result['v_boite_de_vitesse'];
                                                                break;
                                                        } echo $set; ?>
                                                    </li>
                                                    <li><?=$result['v_kilometrage']?> km</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                  <? $count++; } ?>
                                  <!-- Pagination  -->
                                  <div class="pagination-bx col-lg-12 clearfix ">
                                      <ul class="pagination">
                                          <?php if($pageno > 0){ ?><li class="previous"><a href="?page=<?=($pageno-1);?>"><i class="fa fa-angle-double-left"></i></a></li><?php } ?>
                                          <?php for ($p=1; $p <= $total_pages; $p++) { 
                                              echo '<li '.($p == $pageno ? 'class="active"' : '').'><a href="?page='.$p.'">'.$p.'</a></li>';
                                          } ?>
                                          <?php if($pageno < $total_pages){ ?><li class="next"><a href="?page=<?=($pageno+1);?>"><i class="fa fa-angle-double-right"></i></a></li><?php } ?>
                                      </ul>
                                  </div>
                                  <!-- Pagination END -->
                                <?php echo ( $total_cnt == 0 ) ? 'Aucun résultat pour cette recherche...' : ''; ?>
                            </div>
                            <!-- blog grid END -->
                        </div>
                    </div>
                    <!-- left part END -->
                </div>
            </div>
        </div>




