<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Serveur  »  Jobs</div>
	<div class="contain">
		<h3>Liste des jobs ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Jobs</th>
					<th class="center">Membres</th>
				</tr>
			</thead>
			<tbody>

			<?php
			for($i=1; $i<21; $i++)
			{
				$req = mysqli_query($bdd,'SELECT COUNT(*) FROM lvrp_users WHERE Job='.$i.'');
				$donnees = mysqli_fetch_row($req);
				?>
				<tr>
					<td class="center"><?php echo getJobName($i);?></td>
					<td class="center"><?php echo ''.$donnees['0'].' membres';?></td>
				</tr>
				<?php
			} ?>
			</tbody>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
