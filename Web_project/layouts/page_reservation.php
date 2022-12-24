<div id="pageReservation">
	<form id="formReservation" autocomplete="off">
		<ul>
			<li>
				<label for="reservation_nom">Nom :</label>
				<input name="reservation[nom]" required="required" type="text" value="" id="reservation_nom" class="sizeLarge" />
				<br class="clear" />
			</li>
			<li>
				<label for="reservation_prenom">Prénom :</label>
				<input name="reservation[prenom]" required="required" type="text" value="" id="reservation_prenom" class="sizeLarge" />
				<br class="clear" />
			</li>
			<li>
				<label for="reservation_email">E-mail :</label>
				<input name="reservation[email]" required="required" type="email" value="" id="reservation_email" class="sizeLarge" />
				<br class="clear" />
			</li>
			<li>
				<hr />
			</li>

			<?php
					// Affichages des billets un par un
					$testQuery ='UPDATE article SET quantite = 600 WHERE id = 8';

					$pdo->query($testQuery);

					$query = 'SELECT SUM(quantite) AS totalQuantite, quota, label, prix, type_article.id 
							FROM type_article, article, commande
							WHERE commande.id = article.commande_id 
							AND type_article.id = article.type_article_id
							AND commande.statut_id = 1
							GROUP BY type_article.id
							ORDER BY type_article.id DESC';

					$stmt = $pdo->query($query);

					foreach ( $stmt->fetchAll() as $typeArticle ){
						// Détermination du label du tarif

						
							if ( $typeArticle['prix'] > 0 ){
								$tarif = $typeArticle['prix'] . '€';
							} else {
								$tarif = 'Gratuit';
							}
							
						// Affichage de "complet"
							if ( $typeArticle['totalQuantite'] >= $typeArticle['quota'] ){
								$label = 'Complet';
							} else {
								$label = '<input name="reservation[type_article][' . $typeArticle['id'] . ']" class="article" type="number" value="0" min="0" max="100" />';
							}
						
						// Affiche du billet
							echo '<li>';
								echo '<label>Billet ' . strtolower( $typeArticle['label'] ) . ' (' . $tarif . ') :</label>';
								echo $label;
								echo '<br class="clear" />';
							echo '</li>';
					}
			?>
			<li>
				<hr />
			</li>
			<li class="textCenter">
				<input type="submit" id="btnSubmit" value="Réserver"/>
			</li>
		</ul>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){ 

		document.getElementById('btnSubmit').disabled = true;

		$('input').change(function(){
			document.getElementById('btnSubmit').disabled = true;
			$('.article').each(function(){
				console.log($(this).val());
				if($(this).val() > 0){
					document.getElementById('btnSubmit').disabled = false;
				}
			});
		});

		$('#formReservation').ajaxForm({ 
			url  			: 'ajax/update_reservation.php',
			type 			: 'POST',
			beforeSubmit 	: function(){				
				return true; 	// Si besoin
			},
			success			: function( response ){

				window.alert(response);
				document.location.href = response;
    		}
		})
	});
</script>