<?php

// Inclusion des paramétres
	require ( 'parametres.php' );

// Appel de l'entete de la page
	require ( 'layouts/header.php' );

// Appel du menu
	require ( 'layouts/menu.php' );

// Gestion du contenu de la page
	echo '<div id="content">';
		$pageAffiche = 'page_accueil';
		if ( isset( $_GET['page'] ) && $_GET['page'] != '' && file_exists( 'layouts/' . $_GET['page'] . '.php' ) ){
			$pageAffiche = $_GET['page'];
		}
		
		require ( 'layouts/' . $pageAffiche . '.php');
	echo '</div>';

// Appel du footer
	require ( 'layouts/footer.php' );

?>