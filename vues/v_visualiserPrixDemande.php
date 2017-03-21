	<h3>Les prix de r�paration</h3>
	<div class="encadre">
		<?php
			if(count($mesPrixReparations) > 0){
				?>
					<table class="listeLegere">
						<tr>	
							<th>Visiteur</th>
							<th>Equipement</th>
							<th>Type panne</th>
							<th>Jour demande</th>
							<th>Jour prise en charge</th>
							<th>Prix</th>
							<th>Date fin th�orique</th>
							<th>Commentaire</th>
							<th>Majoration �ventuelle</th>
						</tr>
						<?php
						foreach($mesPrixReparations as $lineReparation){
							?>
							<tr>
							    <td><?=$lineReparation['visiteur']?></td>
								<td><?=$lineReparation['equipement']?></td>
								<td><?=$lineReparation['typePanne']?></td>
								<td><?=$lineReparation['jourDemande']?></td>
								<td><?=$lineReparation['jourPriseEnCharge']?></td>
								<td><?php if(empty($lineReparation['prix'])) echo "/"; else echo $lineReparation['prix']."�" ?></td>
								<td><?=$lineReparation['dateFinTheorique']?></td>
								<td><?=$lineReparation['commentaire']?></td>
								<td><?=$lineReparation['majoration']?></td>
							</tr>
							<?php
						}
						?>
					</table>
					<?php
				}else{
					?>
					Vous n'avez aucune demande de r�paration.
					<?php
				}
				?>
	</div>
</div>














