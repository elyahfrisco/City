<?php
if(isset($_GET['go']) || isset($_GET['model'])) {
	// connexion à la base de données
    require'_settings.php';
	 require'_database.php';
 
    $json = array();
     
    if(isset($_GET['go'])) {
		 $id = htmlentities($_GET['go']);
		 $_SESSION['cat'] = $id;
         $requete = "SELECT * FROM g_voitures WHERE v_carrosserie = '". $id ."' GROUP BY v_marque ORDER BY v_marque";
 
     $resultat = $database->query($requete) or die(print_r($database->errorInfo()));
     $count = 0;
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
		if(!isset($_GET['model'])) { 
        $json[$donnees['v_marque']][] = $donnees['v_marque'];
		}
		if($count == 0) $id = $donnees['v_marque'];
		$count++;
	}
		
		if(isset($_GET['model'])) {
			
        // requête qui récupère les départements selon la région
        $requete = "SELECT * FROM g_voitures WHERE v_marque = '". $id ."' AND v_carrosserie = '". $_SESSION['cat'] ."' GROUP BY v_model ORDER BY v_model ASC";
		
		// exécution de la requête
    $resultat = $database->query($requete) or die(print_r($database->errorInfo()));
     
    // résultats
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // je remplis un tableau et mettant l'id en index (que ce soit pour les régions ou les départements)
        $json[$donnees['v_model']][] = $donnees['v_model'];
	}
			
		
		
	}
	
	} else if(isset($_GET['model'])) {
        $id = htmlentities($_GET['model']);
        // requête qui récupère les départements selon la région
        $requete = "SELECT * FROM g_voitures WHERE v_marque = '". $id ."' ORDER BY v_model ASC";
		
		// exécution de la requête
    $resultat = $database->query($requete) or die(print_r($database->errorInfo()));
     
    // résultats
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // je remplis un tableau et mettant l'id en index (que ce soit pour les régions ou les départements)
        $json[$donnees['v_model']][] = $donnees['v_model'];
	}
    }
     
    // envoi du résultat au success
    echo json_encode($json);
}
?>