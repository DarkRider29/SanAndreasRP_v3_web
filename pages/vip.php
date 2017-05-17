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
		
		$error=0;
		$succes=0;
		
		if(!empty($_GET['buy']))
		{
			if($_GET['buy'] == 'fer')
			{
				$tokens=100;
				
				if($dStats['Tokens'] < $tokens)
					{$error=1;}
				elseif($dStats['Connected'] == 1)
					{$error=2;}
				else
				{
					$tokenscredit = $dStats['Tokens']-$tokens;
					$viptime = $dStats['VipTime']+2880;
					$renamexe = $dStats['PointsRename'] + 1;
					$changnumxe = $dStats['ChangeNum'] + 1;
					$respectexe = $dStats['Respect'] + 2;
					
					mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', VipTime = '$viptime', PointsRename = '$renamexe', ChangeNum='$changnumxe', Respect = '$respectexe' WHERE id = '".$_SESSION['id']."'");
					
					if($dStats['DonateRank'] < 1)
						{mysqli_query($bdd,"UPDATE lvrp_users SET DonateRank=1 WHERE id = '".$_SESSION['id']."'");}
						
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
				
					$reason="Pack VIP FER";
					$ip = $_SERVER["REMOTE_ADDR"];
					mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokens."'");
					$succes=1;
				}
			}
			elseif($_GET['buy'] == 'argent')
			{
				$tokens=300;
				
				if($dStats['Tokens'] < $tokens)
					{$error=1;}
				elseif($dStats['Connected'] == 1)
					{$error=2;}
				else
				{
					$tokenscredit = $dStats['Tokens']-$tokens;
					$viptime = $dStats['VipTime']+5760;
					$renamexe = $dStats['PointsRename'] + 2;
					$changnumxe = $dStats['ChangeNum'] + 1;
					$changplaquex = $dStats['ChangePlaque'] + 1;
					$respectexe = $dStats['Respect'] + 4;
					
					mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', VipTime = '$viptime', PointsRename = '$renamexe', ChangeNum='$changnumxe', Respect = '$respectexe', ChangePlaque = '$changplaquex' WHERE id = '".$_SESSION['id']."'");

					if($dStats['DonateRank'] < 2)
						{mysqli_query($bdd,"UPDATE lvrp_users SET DonateRank=2 WHERE id = '".$_SESSION['id']."'");}
					
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
						
					$reason="Pack VIP ARGENT";
					$ip = $_SERVER["REMOTE_ADDR"];
					mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokens."'");
					$succes=2;
				}
			}
			elseif($_GET['buy'] == 'or')
			{
				$tokens=600;
				
				if($dStats['Tokens'] < $tokens)
					{$error=1;}
				elseif($dStats['Connected'] == 1)
					{$error=2;}
				else
				{
					$tokenscredit = $dStats['Tokens']-$tokens;
					$viptime = $dStats['VipTime']+11520;
					$renamexe = $dStats['PointsRename'] + 3;
					$changnumxe = $dStats['ChangeNum'] + 1;
					$changplaquex = $dStats['ChangePlaque'] + 2;
					$respectexe = $dStats['Respect'] + 8;
				
					mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', VipTime = '$viptime', PointsRename = '$renamexe', ChangeNum='$changnumxe', Respect = '$respectexe', ChangePlaque = '$changplaquex' WHERE id = '".$_SESSION['id']."'");
				
					if($dStats['DonateRank'] < 3)
						{mysqli_query($bdd,"UPDATE lvrp_users SET DonateRank=3 WHERE id = '".$_SESSION['id']."'");}
						
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
						
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
						
					$reason="Pack VIP OR";
					$ip = $_SERVER["REMOTE_ADDR"];
					mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokens."'");
					$succes=3;
				}
			}
			elseif($_GET['buy'] == 'diamant')
			{
				$tokens=900;
				
				if($dStats['Tokens'] < $tokens)
					{$error=1;}
				elseif($dStats['Connected'] == 1)
					{$error=2;}
				else
				{
					$tokenscredit = $dStats['Tokens']-$tokens;
					$viptime = $dStats['VipTime']+23040;
					$renamexe = $dStats['PointsRename'] + 4;
					$changnumxe = $dStats['ChangeNum'] + 2;
					$changplaquex = $dStats['ChangePlaque'] + 2;
					$changagexe = $dStats['ChangeAge'] + 1;
					$changsexexe = $dStats['ChangeSex'] + 1;
					$respectexe = $dStats['Respect'] + 16;
				
					mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', VipTime = '$viptime', PointsRename = '$renamexe', ChangeNum='$changnumxe', Respect = '$respectexe', ChangePlaque = '$changplaquex', ChangeAge = '$changagexe', ChangeSex = '$changsexexe' WHERE id = '".$_SESSION['id']."'");
				
					if($dStats['DonateRank'] < 4)
						{mysqli_query($bdd,"UPDATE lvrp_users SET DonateRank=4 WHERE id = '".$_SESSION['id']."'");}
						
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
						
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
						
					if($dStats['CarUnLock4'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock4=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock5'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock5=1 WHERE id='.$_SESSION['id'].'');}
					elseif($dStats['CarUnLock6'] == 0)
						{mysqli_query($bdd,'UPDATE `lvrp_users` SET CarUnLock6=1 WHERE id='.$_SESSION['id'].'');}
						
					$reason="Pack VIP DIAMANT";
					$ip = $_SERVER["REMOTE_ADDR"];
					mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokens."'");
					$succes=4;
				}
			}
		}
		
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
?>
	<div class="top">Boutique  »  Pack VIP</div>
	<div class="contain">
		<div class="menu">
			<center>
			<a href="index.php?p=shop">Conditions générales de vente</a> 
			<a href="index.php?p=vip">Pack Vip</a> 
			<a href="index.php?p=packs">Hors Pack</a> 
			<a href="index.php?p=tokens">Tokens</a> 
			<a href="index.php?p=market">Marché</a> 

			</center>
		</div>
		<br/>
		<div class="box_orange"><center>Vous disposez de <b><?php echo number_format($dStats['Tokens'],1); ?></b> tokens.</center></div>
		<?php
			if($dStats['Connected'] == 1)
				{echo '<div class="box_warning"><center>Vous devez être déconnecté du serveur pour effectuer un achat !</center></div>';}
				
			if($error == 1)
				{echo '<div class="box_warning"><center>Vous n\'avez pas assez de tokens pour cet achat !</center></div>';}
				
			if($succes == 1)
				{echo '<div class="box_vert"><center>Vous avez acheté le pack VIP Fer.</center></div>';}
			elseif($succes == 2)
				{echo '<div class="box_vert"><center>Vous avez acheté le pack VIP Argent.</center></div>';}
			elseif($succes == 3)
				{echo '<div class="box_vert"><center>Vous avez acheté le pack VIP Or.</center></div>';}
			elseif($succes == 4)
				{echo '<div class="box_vert"><center>Vous avez acheté le pack VIP Diamant.</center></div>';}
		?>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Avantage VIP</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>Canal VIP (/vc)</b></li>
					<li><b>Accès aux PM</b></li>
					<li><b>Commandes VIP (/vip)</b></li>
					<li><b>Espace VIP sur le site</b></li>
					<li><b>Titre 'VIP' sur les canaux IG, forum et TeamSpeak</b></li>
					<li><b>Canal privée VIP sur TeamSpeak</b></li>
					<li><b>Possibilité de fermer vos PM</b></li>
                </ul>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack VIP Fer</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>1 Slot de véhicule en plus</b></li>
					<li><b>1 Rename</b></li>
					<li><b>1 Changement de numéro personnalisé</b></li>
					<li><b>2 Points de respect</b></li>
					<div style="padding-right:30px;">
						<p align="right"><img src="images/icons/alarm-clock-blue.png"> <a><b>48 heures</b></a> de jeu</p>
						<p align="right"><img src="images/icons/money.png"> <a><b>100</b></a> tokens </p>
						<p align="right"><a class="buton_g" href="index.php?p=vip&amp;buy=fer">Acheter</a></p>
					</div>
                </ul>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack VIP Argent</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>1 Slot de véhicule en plus</b></li>
					<li><b>2 Renames</b></li>
					<li><b>1 Changement de numéro personnalisé</b></li>
					<li><b>1 Changement de plaque</b></li>
					<li><b>4 Points de respect</b></li>
					<li><b>+ Intéret 5 % aux payes</b></li>
					<div style="padding-right:30px;">
						<p align="right"><img src="images/icons/alarm-clock-blue.png"> <a><b>96 heures</b></a> de jeu</p>
						<p align="right"><img src="images/icons/money.png"> <a><b>300</b></a> tokens </p>
						<p align="right"><a class="buton_g" href="index.php?p=vip&amp;buy=argent">Acheter</a></p>
					</div>
                </ul>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack VIP Or</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>2 Slots de véhicule en plus</b></li>
					<li><b>3 Renames</b></li>
					<li><b>1 Changement de numéro personnalisé</b></li>
					<li><b>1 Changement de plaque</b></li>
					<li><b>8 Points de respect</b></li>
					<li><b>+ Intéret 10 % aux payes</b></li>
					<li><b>Pas de temps d'hôpital</b></li>
					<div style="padding-right:30px;">
						<p align="right"><img src="images/icons/alarm-clock-blue.png"> <a><b>192 heures</b></a> de jeu</p>
						<p align="right"><img src="images/icons/money.png"> <a><b>600</b></a> tokens </p>
						<p align="right"><a class="buton_g" href="index.php?p=vip&amp;buy=or">Acheter</a></p>
					</div>
                </ul>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack VIP Diamant</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>3 Slots de véhicule en plus</b></li>
					<li><b>4 Renames</b></li>
					<li><b>2 Changements de numéro personnalisé</b></li>
					<li><b>2 Changements de plaque</b></li>
					<li><b>16 Points de respect</b></li>
					<li><b>+ Intéret 15 % aux payes</b></li>
					<li><b>Pas de temps d'hôpital</b></li>
					<li><b>1 Changement d'age</b></li>
					<li><b>1 Changement de sexe</b></li>
					<li><b>Coffre VIP</b></li>
					<li><b>Possibilité de mettre son armure à 50 toutes les 60 minutes</b></li>
					<li><b>Accès au sac VIP (+2 Slots d'arme)</b></li>
					<div style="padding-right:30px;">
						<p align="right"><img src="images/icons/alarm-clock-blue.png"> <a><b>384 heures</b></a> de jeu</p>
						<p align="right"><img src="images/icons/money.png"> <a><b><font color="green">900</font> <font color="red"><i><s>(1000)</i></s></font></b></a> tokens </p>
						<p align="right"><a class="buton_g" href="index.php?p=vip&amp;buy=diamant">Acheter</a></p>
					</div>
                </ul>
            </td>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>