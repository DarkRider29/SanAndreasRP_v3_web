<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Serveur  »  Factions</div>
	<div class="contain">
		<h3>Los Santos Police Departement Centre ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=1 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>San Fierro Police Departement Centre ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=2 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Los Santos Police Departement Est ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=3 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>San Andreas Shériff Departement ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=4 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Federal Bureau Of Investigation ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=5 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de Los Santos ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=6 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de San Fierro ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=7 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de Las Venturas ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=8 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de San Andreas ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=9 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<hr />
		<h3>San News ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Member=10 ORDER BY Member DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getFactionRank($donnees['Member'],$donnees['Rank']);?></td>
					<td class="center"><?php echo date("d-m-Y",$donnees['LastLog']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<?php
		$fac = mysqli_query($bdd,'SELECT * FROM lvrp_factions_illegals');
		while ($facdons = mysqli_fetch_assoc($fac))
		{
			
			echo '<hr /><h3>'.utf8_encode($facdons['Name']).' ..</h3>';
			echo '<table class="zebra" cellspacing="0" cellpadding="0">

		<thead>

			<tr>

				<th class="center">Pr&eacute;nom_Nom</th>

				<th class="center">Rang</th>
				
				<th class="center">Dernière connexion</th>
				
				<th class="center">Statut</th>

			</tr>

		</thead>

		<tbody>';
			$facid=200+$facdons['id'];
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE Member='.$facid.' ORDER BY Rank DESC LIMIT 0, 20');

			while ($donnees = mysqli_fetch_assoc($req))
			{
				echo '
				<tr>

					<td class="center">'.$donnees['Name'].'</td>

					<td class="center"> '.getFactionRank($donnees['Member'],$donnees['Rank']).'</td>
					
					<td class="center">'.date("d-m-Y",$donnees['LastLog']).'</td>
					
					<td class="center">';if ($donnees['Connected'] == 1) { echo "<center><img src=./images/user_online.gif></center>"; } else { echo "<center><img src=./images/user_offline.gif></center>"; } echo '</td>


				</tr>';

				 }

			echo '</tbody>

			</table>';
		}
		?>
		<div class="clear">&nbsp;</div>
	</div>
