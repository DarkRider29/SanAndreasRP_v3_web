<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Accueil  »  Equipe</div>
	<div class="contain">
		<h3>Voici la liste des membres de l'administration ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Rang</th>
					<th class="center">Statut</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users ORDER BY AdminLevel DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
				if($donnees['AdminLevel'] > 0)
				{
			?>

				<tr>
					<td class="center"><?php echo $donnees['Name'];?></td>
					<td class="center"><?php echo getAdminRank($donnees['AdminLevel']);?></td>
					<td class="center"><?php if ($donnees['Connected'] == 1) { echo "<center><img src='./images/user_online.gif' title='Connecté' ></center>"; } else { echo "<center><img title='Déconnecté' src='./images/user_offline.gif'></center>"; }?></td>

				</tr>

			<?php } } ?>

			</tbody>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
