<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		
		$req = mysqli_query($bdd,"SELECT * FROM lvrp_users_bans WHERE ip='".$dStats['Ip']."'");
		$dBans = mysqli_fetch_array($req);
		$ban = $dBans['Ip'];

		if ($ban == ''){ $ban = 'Non'; } else { $ban = '</font color=red>Oui</font>'; }
		if ($dStats['Connected'] == 1){ $dStats['Connected']="Connecte(e)"; } else { $dStats['Connected']="Deconnecte(e)";}
		
		$bag="Non";
		$chest="Non";
		$veh1="Non";
		$veh2="Non";
		$veh3="Non";
		
		if($dStats['DonateRank'] > 3)
			 {$bag="Oui"; $chest="Oui";}
			 
		if($dStats['CarUnLock4'] != 0)
			{$veh1="Oui";}
		if($dStats['CarUnLock5'] != 0)
			{$veh2="Oui";}
		if($dStats['CarUnLock6'] != 0)
			{$veh3="Oui";}
		

?>
	<div class="top">Mon compte  »  Mon compte</div>
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
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mon compte</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>Niveau d\'administration :</b> ' . getAdminRank($dStats['AdminLevel']) .'</li>
					<li><b>Actuellement connecté IG :</b> ' . $dStats['Connected'] .'</li>
					<li><b>Temps de jeu :</b> ' . $dStats['ConnectedTime'] . ' heure(s)</li>
					<li><b>Avertissement(s) :</b> ' . $dStats['Warnings'] . '</li>
					<li><b>Email : </b> ' . $dStats['Email'] . '</li>
					<li><b>Dernière connexion : </b> ' . date("d-m-Y à H:i:s",$dStats['LastLog']) . '</li>
					<li><b>Dernière ip : </b> ' . $dStats['Ip'] . '</li>
					<li><b>Date d\'inscription : </b> ' . date("d-m-Y à H:i:s",$dStats['LastLog']) . '</li>
					<li><b>Ip d\'inscription : </b> ' . $dStats['Locked'] . '</li>
					<li><b>Banni : </b> ' . $ban . '</li>
					<li><b>Nombre de vote : </b> ' . $dStats['Votes'] . '</li>
					<li><b>Dernier vote : </b> ' . date("d-m-Y à H:i:s",$dStats['HasVoted1']) . '</li>
					<li><b>Tokens : </b> ' . $dStats['Tokens'] . '</li>'; ?>
                </ul>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mon statut VIP</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>VIP level :</b> ' . getVipRank($dStats['DonateRank']) .'</li>
					<li><b>Rename(s) :</b> ' . $dStats['PointsRename'] .'</li>
					<li><b>Changement de numéro :</b> ' . $dStats['ChangeNum'] . '</li>
					<li><b>Changement de plaque :</b> ' . $dStats['ChangePlaque'] . '</li>
					<li><b>Changement de sexe : </b> ' . $dStats['ChangeSex'] . '</li>
					<li><b>Changement d\'âge : </b> ' . $dStats['ChangeAge'] . '</li>
					<li><b>Accès au sac VIP </b> ' . $bag . '</li>
					<li><b>Accès au coffre VIP : </b> ' .$chest . '</li>
					<li><b>Slot 1 de véhicule  : </b> ' . $veh1 . '</li>
					<li><b>Slot 2 de véhicule : </b>' . $veh2 . '</li>
					<li><b>Slot 3 de véhicule :  </b>' . $veh3 . '</li>'; ?>
                </ul>
            </td>
		</table>
		<br/>

		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>