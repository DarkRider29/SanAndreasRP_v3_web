<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isset($_SESSION['login']))
	{
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		
		if(isset($_GET['del1']))
		{
			$houseid=$dStats['House1']+1;
			$rhouse = mysqli_query($bdd,"SELECT * FROM `lvrp_server_houses` WHERE `id`=".$houseid."");
			$dhouse = mysqli_fetch_array($rhouse);
			if($dStats['Name'] == $dhouse['Owner'])
			{
				$req = mysqli_query($bdd,"SELECT * FROM `lvrp_users` WHERE `id`='".$_GET['del1']."'");
				$row = mysqli_fetch_array($req);
				if($row['House1']==$dStats['House1'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House1=-1 WHERE `id` = '".$_GET['del1']."'");}
				elseif($row['House2']==$dStats['House1'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House2=-1 WHERE `id` = '".$_GET['del1']."'");}
				elseif($row['House3']==$dStats['House1'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House3=-1 WHERE `id` = '".$_GET['del1']."'");}
				
				$nb=$dhouse['NbrLoc']-1;
				mysqli_query($bdd,"UPDATE `lvrp_users_houses` SET NbrLoc='".$nb."' WHERE `id` = '".$houseid."'");	
				echo"
				<script type='text/javascript'>window.location.replace('index.php?p=goods');</script>
				";
			}
		}
		if(isset($_GET['del2']))
		{
			$houseid=$dStats['House2']+1;
			$rhouse = mysqli_query($bdd,"SELECT * FROM `lvrp_server_houses` WHERE `id`=".$houseid."");
			$dhouse = mysqli_fetch_array($rhouse);
			if($dStats['Name'] == $dhouse['Owner'])
			{
				$req = mysqli_query($bdd,"SELECT * FROM `lvrp_users` WHERE `id`='".$_GET['del2']."'");
				$row = mysqli_fetch_array($req);
				if($row['House1']==$dStats['House2'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House1=-1 WHERE `id` = '".$_GET['del2']."'");}
				elseif($row['House2']==$dStats['House2'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House2=-1 WHERE `id` = '".$_GET['del2']."'");}
				elseif($row['House3']==$dStats['House2'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House3=-1 WHERE `id` = '".$_GET['del2']."'");}
				
				$nb=$dhouse['NbrLoc']-1;
				mysqli_query($bdd,"UPDATE `lvrp_users_houses` SET NbrLoc='".$nb."' WHERE `id` = '".$houseid."'");	
				echo"
				<script type='text/javascript'>window.location.replace('index.php?p=goods');</script>
				";
			}
		}
		if(isset($_GET['del3']))
		{
			$houseid=$dStats['House3']+1;
			$rhouse = mysqli_query($bdd,"SELECT * FROM `lvrp_server_houses` WHERE `id`=".$houseid."");
			$dhouse = mysqli_fetch_array($rhouse);
			if($dStats['Name'] == $dhouse['Owner'])
			{
				$req = mysqli_query($bdd,"SELECT * FROM `lvrp_users` WHERE `id`='".$_GET['del3']."'");
				$row = mysqli_fetch_array($req);
				if($row['House1']==$dStats['House3'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House1=-1 WHERE `id` = '".$_GET['del3']."'");}
				elseif($row['House2']==$dStats['House3'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House2=-1 WHERE `id` = '".$_GET['del3']."'");}
				elseif($row['House3']==$dStats['House3'])
					{mysqli_query($bdd,"UPDATE `lvrp_users` SET House3=-1 WHERE `id` = '".$_GET['del3']."'");}
				
				$nb=$dhouse['NbrLoc']-1;
				mysqli_query($bdd,"UPDATE `lvrp_users_houses` SET NbrLoc='".$nb."' WHERE `id` = '".$houseid."'");	
				echo"
				<script type='text/javascript'>window.location.replace('index.php?p=goods');</script>
				";
			}
		}
		
?>
	<div class="top">Mon compte  »  Mes biens</div>
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
		<?php
			if($dStats['Car1'] == -1 && $dStats['Car2'] == -1 & $dStats['Car3'] == -1 & $dStats['Car4'] == -1 & $dStats['Car5'] == -1 & $dStats['Car6'] == -1)
			{
				echo '
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicules</b></font></td></tr>
					<td align="left" valign="middle">
						<ul>
							<li><b>Vous n\'avez pas de véhicule</li>
						</ul>
					</td>
				</table>
				<br/>
				';
			}
			if($dStats['Car1'] != -1)
			{
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_vehicles` WHERE `id`='.$dStats['Car1'].'');
				$dCar = mysqli_fetch_array($req2);
				
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicule 1</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Model :</b> ' . getVehicleName($dCar['Model']).'</li>
							<li><b>Plaque :</b> ' . $dCar['License'] .'</li>
							<li><b>Couleurs :</b> ' . getVehicleColor($dCar['Color1']) .' et ' . getVehicleColor($dCar['Color2']) .'</li>
							<li><b>Prix d\'achat :</b> ' . $dCar['Price'] .'$</li>
							<li><b>Kilometres :</b> ' . $dCar['KiloMeter'] .',' . $dCar['Meter'] .' KM</li>
							<li><b>Essence :</b> ' . $dCar['Gas'] .' %</li>
							<li><b>SQLid :</b> ' . $dCar['id'] .'</li>';?>
						</ul>
						<td align="right" valign="middle" style="padding:5px;">
						<img style="border: 0; overflow: auto; max-width: 200px; width: expression(this.scrollWidth >= 200? \'200px\' : \'auto\');" src="<?php echo'images/vehicles/'.$dCar['Model'].'.jpg'; ?>" alt="" />
						</td>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Car2'] != -1)
			{
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_vehicles` WHERE `id`='.$dStats['Car2'].'');
				$dCar = mysqli_fetch_array($req2);
				
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicule 2</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Model :</b> ' . getVehicleName($dCar['Model']).'</li>
							<li><b>Plaque :</b> ' . $dCar['License'] .'</li>
							<li><b>Couleurs :</b> ' . getVehicleColor($dCar['Color1']) .' et ' . getVehicleColor($dCar['Color2']) .'</li>
							<li><b>Prix d\'achat :</b> ' . $dCar['Price'] .'$</li>
							<li><b>Kilometres :</b> ' . $dCar['KiloMeter'] .',' . $dCar['Meter'] .' KM</li>
							<li><b>Essence :</b> ' . $dCar['Gas'] .' %</li>
							<li><b>SQLid :</b> ' . $dCar['id'] .'</li>';?>
						</ul>
						<td align="right" valign="middle" style="padding:5px;">
						<img style="border: 0; overflow: auto; max-width: 200px; width: expression(this.scrollWidth >= 200? \'200px\' : \'auto\');" src="<?php echo'images/vehicles/'.$dCar['Model'].'.jpg'; ?>" alt="" />
						</td>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Car3'] != -1)
			{
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_vehicles` WHERE `id`='.$dStats['Car3'].'');
				$dCar = mysqli_fetch_array($req2);
				
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicule 3</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Model :</b> ' . getVehicleName($dCar['Model']).'</li>
							<li><b>Plaque :</b> ' . $dCar['License'] .'</li>
							<li><b>Couleurs :</b> ' . getVehicleColor($dCar['Color1']) .' et ' . getVehicleColor($dCar['Color2']) .'</li>
							<li><b>Prix d\'achat :</b> ' . $dCar['Price'] .'$</li>
							<li><b>Kilometres :</b> ' . $dCar['KiloMeter'] .',' . $dCar['Meter'] .' KM</li>
							<li><b>Essence :</b> ' . $dCar['Gas'] .' %</li>
							<li><b>SQLid :</b> ' . $dCar['id'] .'</li>';?>
						</ul>
						<td align="right" valign="middle" style="padding:5px;">
						<img style="border: 0; overflow: auto; max-width: 200px; width: expression(this.scrollWidth >= 200? \'200px\' : \'auto\');" src="<?php echo'images/vehicles/'.$dCar['Model'].'.jpg'; ?>" alt="" />
						</td>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Car4'] != -1)
			{
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_vehicles` WHERE `id`='.$dStats['Car4'].'');
				$dCar = mysqli_fetch_array($req2);
				
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicule 4</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Model :</b> ' . getVehicleName($dCar['Model']).'</li>
							<li><b>Plaque :</b> ' . $dCar['License'] .'</li>
							<li><b>Couleurs :</b> ' . getVehicleColor($dCar['Color1']) .' et ' . getVehicleColor($dCar['Color2']) .'</li>
							<li><b>Prix d\'achat :</b> ' . $dCar['Price'] .'$</li>
							<li><b>Kilometres :</b> ' . $dCar['KiloMeter'] .',' . $dCar['Meter'] .' KM</li>
							<li><b>Essence :</b> ' . $dCar['Gas'] .' %</li>
							<li><b>SQLid :</b> ' . $dCar['id'] .'</li>';?>
						</ul>
						<td align="right" valign="middle" style="padding:5px;">
						<img style="border: 0; overflow: auto; max-width: 200px; width: expression(this.scrollWidth >= 200? \'200px\' : \'auto\');" src="<?php echo'images/vehicles/'.$dCar['Model'].'.jpg'; ?>" alt="" />
						</td>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Car5'] != -1)
			{
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_vehicles` WHERE `id`='.$dStats['Car5'].'');
				$dCar = mysqli_fetch_array($req2);
				
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicule 5</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Model :</b> ' . getVehicleName($dCar['Model']).'</li>
							<li><b>Plaque :</b> ' . $dCar['License'] .'</li>
							<li><b>Couleurs :</b> ' . getVehicleColor($dCar['Color1']) .' et ' . getVehicleColor($dCar['Color2']) .'</li>
							<li><b>Prix d\'achat :</b> ' . $dCar['Price'] .'$</li>
							<li><b>Kilometres :</b> ' . $dCar['KiloMeter'] .',' . $dCar['Meter'] .' KM</li>
							<li><b>Essence :</b> ' . $dCar['Gas'] .' %</li>
							<li><b>SQLid :</b> ' . $dCar['id'] .'</li>';?>
						</ul>
						<td align="right" valign="middle" style="padding:5px;">
						<img style="border: 0; overflow: auto; max-width: 200px; width: expression(this.scrollWidth >= 200? \'200px\' : \'auto\');" src="<?php echo'images/vehicles/'.$dCar['Model'].'.jpg'; ?>" alt="" />
						</td>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Car6'] != -1)
			{
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_vehicles` WHERE `id`='.$dStats['Car6'].'');
				$dCar = mysqli_fetch_array($req2);
				
				?>
				<table cellpadding="0" cellspacing="1"class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Véhicule 6</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Model :</b> ' . getVehicleName($dCar['Model']).'</li>
							<li><b>Plaque :</b> ' . $dCar['License'] .'</li>
							<li><b>Couleurs :</b> ' . getVehicleColor($dCar['Color1']) .' et ' . getVehicleColor($dCar['Color2']) .'</li>
							<li><b>Prix d\'achat :</b> ' . $dCar['Price'] .'$</li>
							<li><b>Kilometres :</b> ' . $dCar['KiloMeter'] .',' . $dCar['Meter'] .' KM</li>
							<li><b>Essence :</b> ' . $dCar['Gas'] .' %</li>
							<li><b>SQLid :</b> ' . $dCar['id'] .'</li>';?>
						</ul>
						<td align="right" valign="middle" style="padding:5px;">
						<img style="border: 0; overflow: auto; max-width: 200px; width: expression(this.scrollWidth >= 200? \'200px\' : \'auto\');" src="<?php echo'images/vehicles/'.$dCar['Model'].'.jpg'; ?>" alt="" />
						</td>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Bizz1'] == -1 && $dStats['Bizz2'] == -1 & $dStats['Bizz3'] == -1)
			{
				echo '
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Bizz</b></font></td></tr>
					<td align="left" valign="middle">
						<ul>
							<li><b>Vous n\'avez pas de biz</li>
						</ul>
					</td>
				</table>
				<br/>
				';
			}
			if($dStats['Bizz1'] != -1)
			{
				$bizzid = $dStats['Bizz1']+1;
				if($dStats['Bizz1'] < 1000)
					{$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_bizz` WHERE `id`='.$bizzid.'');}
				else
				{
					$tmpId=$dStats['Bizz1']-999;
					$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_uniquebizz` WHERE `id`='.$tmpId.'');
				}
				$dBizz = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Biz 1</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Nom :</b> ' . $dBizz['Message'].'</li>
							<li><b>Valeur :</b> ' . $dBizz['Price'] .'$</li>
							<li><b>Prix d\'entrée :</b> ' . $dBizz['EnterPrice'] .'$</li>
							<li><b>En caisse :</b> ' . $dBizz['Caisse'] .'$</li>
							<li><b>Produits :</b> ' . $dBizz['Prods'] .'</li>
							<li><b>SQLid :</b> ' . $dBizz['id'] .'</li>';?>
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Bizz2'] != -1)
			{
				$bizzid = $dStats['Bizz2']+1;
				if($dStats['Bizz2'] < 1000)
					{$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_bizz` WHERE `id`='.$bizzid.'');}
				else
				{
					$tmpId=$dStats['Bizz2']-999;
					$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_uniquebizz` WHERE `id`='.$tmpId.'');
				}
				$dBizz = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Biz 2</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Nom :</b> ' . $dBizz['Message'].'</li>
							<li><b>Valeur :</b> ' . $dBizz['Price'] .'$</li>
							<li><b>Prix d\'entrée :</b> ' . $dBizz['EnterPrice'] .'$</li>
							<li><b>En caisse :</b> ' . $dBizz['Caisse'] .'$</li>
							<li><b>Produits :</b> ' . $dBizz['Prods'] .'</li>
							<li><b>SQLid :</b> ' . $dBizz['id'] .'</li>';?>
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Bizz3'] != -1)
			{
				$bizzid = $dStats['Bizz3']+1;
				if($dStats['Bizz3'] < 1000)
					{$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_bizz` WHERE `id`='.$bizzid.'');}
				else
				{
					$tmpId=$dStats['Bizz3']-999;
					$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_uniquebizz` WHERE `id`='.$tmpId.'');
				}
				$dBizz = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Biz 3</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Nom :</b> ' . $dBizz['Message'].'</li>
							<li><b>Valeur :</b> ' . $dBizz['Price'] .'$</li>
							<li><b>Prix d\'entrée :</b> ' . $dBizz['EnterPrice'] .'$</li>
							<li><b>En caisse :</b> ' . $dBizz['Caisse'] .'$</li>
							<li><b>Produits :</b> ' . $dBizz['Prods'] .'</li>
							<li><b>SQLid :</b> ' . $dBizz['id'] .'</li>';?>
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['House1'] == -1 && $dStats['House1'] == -1 & $dStats['House1'] == -1)
			{
				echo '
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Maisons</b></font></td></tr>
					<td align="left" valign="middle">
						<ul>
							<li><b>Vous n\'avez pas de maison</li>
						</ul>
					</td>
				</table>
				<br/>
				';
			}
			if($dStats['House1'] != -1)
			{
				$house=$dStats['House1']+1;
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_houses` WHERE `id`='.$house.'');
				$dHouse = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Maison 1</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Nom :</b> ' . $dHouse['Message'].'</li>
							<li><b>Valeur :</b> ' . $dHouse['Price'] .'$</li>
							<li><b>Assurance :</b> ' . getHouseAssurance($dHouse['Assurance']) .'</li>';
							if($dHouse['LocActive'] ==0)
								{echo '<li><b>Location :</b> Desactivée</li>';}
							else
							{
								echo '<li><b>Location :</b> Activée</li>';
								echo '<li><b>Prix Location : </b>'.$dHouse['RentPrice'].' $</li>';
								echo '<li><b>Nombre de locataire : </b>'.$dHouse['NbrLoc'].'/'.$dHouse['MaxLoc'].'</li>';
								echo '<li><b>SQLid :</b> ' . $dBizz['id'] .'</li>';
								if($dStats['Name'] == $dHouse['Owner'])
								{
									echo '
										<table class="zebra" cellspacing="0" cellpadding="0">
										<thead>
											<tr>
												<th class="center">Pr&eacute;nom_Nom</th>
												<th class="center">Virer</th>
											</tr>
										</thead>
										<tbody><br/>';

								

									$req3 = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE (House1='.$dStats['House1'].') OR (House2='.$dStats['House1'].') OR (House3='.$dStats['House1'].')');

									while ($donnees = mysqli_fetch_array($req3))
									{
										if($donnees['id'] == $dStats['id']) continue;
										echo '
											<tr>
												<td class="center">'.$donnees['Name'].'</td>';

												if($donnees['Connected'] == 0)
													{echo '<td><center><a href="index.php?p=goods&amp;del1='.$donnees['id'].'"><img src=images/croix.png></a></center></td>';}
												else
													{echo '<td><center><b>Joueur IG</b></center></td>';}

											echo'</tr>

											';
										}
										echo '</tbody>
									</table>
									';
								}
							}?>		
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['House2'] != -1)
			{
				$house=$dStats['House2']+1;
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_houses` WHERE `id`='.$house.'');
				$dHouse = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Maison 2</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Nom :</b> ' . $dHouse['Message'].'</li>
							<li><b>Valeur :</b> ' . $dHouse['Price'] .'$</li>
							<li><b>Assurance :</b> ' . getHouseAssurance($dHouse['Assurance']) .'</li>';
							if($dHouse['LocActive'] ==0)
								{echo '<li><b>Location :</b> Desactivée</li>';}
							else
							{
								echo '<li><b>Location :</b> Activée</li>';
								echo '<li><b>Prix Location : </b>'.$dHouse['RentPrice'].' $</li>';
								echo '<li><b>Nombre de locataire : </b>'.$dHouse['NbrLoc'].'/'.$dHouse['MaxLoc'].'</li>';
								echo '<li><b>SQLid :</b> ' . $dBizz['id'] .'</li>';
								if($dStats['Name'] == $dHouse['Owner'])
								{
									echo '
										<table class="zebra" cellspacing="0" cellpadding="0">
										<thead>
											<tr>
												<th class="center">Pr&eacute;nom_Nom</th>
												<th class="center">Virer</th>
											</tr>
										</thead>
										<tbody><br/>';

								

									$req3 = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE (House1='.$dStats['House2'].') OR (House2='.$dStats['House2'].') OR (House3='.$dStats['House2'].')');

									while ($donnees = mysqli_fetch_array($req3))
									{
										if($donnees['id'] == $dStats['id']) continue;
										echo '
											<tr>
												<td class="center">'.$donnees['Name'].'</td>';

												if($donnees['Connected'] == 0)
													{echo '<td><center><a href="index.php?p=goods&amp;del2='.$donnees['id'].'"><img src=images/croix.png></a></center></td>';}
												else
													{echo '<td><center><b>Joueur IG</b></center></td>';}

											echo'</tr>

											';
										}
										echo '</tbody>
									</table>
									';
								}
							}?>		
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['House3'] != -1)
			{
				$house=$dStats['House3']+1;
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_houses` WHERE `id`='.$house.'');
				$dHouse = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Maison 3</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Nom :</b> ' . $dHouse['Message'].'</li>
							<li><b>Valeur :</b> ' . $dHouse['Price'] .'$</li>
							<li><b>Assurance :</b> ' . getHouseAssurance($dHouse['Assurance']) .'</li>';
							if($dHouse['LocActive'] ==0)
								{echo '<li><b>Location :</b> Desactivée</li>';}
							else
							{
								echo '<li><b>Location :</b> Activée</li>';
								echo '<li><b>Prix Location : </b>'.$dHouse['RentPrice'].' $</li>';
								echo '<li><b>Nombre de locataire : </b>'.$dHouse['NbrLoc'].'/'.$dHouse['MaxLoc'].'</li>';
								echo '<li><b>SQLid :</b> ' . $dBizz['id'] .'</li>';
								if($dStats['Name'] == $dHouse['Owner'])
								{
									echo '
										<table class="zebra" cellspacing="0" cellpadding="0">
										<thead>
											<tr>
												<th class="center">Pr&eacute;nom_Nom</th>
												<th class="center">Virer</th>
											</tr>
										</thead>
										<tbody><br/>';

								

									$req3 = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE (House1='.$dStats['House3'].') OR (House2='.$dStats['House3'].') OR (House3='.$dStats['House3'].')');

									while ($donnees = mysqli_fetch_array($req3))
									{
										if($donnees['id'] == $dStats['id']) continue;
										echo '
											<tr>
												<td class="center">'.$donnees['Name'].'</td>';

												if($donnees['Connected'] == 0)
													{echo '<td><center><a href="index.php?p=goods&amp;del3='.$donnees['id'].'"><img src=images/croix.png></a></center></td>';}
												else
													{echo '<td><center><b>Joueur IG</b></center></td>';}

											echo'</tr>

											';
										}
										echo '</tbody>
									</table>
									';
								}
							}?>		
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Garage1'] == -1 && $dStats['Garage2'] == -1 & $dStats['Garage3'] == -1)
			{
				echo '
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Garages</b></font></td></tr>
					<td align="left" valign="middle">
						<ul>
							<li><b>Vous n\'avez pas de garage</li>
						</ul>
					</td>
				</table>
				<br/>
				';
			}
			if($dStats['Garage1'] != -1)
			{
				$garageId = $dStats['Garage1']+1;
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_garages` WHERE `id`='.$garageId.'');
				$dGarage = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Garage 1</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Valeur :</b> ' . $dGarage['Price'] .'$</li>
							<li><b>SQLid :</b> ' . $dGarage['id'] .'</li>';?>
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Garage2'] != -1)
			{
				$garageId = $dStats['Garage2']+1;
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_garages` WHERE `id`='.$garageId.'');
				$dGarage = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Garage 2</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Valeur :</b> ' . $dGarage['Price'] .'$</li>
							<li><b>SQLid :</b> ' . $dGarage['id'] .'</li>';?>
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			if($dStats['Garage3'] != -1)
			{
				$garageId = $dStats['Garage3']+1;
				$req2 = mysqli_query($bdd,'SELECT * FROM `lvrp_server_garages` WHERE `id`='.$garageId.'');
				$dGarage = mysqli_fetch_array($req2);
				?>
				<table cellpadding="0" cellspacing="1" class="classic">
					<tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Garage 3</b></font></td></tr>
					<td align="left" valign="middle">
						<ul><?php echo'
							<li><b>Valeur :</b> ' . $dGarage['Price'] .'$</li>
							<li><b>SQLid :</b> ' . $dGarage['id'] .'</li>';?>
						</ul>
					</td>
				</table>
				<br/>
				<?php
			}
			?>

		<br/>

		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>