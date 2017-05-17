<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
		

?>
	<div class="top">Serveur »  Concessions</div>
	<div class="contain">
		<div class="menu">
			<center>
			<a href="index.php?p=concessions&amp;type=sport">Sport</a> 
			<a href="index.php?p=concessions&amp;type=auto">Auto</a> 
			<a href="index.php?p=concessions&amp;type=usefulls">4X4 & Utilitaires</a> 
			<a href="index.php?p=concessions&amp;type=bike">2 roues</a> 
			<a href="index.php?p=concessions&amp;type=boat">Bateau</a> 
			<a href="index.php?p=concessions&amp;type=plane">Avion</a> 
			</center>
		</div>
		<br/>
		<br/>
		<br/>
		<?php
		$_SESSION['Refresh']=0;
		
		if(!isset($_SESSION['errorConcess']))
			{$_SESSION['errorConcess']=0;}
		
		if(!empty($_GET['type']))
		{
				if($_GET['type'] == "buyD")
				{
					if(!empty($_GET['id']) && isConnected() && !isInGame())
					{
						$tmpId = mysqli_real_escape_string($bdd,$_GET['id']);
						$req2 = mysqli_query($bdd, 'SELECT * FROM lvrp_server_vehicles_prices WHERE id = '.$tmpId.'');
						$vehicle = mysqli_fetch_array($req2);
						$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
						$dStats = mysqli_fetch_array($req);
						if($dStats['Bank'] < $vehicle['Price'] || $vehicle['Price'] < 1)
						{
							$_SESSION['errorConcess']=1; $_SESSION['Refresh']=1;
							echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
						}
						else
						{
							if($dStats['Car1'] != -1 && $dStats['Car2'] != -1 && $dStats['Car3'] != -1 && ($dStats['Car4'] != -1 && $dStats['CarUnlock4'] == 1) && ($dStats['Car5'] != -1 && $dStats['CarUnlock5'] == 1) && ($dStats['Car6'] != -1 && $dStats['CarUnlock6'] == 1))
							{
								$_SESSION['errorConcess']=2; $_SESSION['Refresh']=1;
								echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
							}
							else
							{
								$x; $y; $z; $a;
								getDealerShipPos($dStats['City'], $vehicle['Model'], $x, $y, $z, $a);
								$requete = 'INSERT INTO lvrp_server_vehicles SET Model='.$vehicle['Model'].', Pos_x='.$x.', Pos_y='.$y.', Pos_z='.$z.', Angle='.$a.', SQLID='.$dStats['id'].', Owner="'.$dStats['Name'].'", Description="'.getVehicleName($vehicle['Model']).'", Price='.$vehicle['Price'].', License="SARP", Type=0, Locked=0, Color1=1, Color2=1';
								mysqli_query($bdd,$requete);
								$resultId = mysqli_insert_id($bdd);
								$bank = $dStats['Bank']-$vehicle['Price'];
								$reason="Achat véhicule SITE";
								$ip = $_SERVER["REMOTE_ADDR"];
								mysqli_query($bdd,"INSERT INTO `lvrp_log_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Somme ='".$vehicle['Price']."'");
								mysqli_query($bdd,'UPDATE lvrp_users SET Bank = '.$bank.' WHERE id = '.$dStats['id'].'');
								if($dStats['Car1'] == -1)
									{mysqli_query($bdd,'UPDATE lvrp_users SET Car1 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
								elseif($dStats['Car2'] == -1)
									{mysqli_query($bdd,'UPDATE lvrp_users SET Car2 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
								elseif($dStats['Car3'] == -1)
									{mysqli_query($bdd,'UPDATE lvrp_users SET Car3 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
								elseif($dStats['Car4'] == -1 && $dStats['CarUnlock4'] == 1)
									{mysqli_query($bdd,'UPDATE lvrp_users SET Car4 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
								elseif($dStats['Car5'] == -1 && $dStats['CarUnlock5'] == 1)
									{mysqli_query($bdd,'UPDATE lvrp_users SET Car5 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
								elseif($dStats['Car6'] == -1 && $dStats['CarUnlock6'] == 1)
									{mysqli_query($bdd,'UPDATE lvrp_users SET Car6 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
									
								$_SESSION['errorConcess']=3; $_SESSION['Refresh']=1;
								echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
							}
						}
					}
					else
						{echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';}
				}
				elseif($_GET['type'] == "buyT")
				{
					if(!empty($_GET['id']) && isConnected() && !isInGame())
					{
						$tmpId = mysqli_real_escape_string($bdd,$_GET['id']);
						$req2 = mysqli_query($bdd, 'SELECT * FROM lvrp_server_vehicles_prices WHERE id = '.$tmpId.'');
						$vehicle = mysqli_fetch_array($req2);
						$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
						$dStats = mysqli_fetch_array($req);
						
						$token=0;
						if($vehicle['Price'] <= 10000){$token=100;}
						elseif($vehicle['Price'] <= 20000){$token=200;}
						elseif($vehicle['Price'] <= 30000){$token=300;}
						elseif($vehicle['Price'] <= 40000){$token=400;}
						elseif($vehicle['Price'] <= 50000){$token=500;}
						elseif($vehicle['Price'] <= 60000){$token=600;}
						
						if($token <= 0)
						{
							$_SESSION['errorConcess']=4; $_SESSION['Refresh']=1;
							echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
						}
						else
						{
							if($dStats['Tokens'] < $token)
							{
								$_SESSION['errorConcess']=5; $_SESSION['Refresh']=1;
								echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
							}
							else
							{
								if($dStats['Car1'] != -1 && $dStats['Car2'] != -1 && $dStats['Car3'] != -1 && ($dStats['Car4'] != -1 && $dStats['CarUnlock4'] == 1) && ($dStats['Car5'] != -1 && $dStats['CarUnlock5'] == 1) && ($dStats['Car6'] != -1 && $dStats['CarUnlock6'] == 1))
								{
									$_SESSION['errorConcess']=2; $_SESSION['Refresh']=1;
									echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
								}
								else
								{
									$x; $y; $z; $a;
									getDealerShipPos($dStats['City'], $vehicle['Model'], $x, $y, $z, $a);
									$requete = 'INSERT INTO lvrp_server_vehicles SET Model='.$vehicle['Model'].', Pos_x='.$x.', Pos_y='.$y.', Pos_z='.$z.', Angle='.$a.', SQLID='.$dStats['id'].', Owner="'.$dStats['Name'].'", Description="'.getVehicleName($vehicle['Model']).'", Price=0, License="SARP", Type=0, Locked=0, Color1=1, Color2=1';
									mysqli_query($bdd,$requete);
									$resultId = mysqli_insert_id($bdd);
									$tokens = $dStats['Tokens']-$token;
									$reason="Achat véhicule";
									$date = date("d-m-Y");
									$heure = date("H:i");
									$ip = $_SERVER["REMOTE_ADDR"];
									mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$_SESSION['id']."', Date=UNIX_TIMESTAMP(), Reason='".$reason."', Ip='".$ip."', Price ='".$token."'");
									mysqli_query($bdd,'UPDATE lvrp_users SET Tokens = '.$tokens.' WHERE id = '.$dStats['id'].'');
									if($dStats['Car1'] == -1)
										{mysqli_query($bdd,'UPDATE lvrp_users SET Car1 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
									elseif($dStats['Car2'] == -1)
										{mysqli_query($bdd,'UPDATE lvrp_users SET Car2 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
									elseif($dStats['Car3'] == -1)
										{mysqli_query($bdd,'UPDATE lvrp_users SET Car3 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
									elseif($dStats['Car4'] == -1 && $dStats['CarUnlock4'] == 1)
										{mysqli_query($bdd,'UPDATE lvrp_users SET Car4 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
									elseif($dStats['Car5'] == -1 && $dStats['CarUnlock5'] == 1)
										{mysqli_query($bdd,'UPDATE lvrp_users SET Car5 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
									elseif($dStats['Car6'] == -1 && $dStats['CarUnlock6'] == 1)
										{mysqli_query($bdd,'UPDATE lvrp_users SET Car6 = '.$resultId.' WHERE id = '.$dStats['id'].'');}
										
									$_SESSION['errorConcess']=3; $_SESSION['Refresh']=1;
									echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';
								}
							}
						}
					}
					else
						{echo '<meta http-equiv="refresh" content="0; URL=index.php?p=concessions">';}
				}
				else
				{
					if($_GET['type'] == "sport")
						{$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_server_vehicles_prices WHERE dealerShip = 1');}
					elseif($_GET['type'] == "auto")
						{$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_server_vehicles_prices WHERE dealerShip = 2');}
					elseif($_GET['type'] == "usefulls")
						{$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_server_vehicles_prices WHERE dealerShip = 3');}
					elseif($_GET['type'] == "bike")
						{$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_server_vehicles_prices WHERE dealerShip = 4');}
					elseif($_GET['type'] == "boat")
						{$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_server_vehicles_prices WHERE dealerShip = 5');}
					elseif($_GET['type'] == "plane")
						{$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_server_vehicles_prices WHERE dealerShip = 6');}
						while ($donnees = mysqli_fetch_assoc($req2))
						{
							if($donnees['Price'] <= 0) continue;
					?>
						<div class="sellbox">
							<img style="border: 0; overflow: auto; height:135px; width: 166px;');" src="./images/vehicles/<?php echo $donnees['Model'];?>.jpg">
							<center><h3><?php echo getVehicleName($donnees['Model']); ?></h3></center>
							&nbsp;&nbsp;&nbsp;Prix : <?php echo $donnees['Price']; ?> $ <br/>
							&nbsp;&nbsp;&nbsp;Boutique : 
							<?php
								if($donnees['Price'] > 60000)
									{echo '<font color="red">Non</font>';}
								else
								{
									echo '<font color="green">Oui</font>&nbsp;(';
									if($donnees['Price'] <= 10000){echo '100 T';}
									elseif($donnees['Price'] <= 20000){echo '200 T';}
									elseif($donnees['Price'] <= 30000){echo '300 T';}
									elseif($donnees['Price'] <= 40000){echo '400 T';}
									elseif($donnees['Price'] <= 50000){echo '500 T';}
									elseif($donnees['Price'] <= 60000){echo '600 T';}
									echo ')';
								}
								if(isConnected())
								{
							?>
							<p>
							<center><?php echo'<a a href="#?w=500" rel="popup_'.$donnees['id'].'" class="poplight buton_g">Acheter</a>'; ?></center></p>
							<?php
								$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
								$dStats = mysqli_fetch_array($req);
								echo '
								<div id="popup_'.$donnees['id'].'" class="popup_block">
									<img src="./images/vehicles/'.$donnees['Model'].'.jpg" style="float: right; margin: 50px 0 0 20px;" />
									<h2>'.getVehicleName($donnees['Model']).'</h2>
									Prix (en $) : '.$donnees['Price'].' $<br/>
									Prix (en Tokens) : ';
									$token=0;
									if($donnees['Price'] > 60000)
										{echo '<font color="red">Non</font>';}
									else
									{
										echo '';
										if($donnees['Price'] <= 10000){echo '100 T'; $token=100;}
										elseif($donnees['Price'] <= 20000){echo '200 T';$token=200;}
										elseif($donnees['Price'] <= 30000){echo '300 T';$token=300;}
										elseif($donnees['Price'] <= 40000){echo '400 T';$token=400;}
										elseif($donnees['Price'] <= 50000){echo '500 T';$token=500;}
										elseif($donnees['Price'] <= 60000){echo '600 T';$token=600;}
									}
									echo '<br/>';
									echo '<br/>Compte en banque : '.$dStats['Bank'].' $<br/>
											Tokens : '.$dStats['Tokens'].'<br/><br/><br/>';
									if(isInGame())
										{echo '<font size="1" color="red">Impossible d\'acheter ce véhicule en $ en étant connecté en jeu.</font>'; }
									elseif($dStats['Bank']<$donnees['Price'])
										{echo '<font size="1" color="red">Vous ne disposez pas d\'assez de $ en banque pour acheter ce véhicule.</font>'; }
									else
										{echo 
										'
											<center>Acheter en $ :<br/>
											<a a href="#?w=470" rel="popup2_'.$donnees['id'].'" class="poplight buton_g">Acheter</a></center>
											<div id="popup2_'.$donnees['id'].'" class="popup_block">
												<center>Souhaitez-vous vraiment acheter ce véhicule en $ ?<br/>
												<a class="buton_g" href="index.php?p=concessions&amp;type=buyD&amp;id='.$donnees['id'].'">Oui</a> <a class="buton_g close" href="#">Non</a></center>
											</div>
										
										';}
									echo '<br/>';
									if($token == 0)
										{echo '<font size="1" color="red">Ce véhicule ne peut pas être acheté avec des tokens.</font>';}
									elseif($dStats['Tokens'] < $token)
										{echo '<font size="1" color="red">Vous ne disposez pas d\'assez de tokens pour acheter ce véhicule.</font>';}
									else
										{echo 
										'
											<center>Acheter en Tokens :<br/>
											<a a href="#?w=520" rel="popup3_'.$donnees['id'].'" class="poplight buton_g">Acheter</a></center>
											<div id="popup3_'.$donnees['id'].'" class="popup_block">
												<center>Souhaitez-vous vraiment acheter ce véhicule en tokens ?<br/>
												<a class="buton_g" href="index.php?p=concessions&amp;type=buyT&amp;id='.$donnees['id'].'">Oui</a> <a class="buton_g close" href="#">Non</a></center>
											</div>
										
										';}
								echo '
								</div>
								';
								}
							?>
							
						</div>
						
					<?php 
				}
			}
			
		}
		else
		{
			if($_SESSION['errorConcess'] != 0 && $_SESSION['Refresh']==0)
			{
				if($_SESSION['errorConcess'] == 1)
					{echo '<div class="box_warning"><center>Vous n\'avez pas assez d\'argent dans votre compte en banque !</center></div>'; $_SESSION['errorConcess']=0;}
				elseif($_SESSION['errorConcess'] == 2)
					{echo '<div class="box_warning"><center>Vous n\'avez plus d\'emplacement de véhicule libre.</center></div>'; $_SESSION['errorConcess']=0;}
				elseif($_SESSION['errorConcess'] == 3)
					{echo '<div class="box_vert"><center>Félicitation pour l\'achat de votre véhicule, vous pouvez le retrouver dans vos stats et dans le jeu en faisant le commande /v spawn .</center></div>'; $_SESSION['errorConcess']=0;}
				elseif($_SESSION['errorConcess'] == 4)
					{echo '<div class="box_warning"><center>Ce véhicule ne peut pas être acheté en boutique !.</center></div>'; $_SESSION['errorConcess']=0;}
				elseif($_SESSION['errorConcess'] == 5)
					{echo '<div class="box_warning"><center>Vous n\'avez pas assez de token pour acheter ce véhicule.</center></div>'; $_SESSION['errorConcess']=0;}
				
			}
		?>
		
		<fieldset>
		<h3>Bienvenue sur le page des concessions de San Andreas !</h3><br/>
		Vous trouverez ici tous les véhicules en vente avec leurs informations relatives.
		<br/><br/>
		
		<font color=green">Vous avez la possibilité d'acheter des véhicules en lignes !</font><br/><br/>
		Pour cela, plusieurs conditions sont nécessaires :<br/>
		- Etre déconnecté du serveur et être connecté sur le site.<br/>
		- Disposer de slots de véhicules libres.<br/><br/>
		
		Pour acheter un véhicule, il est nécessaire :<br/>
		- Soit d'avoir l'argent requis dans le compte en banque du personnage<br/>
		- Soit d'avoir le nombre de token requis<br/><br/>
		
		Une fois votre véhicule acheté, vous pourrez vous reconnectez et faire la commande <b>/v spawn</b>.
		<br/></br>
		Pour plus de sécurité, vos transactions sont enregistrées dans notre base de données.
		<br />
		</fieldset>
		<?php } ?>
		<div class="clear">&nbsp;</div>
	</div>
<?php
?>