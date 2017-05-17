<!--
	pages/logs.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
		$error=0;
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		
?>
	<div class="top">Admin  »  Logs</div>
	<div class="contain">
		<div class="menu">
			<center>
			<a href="index.php?p=admin">Accueil</a> 
			<a href="index.php?p=candidatures">Candidatures</a> 
			<a href="index.php?p=news">Articles</a> 
			<a href="index.php?p=logs">Logs</a> 
			<a href="index.php?p=afactions">Les Factions</a> 
			<a href="index.php?p=ajobs">Les jobs</a>
			<a href="index.php?p=bans">Bans</a> 
			<a href="index.php?p=staff">Equipe</a> 
			</center>
		</div>
		<div class="box_warning">
			<center>Type de log :</center>
			<div class="menu">
				<center>
				<a href="index.php?p=logs&amp;type=admin">Admin</a> 
				<a href="index.php?p=logs&amp;type=chat">Chat</a> 
				<a href="index.php?p=logs&amp;type=commands">Commandes</a> 
				<a href="index.php?p=logs&amp;type=connects">Connexions</a> 
				<a href="index.php?p=logs&amp;type=disconnects">Deconnexions</a> 
				<a href="index.php?p=logs&amp;type=deaths">Meutres</a>
				<a href="index.php?p=logs&amp;type=kick">Kick</a> 
				<a href="index.php?p=logs&amp;type=jails">Jails</a> 
				<a href="index.php?p=logs&amp;type=pays">Payes</a>
				<a href="index.php?p=logs&amp;type=renames">Renames</a>
				<?php if($dStats['AdminLevel'] >= 4) { ?>
				<a href="index.php?p=logs&amp;type=shop">Boutique</a>
				<a href="index.php?p=logs&amp;type=tokens">Tokens</a>
				<?php } ?>
				</center>
			</div>
		</div>
		<br/>
		<?php
		if(!empty($_GET['type']))
		{
			switch($_GET['type'])
			{
				case "admin":
				{?>
				<h3>Logs commandes administrateurs ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Action</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_admins ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							?>
							<tr>
								<td class="center"><?php echo $donnees['Value'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php break; }
				case "chat":
				{?>
				<h3>Logs du chat ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Chat</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_chat ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							?>
							<tr>
								<td><?php echo $donnees['Chat'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php break; }
				case "commands":
				{?>
				<h3>Logs des commandes en jeu ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Action</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_commands ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							?>
							<tr>
								<td class="center"><?php echo $donnees['value'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php break; }
				case "connects":
				{?>
				<h3>Logs des connexions ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Ip</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_connect ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "disconnects":
				{?>
				<h3>Logs des deconnexions ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Ip</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_disconnect ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "deaths":
				{?>
				<h3>Logs des meutres ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Victime</th>
							<th class="center">Ip Victime</th>
							<th class="center">Tueur</th>
							<th class="center">Ip Tueur</th>
							<th class="center">Raison</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_death ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['KillerSQLid']."'");
							$row2 = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<?php if($donnees['KillerSQLid'] != -1) { ?>
								<td class="center"><?php echo $row2[0];?></td>
								<?php } else { echo '<td class="center">Aucun</td>';} ?>
								<td class="center"><?php echo $donnees['KillerIp'];?></td>
								<td class="center"><?php echo $donnees['Reason'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "kick":
				{?>
				<h3>Logs des kick ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Ip</th>
							<th class="center">Par</th>
							<th class="center">Raison</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_kick ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							if($donnees['SQLid'] == 0) continue;
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo $donnees['KickedBy'];?></td>
								<td class="center"><?php echo $donnees['Reason'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "jails":
				{?>
				<h3>Logs des jails ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Ip</th>
							<th class="center">Par</th>
							<th class="center">Temps (mns)</th>
							<th class="center">Raison</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_jail ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo $donnees['JailBy'];?></td>
								<td class="center"><?php echo $donnees['Time'];?></td>
								<td class="center"><?php echo $donnees['Reason'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "pays":
				{?>
				<h3>Logs des payes ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Ip</th>
							<th class="center">Action</th>
							<th class="center">Montant</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_pay ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo $donnees['Reason'];?></td>
								<td class="center"><?php echo $donnees['Somme'];?> $</td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "renames":
				{?>
				<h3>Logs des changements de nom ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom Actuel</th>
							<th class="center">Nouveau Nom</th>
							<th class="center">Ancien Nom</th>
							<th class="center">Ip</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_log_renames ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['NewName'];?></td>
								<td class="center"><?php echo $donnees['LastName'];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php break; }
				case "shop":
				{?>
				<h3>Logs des achats boutique ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Type d'achat</th>
							<th class="center">Prix (Tokens)</th>
							<th class="center">Ip</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_site_pay ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Reason'];?></td>
								<td class="center"><?php echo $donnees['Price'];?></td>
								<td class="center"><?php echo $donnees['IP'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php break; }
				case "tokens":
				{?>
				<h3>Logs des achats tokens ..</h3>
				<table class="zebra" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th class="center">Nom</th>
							<th class="center">Tokens</th>
							<th class="center">Ip</th>
							<th class="center">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_site_tokens ORDER BY Date DESC LIMIT 0, 300');
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
							$row = mysqli_fetch_row($tmp);
							?>
							<tr>
								<td class="center"><?php echo $row[0];?></td>
								<td class="center"><?php echo $donnees['Reason'];?></td>
								<td class="center"><?php echo $donnees['Ip'];?></td>
								<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
							</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php break; }
			}
		}
		?>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>