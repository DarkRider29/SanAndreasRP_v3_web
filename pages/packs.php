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
		$tokensvalues=0;
		
		if(isset($_POST['hors_pack']))
		{
			if($dStats['Connected'] == 0)
			{
				$rservices = mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['service'])));
				if ($rservices == 1)
					{$tokensvalues = 50;}
				if ($rservices == 2)
					{$tokensvalues = 50;}
				if ($rservices == 3)
					{$tokensvalues = 50;}
				if ($rservices == 4)
					{$tokensvalues = 25;}
				if ($rservices == 5)
					{$tokensvalues = $dStats['Level']*50;}
				if ($rservices == 6)
					{$tokensvalues = 50;}
				if ($rservices == 7)
					{$tokensvalues = 50;}
					
				if($dStats['Tokens'] < $tokensvalues)
					{$error=1;}
				else
				{
					$tokenscredit = $dStats['Tokens'] - $tokensvalues;
					if($rservices == 1)
					{
						$renamexe = $dStats['PointsRename'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', PointsRename = '$renamexe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 Rename";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=1;
					}
					elseif($rservices == 2)
					{
						$changnumexe = $dStats['ChangeNum'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', ChangeNum = '$changnumexe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 Changement de numéro";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=2;
					}
					elseif($rservices == 3)
					{
						$plaquexe = $dStats['ChangePlaque'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', ChangePlaque = '$plaquexe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 Changement de plaque";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=3;
					}
					elseif($rservices == 4)
					{
						$respectexe = $dStats['Respect'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', Respect = '$respectexe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 respect";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=4;
					}
					elseif($rservices == 5)
					{
						$levelexe = $dStats['Level'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', Level = '$levelexe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 Level";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=5;
					}
					elseif($rservices == 6)
					{
						$changeagexe = $dStats['ChangeAge'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', ChangeAge = '$changeagexe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 Changement d\'age";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=6;
					}
					elseif($rservices == 7)
					{
						$changesexxe = $dStats['ChangeSex'] + 1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit', ChangeSex = '$changesexxe' WHERE id = '".$_SESSION['id']."'");
						$reason="+1 Changement de sexe";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=7;
					}
				}
			}
		}
		if(isset($_POST['house']))
		{
			if($dStats['Connected'] == 0)
			{
				$rservices = mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['service'])));
				$tokensvalues = $rservices*100;
					
				if($dStats['Tokens'] < $tokensvalues)
					{$error=1;}
				else
				{
					$tokenscredit = $dStats['Tokens'] - $tokensvalues;
					if($rservices == 1)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Maison moins de 10.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=8;
					}
					elseif($rservices == 2)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Maison moins de 20.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=9;
					}
					elseif($rservices == 3)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Maison moins de 30.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=10;
					}
					elseif($rservices == 4)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Maison moins de 40.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=11;
					}
					elseif($rservices == 5)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Maison moins de 50.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=12;
					}
					elseif($rservices == 6)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Maison moins de 60.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=13;
					}
				}
			}
		}
		if(isset($_POST['vehicle']))
		{
			if($dStats['Connected'] == 0)
			{
				$rservices = mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['service'])));
				$tokensvalues = $rservices*100;
					
				if($dStats['Tokens'] < $tokensvalues)
					{$error=1;}
				else
				{
					$tokenscredit = $dStats['Tokens'] - $tokensvalues;
					if($rservices == 1)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Vehicule moins de 10.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=14;
					}
					elseif($rservices == 2)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Vehicule moins de 20.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=15;
					}
					elseif($rservices == 3)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Vehicule moins de 30.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=16;
					}
					elseif($rservices == 4)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Vehicule moins de 40.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=17;
					}
					elseif($rservices == 5)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Vehicule moins de 50.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=18;
					}
					elseif($rservices == 6)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Vehicule moins de 60.000$";
						$date = date("d-m-Y");
						$heure = date("H:i");
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=19;
					}
				}
			}
		}
		if(isset($_POST['spawn']))
		{
			if($dStats['Connected'] == 0)
			{
				$rservices = mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['service'])));
				
				if ($rservices == 1)
					{$tokensvalues = 50;}
				if ($rservices == 2)
					{$tokensvalues = 50;}
				if ($rservices == 3)
					{$tokensvalues = 50;}
				if ($rservices == 4)
					{$tokensvalues = 300;}
					
				if($dStats['Tokens'] < $tokensvalues)
					{$error=1;}
				else
				{
					$tokenscredit = $dStats['Tokens'] - $tokensvalues;
					if($rservices == 1)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Spawn Biz";
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=20;
					}
					elseif($rservices == 2)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Spawn Maison";
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=21;
					}
					elseif($rservices == 3)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Spawn Garage";
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=22;
					}
					elseif($rservices == 4)
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Tokens ='$tokenscredit' WHERE id = '".$_SESSION['id']."'");
						$reason="Spawn Portail";
						$ip = $_SERVER["REMOTE_ADDR"];
						mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$tokensvalues."'");
						$succes=23;
					}
				}
			}
		}
		
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
?>
	<div class="top">Boutique  »  Hors Pack</div>
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
				{echo '<div class="box_vert"><center>Vous avez acheté un rename.</center></div>';}
			elseif($succes == 2)
				{echo '<div class="box_vert"><center>Vous avez acheté un changement de numéro.</center></div>';}
			elseif($succes == 3)
				{echo '<div class="box_vert"><center>Vous avez acheté un changement de plaque.</center></div>';}
			elseif($succes == 4)
				{echo '<div class="box_vert"><center>Vous avez acheté un respect.</center></div>';}
			elseif($succes == 5)
				{echo '<div class="box_vert"><center>Vous avez acheté un level.</center></div>';}
			elseif($succes == 6)
				{echo '<div class="box_vert"><center>Vous avez acheté un changement d\'âge.</center></div>';}
			elseif($succes == 7)
				{echo '<div class="box_vert"><center>Vous avez acheté un changement de sexe.</center></div>';}
			elseif($succes == 8)
				{echo '<div class="box_vert"><center>Vous avez acheté une maison à moins 10.000$.</center></div>';}
			elseif($succes == 9)
				{echo '<div class="box_vert"><center>Vous avez acheté une maison à moins 20.000$.</center></div>';}
			elseif($succes == 10)
				{echo '<div class="box_vert"><center>Vous avez acheté une maison à moins 30.000$.</center></div>';}
			elseif($succes == 11)
				{echo '<div class="box_vert"><center>Vous avez acheté une maison à moins 40.000$.</center></div>';}
			elseif($succes == 12)
				{echo '<div class="box_vert"><center>Vous avez acheté une maison à moins 50.000$.</center></div>';}
			elseif($succes == 13)
				{echo '<div class="box_vert"><center>Vous avez acheté une maison à moins 60.000$.</center></div>';}
			elseif($succes == 14)
				{echo '<div class="box_vert"><center>Vous avez acheté un véhicule à moins 10.000$.</center></div>';}
			elseif($succes == 15)
				{echo '<div class="box_vert"><center>Vous avez acheté un véhicule à moins 20.000$.</center></div>';}
			elseif($succes == 16)
				{echo '<div class="box_vert"><center>Vous avez acheté un véhicule à moins 30.000$.</center></div>';}
			elseif($succes == 17)
				{echo '<div class="box_vert"><center>Vous avez acheté un véhicule à moins 40.000$.</center></div>';}
			elseif($succes == 18)
				{echo '<div class="box_vert"><center>Vous avez acheté un véhicule à moins 50.000$.</center></div>';}
			elseif($succes == 19)
				{echo '<div class="box_vert"><center>Vous avez acheté un véhicule à moins 60.000$.</center></div>';}
			elseif($succes == 20)
				{echo '<div class="box_vert"><center>Vous avez acheté un Spawn Biz.</center></div>';}
			elseif($succes == 21)
				{echo '<div class="box_vert"><center>Vous avez acheté un Spawn Maison.</center></div>';}
			elseif($succes == 22)
				{echo '<div class="box_vert"><center>Vous avez acheté un Spawn Garage.</center></div>';}
			elseif($succes == 23)
				{echo '<div class="box_vert"><center>Vous avez acheté un Spawn Portail.</center></div>';}
		?>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Hors Pack</b></font></td></tr>
			<td align="left" valign="middle">
					<form name="horsp" method="post" action="index.php?p=packs">
						<ul>
							<li>Les changements se font dans une Mairie</li>
							<li>Les objets VIP se trouvent dans un magasin de vêtements</li>
						</ul>
						<center>
						<br/><b>Choisissez un service :</b><br/>
						<select name="service">
							<option value="1">1 Rename - 50 Tokens</option>	
							<option value="2">1 Changement de numéro - 50 Tokens</option>
							<option value="3">1 Changement de plaque - 50 Tokens</option>
							<option value="4">1 Respect - 25 Tokens</option>
							<option value="5">1 Level supplémentaire - <?php $price = $dStats['Level']*50; echo ''.$price.' Tokens'; ?></option>
							<option value="6">1 Changement de d'âge - 50 Tokens</option>
							<option value="7">1 Changement de sexe - 50 Tokens</option>
							<option value="7">10 objets VIP - 100 Tokens</option>
						</select>
						<br/><br/>
						<button class="buton_g" name="hors_pack" value="Acheter" type="submit">Acheter</button></center>
					<br/><br/>
					</form>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack Maison</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><font color="green">Ce pack limité est actuellement disponible.</font></li>
					<li>Valable sur les maisons de type normale</li>
					<li>Le prix de revente est nul</li>
					<li>Contactez un Administrateur après votre achat</li>
				</ul>
					<form name="horsp" method="post" action="index.php?p=packs">
						<center><br/><b>Choisissez un maison :</b><br/>
						<select name="service">
							<option value="1">Maison à 10.000$ ou moins - 100 Tokens</option>	
							<option value="2">Maison à 20.000$ ou moins - 200 Tokens</option>
							<option value="3">Maison à 30.000$ ou moins - 300 Tokens</option>
							<option value="4">Maison à 40.000$ ou moins - 400 Tokens</option>
							<option value="5">Maison à 50.000$ ou moins - 500 Tokens</option>
							<option value="6">Maison à 60.000$ ou moins - 600 Tokens</option>
						</select>
						<br/><br/>
						<button class="buton_g" name="house" value="Acheter" type="submit">Acheter</button></center>
					<br/><br/>
					</form>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack Vehicule</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><font color="green">Ce pack limité est actuellement disponible.</font></li>
					<li>Le prix de revente est nul</li>
					<li><font color="red"><h3>L'achat de véhicule par token se fait sur la page des concessions.</h3></font></li>
				</ul>
					<form name="horsp" method="post" action="index.php?p=packs">
						<center><br/><b>Choisissez un vehicule :</b><br/>
						<select name="service">
							<option disabled value="1">Véhicule à 10.000$ ou moins - 100 Tokens</option>	
							<option disabled value="2">Véhicule à 20.000$ ou moins - 200 Tokens</option>
							<option disabled value="3">Véhicule à 30.000$ ou moins - 300 Tokens</option>
							<option disabled value="4">Véhicule à 40.000$ ou moins - 400 Tokens</option>
							<option disabled value="5">Véhicule à 50.000$ ou moins - 500 Tokens</option>
							<option disabled value="6">Véhicule à 60.000$ ou moins - 600 Tokens</option>
						</select>
						<br/><br/>
						<button disabled class="buton_g" name="vehicle" value="Acheter" type="submit">Acheter</button></center>
					<br/><br/>
					</form>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1"class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack Spawn</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li>Les spawn Biz, Maison et Garage sont spawn avec leur prix d'achat</li>
					<li>Contactez un Administrateur après votre achat</li>
				</ul>
					<form name="horsp" method="post" action="index.php?p=packs">
						<center><br/><b>Choisissez un spawn :</b><br/>
						<select name="service">
							<option value="1">Spawn Biz - 50 Tokens</option>	
							<option value="2">Spawn Maison - 50 Tokens</option>
							<option value="3">Spawn Garage - 50 Tokens</option>
							<option value="4">Spawn Portail personnel - 300 Tokens</option>
						</select>
						<br/><br/>
						<button class="buton_g" name="spawn" value="Acheter" type="submit">Acheter</button></center>
					<br/><br/>
					</form>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1"class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Pack Déplacement</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li>Les déplacement permettent de changer la position de votre biz, maison et garage.</li>
					<li>Contactez un Administrateur après votre achat</li>
				</ul>
					<form name="horsp" method="post" action="index.php?p=packs">
						<center><br/><b>Choisissez un déplacement :</b><br/>
						<select name="service">
							<option value="1">Déplacement Biz - 50 Tokens</option>	
							<option value="2">Déplacement Maison - 50 Tokens</option>
							<option value="3">Déplacement Garage - 50 Tokens</option>
						</select>
						<br/><br/>
						<button class="buton_g" name="spawn" value="Acheter" type="submit">Acheter</button></center>
					<br/><br/>
					</form>
            </td>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>