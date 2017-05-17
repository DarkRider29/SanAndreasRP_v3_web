<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Serveur  »  Piloris</div>
	<div class="contain">
	<h3>Les piloris ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Banni par</th>
					<th class="center">Raison</th>
					<th class="center">Durée</th>
					<th class="center">Date</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users_bans ORDER BY Date DESC');
			while ($donnees = mysqli_fetch_assoc($req))
			{
				if($donnees['SQLid'] == 0 || $donnees['SQLid'] == -1) continue;
				$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
				$row = mysqli_fetch_row($tmp);
			?>

				<tr>
					<td class="center"><?php echo $row[0];?></td>
					<td class="center"><?php echo $donnees['BannedBy'];?></td>
					<td class="center"><?php echo $donnees['Reason'];?></td>
					<?php 
					if($donnees['Time'] != -1)
						{echo '<td class="center">'.$donnees['Time'].'</td>';}
					else
						{echo '<td class="center">Permanente</td>';}
					?>
					<td class="center"><?php echo date('d/m/y',$donnees['Date']);?></td>
				</tr>

			<?php } ?>

			</tbody>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
