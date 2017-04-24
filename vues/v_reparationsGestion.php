﻿<div id="menuDroite">
	<?php
	if($pdo->getGrade($_SESSION['idVisiteur'])['id'] == 1){
		?>
		<script>
			alert("Vous n'êtes pas autorisé à acceder à cete page !");
		</script>
		<?php
		include("vues/v_sommaire.php");
	}else{
		?>
		<h3>Gestion des Demandes de Réparation</h3>
		<?php
		if(isset($msgReparation) && !empty($msgReparation)){
			echo $msgReparation;
		}
		?>
		<div class="encadre">
			<?php
			$grade = $pdo->getGrade($_SESSION['idVisiteur'])['id'];
			if($grade == 2){
				$lesReparations = $pdo->getReparationsParGrade(1);
			}else{
				$lesReparations = $pdo->getReparationsParGrade($grade);
			}
			
			
			
			if(count($lesReparations) > 0){
				?>
				<table class="listeLegere">
					<tr>	
						<th>Membre</th>
						<th>Equipement</th>
						<th>Type de Panne</th>
						<th>Date de la demande</th>
						<th>Prix</th>
						<th>Échéance Prévue</th>
						<th>Échéance Réelle</th>
						<th>Commentaire</th>
						<th>Valider / Refuser</th>
					</tr>
					<?php
					foreach($lesReparations as $lineReparation){
						?>
						<tr>
							<td><?=$lineReparation['prenom']?> <?=$lineReparation['nom']?></td>
							<td><?=$lineReparation['libelle']?></td>
							<td><?=$lineReparation['naturePanne']?></td>
							<td><?=$lineReparation['jourDemande']?></td>
							<?php if(empty($lineReparation['prix'])) echo "<td style=\"text-align: center;\">/</td>"; elseif(empty($lineReparation['majoration'])) echo "<td>".$lineReparation['prix']."€</td>"; else echo "<td>".($lineReparation['prix']*$lineReparation['majoration'])."€</td>" ?>
							<?php if(empty($lineReparation['dateFinT'])) echo "<td style=\"text-align: center;\">/</td>"; else echo "<td>".$lineReparation['dateFinT']."</td>" ?>
							<?php if(empty($lineReparation['dateFinR'])) echo "<td style=\"text-align: center;\">/</td>"; else echo "<td>".$lineReparation['dateFinR']."</td>" ?>
							<?php if(empty($lineReparation['commentaire'])) echo "<td style=\"text-align: center;\">/</td>"; else echo "<td>".$lineReparation['commentaire']."</td>" ?>
							<td>
								<?php if(empty($lineReparation['dateFinT'])) {?><img src="./img/valid.gif" alt="Valid" title="Accepter la demande" onMouseOver="this.style.cursor = 'pointer';" onClick="if(confirm('Voulez-vous vraiment accepter la demande ?')) document.location.href='./index.php?uc=reparation&action=validerDemande&id=<?=$lineReparation['id']?>';"/> <img src="./img/cancel.gif" alt="Cancel" title="Refuser la demande" onMouseOver="this.style.cursor = 'pointer';" onClick="if(confirm('Voulez-vous vraiment refuser la demande ?')) document.location.href= './index.php?uc=reparation&action=annulerDemande&id=<?=$lineReparation['id']?>';"/>
								<?php }else{ ?>
									Validée
								<?php } ?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
			}else{
				?>
				Il n'y a aucune demande de réparation disponible.
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>














