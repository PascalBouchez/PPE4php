﻿<div id="content">
	<!-- Division pour le sommaire -->
	<div id="menuGauche">
		<div id="infosUtil">

			<h2>
				MENU
			</h2>

		</div>
		<ul id="menuList">
			<li >
			<?php
			$grade = $pdo->getGrade($_SESSION['idVisiteur']);
			?>
			<?=$_SESSION['prenom']?> <?=$_SESSION['nom']?><br>
			(<?=$grade['libelle']?>)
			<br><br>

			</li>
			<li class="smenu">
				<a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais">Saisie fiche de frais</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=reparation&action=ajouter" title="Faire une demande de réparation">Faire une demande de réparation</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=reparation&action=visualiser" title="Visualiser mes demandes de réparation">Visualiser mes demandes de réparation</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=reparation&action=visualiserPrix" title="Visualiser les prix des demandes de réparations">Visualiser les prix des demandes de réparation</a>
			<?php
			if($grade['id'] > 1){
				?>
				<li class="smenu">
					<a href="index.php?uc=reparation&action=gestion" title="Gérer les demandes de réparation">Gérer les demandes de réparation</a>
				</li>
				<li class="smenu">
					<a href="index.php?uc=reparation&action=prisesEnCharge" title="Visualiser les prises en charge de mes <?=$pdo->getGradeInferieur($grade['id'])['libelle']?>s">Visualiser les prises en charge de mes <?=$pdo->getGradeInferieur($grade['id'])['libelle']?>s</a>
				</li>
				<?php
			}
			if($grade['id'] == 3){
				?>
				<li class="smenu">
					<a href="index.php?uc=reparation&action=montantGlobal" title="Visualiser le montant global des prises en charge">Visualiser le montant global des prises en charge</a>
				</li>

				<li class="smenu">
					<a href="index.php?uc=equipement&action=ajouter" title="Ajouter un nouvel équipement">Ajouter un nouvel équipement</a>
				</li>
				<?php
			}
			?>
			<li class="smenu">
				<a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
			</li>
		</ul>

	</div>
