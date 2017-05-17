<!--
	pages/faction.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		
		

?>
	<div class="top">Mon compte  »  Mes sanctions</div>
	<div class="contain">
		<div class="menu">
			<center>
			<a href="index.php?p=menu">Mon compte</a> 
			<a href="index.php?p=character">Mon personnage</a> 
			<a href="index.php?p=goods">Mes biens</a> 
			<a href="index.php?p=faction">Mon organisation</a> 
			<a href="index.php?p=inventory">Mon sac</a> 
			<a href="index.php?p=phone">Mon téléphone</a>
			<a href="index.php?p=sanctions">Mes sanctions</a> 
			<a href="index.php?p=edit">Préférences</a> 
			</center>
		</div>
		<br/>

		<h3>Mes derniers kick ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="center">Raison</th>
					<th class="center">Date</th>
					<th class="center">Par</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_kick WHERE SQLid='.$_SESSION['id'].' ORDER BY Date DESC LIMIT 0, 40');
				while ($donnees = mysqli_fetch_assoc($req2))
				{
					?>
					<tr>
						<td class="center"><?php echo $donnees['Reason'];?></td>
						<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
						<td class="center"><?php echo $donnees['KickedBy'];?></td>
					</tr>
			<?php } ?>
			</tbody>
		</table>
		<br/>
		<h3>Mes derniers jails ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="center">Temps (minutes)</th>
					<th class="center">Raison</th>
					<th class="center">Date</th>
					<th class="center">Par</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_jail WHERE SQLid='.$_SESSION['id'].' ORDER BY Date DESC LIMIT 0, 40');
				while ($donnees = mysqli_fetch_assoc($req2))
				{
					?>
					<tr>
						<td class="center"><?php echo $donnees['Time'];?></td>
						<td class="center"><?php echo $donnees['Reason'];?></td>
						<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
						<td class="center"><?php echo $donnees['JailBy'];?></td>
					</tr>
			<?php } ?>
			</tbody>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>