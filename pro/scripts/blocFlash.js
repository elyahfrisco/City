/* **** bloc flash de la home actu *** */

// un titre du menu est survolé par la souris
function flashItemOver (oDivNav,bSurvol) {
	// retrouver le numéro de l'item
	i = oDivNav.id.substring(15,oDivNav.id.length);
	// retrouver le numéro de l'item courant
	oCourant = $("[id^=flashItemTitre]").filter(".on");
	iCourant = oCourant.attr("id").substring(15,oCourant.attr("id").length);
	
	// rien à faire si l'item est déjà sélectionné
	if (i != iCourant) {
		
		// déselectionner les autres items
		$("[id^=flashItemTitre][id!=flashItemTitre"+i+"]")
			.stop(true,true)
			.removeClass("on")
			//.css("height","auto")
			.css("width","auto");
		
		// sélectionner l'item choisi
		$("#flashItemTitre_" + i)
			.addClass("on")
			//.height("48px")
			.animate(
				{	width : "203px" },
				200
			);
		
		// passer l'image par-dessus
		$("#flashItemImage_" + i).css("opacity",0);
	
		$("[id^=flashItemImage][id!=flashItemImage_"+i+"]").each(function () {
			$(this).stop();
			$(this).css("z-index",$(this).css("z-index")-1);
			return true;
		});
	
		$("#flashItemImage_" + i)
			.css("z-index",99)
			.animate(
				{opacity : 1},
				200
			);
			
		// faire apparaître le chapo
		$("#flashItemChapo_" + i).show();
		$("#flashItemChapo_" + iCourant).hide();
		
		// faire défiler la suite
		clearTimeout(timerSuivant);
		if (!bSurvol) {
			iSuivant = i%totalItems+1;
			timerSuivant = setTimeout("flashItemOver($('#flashItemTitre_" + iSuivant +"').get(0),false);",3000);
		}
	}
	
	return false;
}

var timerSuivant = null;
var totalItems = 0;

// au chargement de la page : binder la fonction au survol de la souris sur les titres
$(document).ready ( function () {
	dernierItemId  = $("[id^=flashItemTitre]:last").attr("id");
	totalItems = dernierItemId.substring(15,dernierItemId.length);
	
	$("[id^=flashItemTitre]").bind("mouseenter",function () { flashItemOver(this,true); } );
	timerSuivant = setTimeout("flashItemOver($('#flashItemTitre_2').get(0),false);",3000);

	return false;
});