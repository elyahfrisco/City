<? include'_settings.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$settings['mt_title'];?> | <?=$settings['brand'];?></title>
    <meta name="description" content="<?=$settings['mt_desc'];?>">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
  <![endif]-->
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/templete.css">
    <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="plugins/revolution/v5.4.3/css/settings.css">
    <!-- Revolution Navigation Style -->
    <link rel="stylesheet" type="text/css" href="plugins/revolution/v5.4.3/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
</head>

<body id="bg">

    <div id="wrapper" class="page-wrapper">
        <div id="loading-area"></div>
        <!-- header -->
        <header class="site-header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="dlab-topbar-left">
                            <ul>
                                <li><i class="fa fa-envelope-o m-r5"></i> contact@city-car.fr</li>
                                <li><i class="fa fa-phone m-r5"></i> 01 41 34 31 45</li>
                            </ul>
                        </div>
                        <div class="dlab-topbar-right">
                            <ul>
                                <li>Leasing : <a href="http://citycarlease.com/">citycarlease.fr</a></li>
                                <li>Professionnels : <a href="http://www.citycarleasepro.fr/">cityleasepro.fr</a></li>
                            </ul>
                        </div>
                        <? /* <div class="dlab-topbar-right topbar-social">
              <ul>
                <li><a href="#" class="site-button-link facebook hover"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="site-button-link google-plus hover"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="site-button-link twitter hover"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="site-button-link instagram hover"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" class="site-button-link linkedin hover"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="site-button-link youtube hover"><i class="fa fa-youtube-play"></i></a></li>
              </ul>
            </div> */ ?>
                    </div>
                </div>
            </div>
            <!-- main header -->
            <div class="sticky-header main-bar-wraper header dark">
                <div class="main-bar clearfix ">
                    <div class="container clearfix">
                        <!-- website logo -->
                        <div class="logo-header mostion">
                            <a href="/"><img src="img/logo.svg" alt=""></a>
                        </div>
                        <!-- nav toggle button -->
                        <button data-target=".header-nav" data-toggle="collapse" type="button"
                            class="navbar-toggle collapsed" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- main nav -->
                        <div class="header-nav navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li<? if($p=='home' ) {?> class="active"
                                    <? }?>><a href="<?=$settings['domain'];?>">Accueil</a></li>
                                    <li<? if($p=='offres' ) {?> class="active"
                                        <? }?>><a href="/offres.html">Offres</a></li>
                                        <li<? if($p=='engagements' ) {?> class="active"
                                            <? }?>><a href="/dossier.html">Dossier</a></li>
                                            <li<? if($p=='vehicules' ) {?> class="active"
                                                <? }?>><a href="/vehicules.html">Véhicules</a></li>
                                                <li<? if($p=='vtc' ) {?> class="active"
                                                    <? }?>><a href="/vtc.html">VTC</a></li>
                                                    <li<? if($p=='leasing' ) {?> class="active"
                                                        <? }?>><a href="/leasing.html">Leasing</a></li>
                                                        <li<? if($p=='contact' ) {?> class="active"
                                                            <? }?>><a href="/contact.html">Contact</a></li>
                                                            <li<? if($p=='faq' ) {?> class="active"
                                                                <? }?>><a href="/faq.html">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-content">
            <?php include 'view/'.$p.'.php'; ?>
        </div>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
                            <div class="widget widget_about">
                                <div class="logo-footer"><img src="img/logo.svg" alt=""></div>
                                <p class="m-tb20"><strong>CityCar</strong> est une société spécialisée dans la vente de
                                    véhicules d'occasions toutes marques à des prix imbattables.</p>
                                <ul class="dlab-contact-info">
                                    <li><i class="flaticon-placeholder"></i>96 rue Anatole France - 92300 Levallois
                                        Perret</li>
                                    <li><i class="flaticon-customer-service"></i>01 41 34 31 45 - contact@city-car.fr
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
                            <div class="widget widget_services">
                                <h4 class="m-b15 text-uppercase">Marques de voiture</h4>
                                <div class="dlab-separator bg-primary"></div>
                                <ul>
                                    <li><a href="/vehicules.html?marque=SMART">Smart</a></li>
                                    <li><a href="/vehicules.html?marque=MINI">Mini</a></li>
                                    <li><a href="/vehicules.html?marque=FIAT">Fiat</a></li>
                                    <li><a href="/vehicules.html?marque=PEUGEOT">Peugeot</a></li>
                                    <li><a href="/vehicules.html?marque=RENAULT">Renault</a></li>
                                    <li><a href="/vehicules.html?marque=MERCEDES">Mercedez-Bens</a></li>
                                    <li><a href="/vehicules.html?marque=VOLKSWAGEN">Volkswagen</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-3 col-sm-6 col-xs-6 footer-col-4">
                            <div class="widget recent-posts-entry">
                                <h4 class="m-b15 text-uppercase">Leasing à Levallois</h4>
                                <div class="dlab-separator bg-primary"></div>
                                <div class="widget-post-bx">
                                    <div id="map" class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item"
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10492.548626826336!2d2.2836526!3d48.8937232!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbb4d8faebff38b1c!2sCity+Car!5e0!3m2!1sfr!2sfr!4v1546522543287"
                                            allowfullscreen></iframe>
                                    </div>
                                    <a href="https://goo.gl/maps/fDEweVpVgDC2"
                                        class="btn btn-success btn-lg btn-block">Itinéraire</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? /* <div class="clearfix">
                <ul class="full-social-icon clearfix">
                  <li class="fb col-md-3 col-sm-6 col-xs-6 m-b30">
                    <a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                  </li>
                  <li class="tw col-md-3 col-sm-6 col-xs-6 m-b30">
                    <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                  </li>
                  <li class="gplus col-md-3 col-sm-6 col-xs-6 m-b30">
                    <a href="#"><i class="fa fa-google-plus"></i> Google Plus</a>
                  </li>
                  <li class="linkd col-md-3 col-sm-6 col-xs-6 m-b30">
                    <a href="#"><i class="fa fa-linkedin"></i> Linkedin</a>
                  </li>
                </ul>
              </div> */ ?>
                </div>
            </div>
            <!-- footer bottom part -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 text-left"> Depuis © 2009 Tous droits réservés <a
                                href="/">CityCar</a> | <a
                                href="https://comparer-les-assurances-auto.com/assurance-automobile">comparer votre
                                assurance auto</a></div>
                        <div class="col-md-6 col-sm-6 text-right ">
                            <a href="/rgpd.html">Mentions légales</a> |
                            réalisation <a href="https://daydou.com" class="text-primary">Agence SEO Paris</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END-->
        <!-- scroll top button -->
        <button class="scroltop fa fa-chevron-up"></button>

    </div>
    <!-- /container -->

    <!-- JavaScript  files ========================================= -->
    <script src="js/jquery.min.js"></script>
    <!-- jquery.min js -->
    <script src="js/wow.js"></script>
    <!-- wow.min js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- bootstrap.min js -->
    <script src="js/bootstrap-select.min.js"></script>
    <!-- Form js -->
    <script src="js/jquery.bootstrap-touchspin.js"></script>
    <!-- Form js -->
    <script src="js/magnific-popup.js"></script>
    <!-- magnific-popup js -->
    <script src="js/waypoints-min.js"></script>
    <!-- waypoints js -->
    <script src="js/counterup.min.js"></script>
    <!-- counterup js -->
    <script src="js/imagesloaded.js"></script>
    <!-- masonry  -->
    <script src="js/masonry-3.1.4.js"></script>
    <!-- masonry  -->
    <script src="js/masonry.filter.js"></script>
    <!-- masonry  -->
    <script src="js/owl.carousel.js"></script>
    <!-- OWL  Slider  -->
    <script src="plugins/rangeslider/rangeslider.js"></script>
    <script src="js/jquery.searchable-1.0.0.min.js"></script>
    <script src="js/dz.carousel.min.js"></script>

    <!-- sortcode fuctions  -->
    <script src="js/dz.ajax.js"></script>
    <!-- contact-us js -->
    <!-- revolution JS FILES -->
    <script src="plugins/revolution/v5.4.3/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.video.min.js"></script>
    <script src="plugins/revolution/v5.4.3/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="js/rev.slider.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery.hoverdir.js"></script>
    <script src="js/custom.js"></script>
    <!-- custom fuctions  -->
    <script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_1();
    }); /*ready*/
    </script>
    <script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-18375911-1');
    ga('send', 'pageview');
    </script>
    <?php /*
<div class="fb-customerchat" page_id="216183395079150"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
*/ ?>
</body>

</html>