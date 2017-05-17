<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Accueil  »  Classements</div>
	<div class="contain">
	<h3>Les meilleurs votant ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">#</th>
					<th class="center">Prénom_Nom</th>
					<th class="center">Vote(s)</th>
					<th class="center">Dernier vote</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users ORDER BY Votes DESC LIMIT 0, 20');
			while ($donnees = mysqli_fetch_assoc($req))
			{

			?>

				<tr>
					<td class="center"><?php $position++; if ($position == 1) { echo "<center><img src=./images/icons/trophy.png></center>"; } elseif ($position == 2) { echo "<center><img src=./images/icons/trophy-silver.png></center>"; } elseif ($position == 3) { echo "<center><img src=./images/icons/trophy-bronze.png></center>"; }	else { echo "<center>" . $position . "</center>"; }?></</td>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo $donnees['Votes'];?></td>
					<td class="center"><?php echo date('d/m/y',$donnees['HasVoted1']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Les plus riches ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">#</th>
					<th class="center">Prénom_Nom</th>
					<th class="center">Cash</th>
					<th class="center">Banque</th>
					<th class="center"><strong>Total ($)</strong></th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users ORDER BY GREATEST(Cash,Bank) DESC LIMIT 0, 20');
			while ($donnees = mysqli_fetch_assoc($req))
			{

			?>

				<tr>
					<td class="center"><?php $position++; if ($position == 1) { echo "<center><img src=./images/icons/trophy.png></center>"; } elseif ($position == 2) { echo "<center><img src=./images/icons/trophy-silver.png></center>"; } elseif ($position == 3) { echo "<center><img src=./images/icons/trophy-bronze.png></center>"; }	else { echo "<center>" . $position . "</center>"; }?></</td>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo $donnees['Cash'];?></td>
					<td class="center"><?php echo $donnees['Bank'];?></td>
					<td class="center"><b><?php echo($donnees['Bank'] + $donnees['Cash']);?> $</b></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Les plus addictifs ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">#</th>
					<th class="center">Prénom_Nom</th>
					<th class="center">Temps de jeu (Heures)</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_users ORDER BY ConnectedTime DESC LIMIT 0, 20');
			while ($donnees = mysqli_fetch_assoc($req))
			{

			?>

				<tr>
					<td class="center"><?php $position++; if ($position == 1) { echo "<center><img src=./images/icons/trophy.png></center>"; } elseif ($position == 2) { echo "<center><img src=./images/icons/trophy-silver.png></center>"; } elseif ($position == 3) { echo "<center><img src=./images/icons/trophy-bronze.png></center>"; }	else { echo "<center>" . $position . "</center>"; }?></</td>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo $donnees['ConnectedTime'];?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Les plus respectés ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">#</th>
					<th class="center">Prénom_Nom</th>
					<th class="center">Niveau</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_users ORDER BY Level DESC LIMIT 0, 20');
			while ($donnees = mysqli_fetch_assoc($req))
			{

			?>

				<tr>
					<td class="center"><?php $position++; if ($position == 1) { echo "<center><img src=./images/icons/trophy.png></center>"; } elseif ($position == 2) { echo "<center><img src=./images/icons/trophy-silver.png></center>"; } elseif ($position == 3) { echo "<center><img src=./images/icons/trophy-bronze.png></center>"; }	else { echo "<center>" . $position . "</center>"; }?></</td>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo $donnees['Level'];?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Les plus criminels ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">#</th>
					<th class="center">Prénom_Nom</th>
					<th class="center">Crime(s)</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_users_casiers ORDER BY Crimes DESC LIMIT 0, 20');
			while ($donnees = mysqli_fetch_assoc($req))
			{
				$pseudo = mysqli_query ($bdd,"SELECT Name,Connected FROM lvrp_users WHERE id = '".$donnees['SQLid']."' "); 
				$row = mysqli_fetch_row($pseudo);
			?>

				<tr>
					<td class="center"><?php $position++; if ($position == 1) { echo "<center><img src=./images/icons/trophy.png></center>"; } elseif ($position == 2) { echo "<center><img src=./images/icons/trophy-silver.png></center>"; } elseif ($position == 3) { echo "<center><img src=./images/icons/trophy-bronze.png></center>"; }	else { echo "<center>" . $position . "</center>"; }?></</td>
					<td class="center"><?php echo $row[0];?></td>
					<td class="center"><?php echo $donnees['Crimes'];?></td>
					<td class="center"><?php if ($row['1'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<div class="clear">&nbsp;</div>
	</div>
