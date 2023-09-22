<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/background/bg5.jpg);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Leasing</h1>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?=$settings['domain'];?>">Accueil</a></li>
            <li class="active">Leasing</li>
        </ul>
    </div>
</div>
<div class="section-full bg-white content-inner">
    <div class="container">
        <div class="row dzseth m-b50">
            <div class="col-md-4 col-sm-6">
                <img src="images/car2.png" alt="">
            </div>
            <div class="col-md-8 col-sm-6 dis-tbl">
                <div class="dis-tbl-cell">
                    <h2 class="h2 p-b20">Avez-vous déjà <span class="text-primary">pensé au leasing&nbsp;?</span></h2>
                    <div class="p-b20 font-18"><i>La location avec option d'achat LOA (location avec promesse de vente ou leasing) <br>Doutez-vous de ce moyen de paiement? City Car répond à vos questions :</i></div>
                    <p>«Le leasing est-il plus rentable qu'un achat comptant?» City Car a mis au point City Car Lease. Le leasing de véhicules neuf s, de démonstrations, collaborateurs et d'occasions très récents et vous fait économiser ainsi plus de 20 à 30% du prix du neuf ou réduit parfois jusqu'à 50% les mensualités des leasings constructeurs.<br>City Car Lease C'est une location longue durée sur mesure de 24 à 60 mois avec ou sans options d'achats et des petites mensualités de 189EUR a 299EUR suivant le modèle. Un tarif similaire pour quelques offres à celui d'un abonnement téléphonique!</p>
                    <p>Cette solution de financement approuvée par plusieurs entreprises et particuliers dans plus d'une vingtaine de pays en Europe n'a plus besoin de faire ces preuves. En effet le but est de budgétiser mensuellement votre véhicule pour ne pas avoir d'imprévu financier comme de grosses réparations (joint de culasse, Distribution, boite de vitesses ou une révision annuelle très onéreuse).<br>Parce que votre métier n'est pas de gérer votre voiture, optimiser votre temps si précieux pour une meilleure productivité en confiant la gestion de votre véhicule a City Car Lease.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Stats -->
<div class="section-full content-inner text-white bg-gray bg-img-fix overlay-black-middle" style="background-image: url(images/background/bg1.png);">
    <div class="container">
        <div class="section-content">
             <div class="row">
                <div class="col-md-3 col-sm-6 m-b30">
                    <div class="counter-style-1">
                        <div class="">
                            <i class="icon flaticon-list"></i>
                            <span class="counter">30</span>
                        </div>
                        <span class="counter-text">% d'économies</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 m-b30">
                    <div class="counter-style-1">
                        <div class="">
                            <i class="icon flaticon-calendar"></i>
                            <span class="counter">60</span>
                        </div>
                        <span class="counter-text">mois de locations</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 m-b30">
                    <div class="counter-style-1">
                        <div class="">
                            <i class="icon flaticon-internet"></i>
                            <span class="counter">20</span>
                        </div>
                        <span class="counter-text">pays d'europe</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 m-b30">
                    <div class="counter-style-1">
                        <div class="">
                            <i class="icon flaticon-users"></i>
                            <span class="counter">6000</span>
                        </div>
                        <span class="counter-text">clients</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- For Your Quick Look -->
<div class="section-full bg-white content-inner car-listing">
    <div class="container">
        <div class="section-head">
            <h3 class="h3 text-uppercase">Leasing CityCar</h3>
        </div>
        <div class="section-content ">
            <div class="row">   
                <div class="dlab-tabs">
                    <div class="tab-content">
                        <div id="upcoming" class="tab-pane active">
                            <div class="col-md-12 owl-carousel owl-btn-style-2 quick-look">
                                <? $leases=$database->prepare('SELECT * FROM g_voitures WHERE v_site = ? AND v_img1 IS NOT NULL AND v_validation = ? ORDER BY v_id ASC LIMIT 0,16'); $leases->execute(array($conf_site, 1)); $leases_cnt = $leases->rowCount(); while($leases_d = $leases->fetch()) {
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>