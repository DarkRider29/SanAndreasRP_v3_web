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
		
		$leader = $dStats['Leader'];
		if($leader == $dStats['Member']){ $leader = 'Oui'; } 
		else { $leader = 'Non'; }
		
		if($dStats['Leader'] != 0)
		{
			if(isset($_GET['sup_id']))
			{
				$req = mysqli_query($bdd,"SELECT * FROM `lvrp_users` WHERE `id`='".$_GET['sup_id']."'");
				$row = mysqli_fetch_array($req);
				if($row['Member'] == $dStats['Leader'] && $row['Connected'] == 0 && $_GET['sup_id'] != $dStats['id'])
				{
					mysqli_query($bdd,"UPDATE `lvrp_users` SET Member=0, Rank=0, Leader=0 WHERE `id` = '".$_GET['sup_id']."'");
					echo"
				<script type='text/javascript'>
				window.location.replace('index.php?p=faction');
				</script>
				";
				}
				else
				{
					echo"
				<script type='text/javascript'>
				window.location.replace('index.php?p=faction');
				</script>
				";
				}
			}
		}
		if(isset($_POST['ok']))
		{
			$name = $dStats['Name'];
			$rank1 = mysqli_real_escape_string($bdd,$_POST['rank1']);
			$rank2 = mysqli_real_escape_string($bdd,$_POST['rank2']);
			$rank3 = mysqli_real_escape_string($bdd,$_POST['rank3']);
			$rank4 = mysqli_real_escape_string($bdd,$_POST['rank4']);
			$rank5 = mysqli_real_escape_string($bdd,$_POST['rank5']);
			$rank6 = mysqli_real_escape_string($bdd,$_POST['rank6']);
			if($dStats['Leader']>=1 && $dStats['Leader'] <= 4)
				{mysqli_query($bdd,"UPDATE `lvrp_factions_polices` SET Rank1='".$rank1."', Rank2='".$rank2."', Rank3='".$rank3."', Rank4='".$rank4."', Rank5='".$rank5."', Rank6='".$rank6."', Skin1='".$_POST['skin1']."', Skin2='".$_POST['skin2']."', Skin3='".$_POST['skin3']."', Skin4='".$_POST['skin4']."',Skin5='".$_POST['skin5']."', Skin6='".$_POST['skin6']."', EditedBySite=1 WHERE id='".$dStats['Leader']."'");}
			elseif($dStats['Leader']==5)
				{mysqli_query($bdd,"UPDATE `lvrp_factions_fbi` SET Rank1='".$rank1."', Rank2='".$rank2."', Rank3='".$rank3."', Rank4='".$rank4."', Rank5='".$rank5."', Rank6='".$rank6."', Skin1='".$_POST['skin1']."', Skin2='".$_POST['skin2']."', Skin3='".$_POST['skin3']."', Skin4='".$_POST['skin4']."',Skin5='".$_POST['skin5']."', Skin6='".$_POST['skin6']."' EditedBySite=1 WHERE id=1");}
			elseif($dStats['Leader']>=6 && $dStats['Leader']<= 9)
				{$iddd =$dStats['Leader']-5; mysqli_query($bdd,"UPDATE `lvrp_factions_governements` SET rank1='".$rank1."', rank2='".$rank2."', rank3='".$rank3."', rank4='".$rank4."', rank5='".$rank5."', rank6='".$rank6."', skin1='".$_POST['skin1']."', skin2='".$_POST['skin2']."', skin3='".$_POST['skin3']."', skin4='".$_POST['skin4']."',skin5='".$_POST['skin5']."', skin6='".$_POST['skin6']."', EditedBySite=1 WHERE id='".$iddd."'");}
			
		}
		if(isset($_POST['ok2']))
		{
			if(isset($_GET['edit_id']))
			{
				mysqli_query($bdd,"UPDATE `lvrp_users` SET Rank='".$_POST['rank']."' WHERE id='".$_GET['edit_id']."'");
				echo"
				<script type='text/javascript'>
				window.location.replace('index.php?p=faction');
				</script>
				";
			}
		}

?>
	<div class="top">Mon compte  »  Mon personnage</div>
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
		<?php if($dStats['Member'] > 0) {?>
		<fieldset>
		<?php
			if($dStats['Member'] >= 1 && $dStats['Member'] <= 4)
				{echo '<center><img src="./images/sapd.png"></center>';}
			elseif($dStats['Member'] == 5)
				{echo '<center><img src="./images/fbi.png"></center>';}
			if($dStats['Member'] >= 6 && $dStats['Member'] <=9 )
				{echo '<center><img src="./images/governement.png"></center>';}
		?>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Ma faction</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>Nom :</b> ' . getFactionName($dStats['Member']) .'</li>
					<li><b>Rang :</b> ' . getFactionRank($dStats['Member'],$dStats['Rank']) .'</li>
					<li><b>Leader :</b> ' . $leader .'</li>
					<li><b>Temps de travail :</b> ' . $dStats['DutyTime'] .' minute(s)</li>'; ?>
                </ul>
            </td>
		</table>
		<h3>Membres actuelles</h3>

	<table class="zebra" cellspacing="0" cellpadding="0">
				<thead>
			<tr>
				<th class="center">PRénom_Nom</th>
				<th class="center">Rang</th>
				<th class="center">Dernière connexion</th>
				<?php
				if($dStats['Leader'] != 0)
				{?>
				<th class="center">Changer le rang</th>
				<th class="center">Virer</th>
				<?php }?>
			</tr>
		</thead>

		<?php

		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE Member="'.$dStats['Member'].'" ORDER BY Rank DESC');
		while ($donnees = mysqli_fetch_assoc($req))
					{
				?>


				<tr><td>
				<?php 
						if($donnees['Connected'] ==1)
						{
							echo '<center>'.$donnees['Name'].'</center></td></td><td><center>'.getFactionRank($donnees['Member'],$donnees['Rank']).'</center></td><td><center> '.date("d-m-Y",$donnees['LastLog']).'</center></td>';
							
							if($dStats['Leader'] != 0) echo '<td><center><a>Joueur IG</a></center></td><td><a><center>Joueur IG</a></center></td>';
						}
						else
						{
							echo '<center>'.$donnees['Name'].'</center></td></td><td><center>'.getFactionRank($donnees['Member'],$donnees['Rank']).'</center></td><td><center> '.date("d-m-Y",$donnees['LastLog']).'</center></td>';
							if($dStats['Leader'] != 0)
							{						
								echo '<td><center>
								
								<form method="post" action="index.php?p=faction&amp;edit_id='.$donnees['id'].'" name="ok2" class="box style">
								
										<center><input name="rank" maxlength="1" type="text" size="1" value="'.$donnees['Rank'].'" id="f1"/>
									<button name="ok2" type="submit">Ok</button></center>
								</center>
									</form>
								

								</center></td>';
								echo '<td><center><a href="index.php?p=faction&amp;sup_id='.$donnees['id'].'"><img src=images/croix.png></a></center></td>';
							}
						}
					}
				
				?>	
			</tr></table>
			<?php
				if($dStats['Leader'] != 0)
				{?>			
	<h3>Gestion des rangs</h3>
				
			<form method="post" action="index.php?p=faction" name="ok" class="box style">
	<fieldset>
			<legend>Rangs</legend>
			<div><label>Rang 1 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="rank1" maxlength="32" type="text" value="<?php echo getFactionRank($dStats['Member'],1); ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label> <input name="skin1" type="text" maxlength="3" value="<?php echo getFactionSkin($dStats['Member'],1); ?>" id="f1"/></div><br/>
			<div><label>Rang 2 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="rank2" maxlength="32" type="text" value="<?php echo getFactionRank($dStats['Member'],2); ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label> <input name="skin2" type="text" maxlength="3" value="<?php echo getFactionSkin($dStats['Member'],2); ?>" id="f1"/></div><br/>
			<div><label>Rang 3 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="rank3" maxlength="32" type="text" value="<?php echo getFactionRank($dStats['Member'],3); ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label> <input name="skin3" type="text" maxlength="3" value="<?php echo getFactionSkin($dStats['Member'],3); ?>" id="f1"/></div><br/>
			<div><label>Rang 4 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="rank4" maxlength="32" type="text" value="<?php echo getFactionRank($dStats['Member'],4); ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label> <input name="skin4" type="text" maxlength="3" value="<?php echo getFactionSkin($dStats['Member'],4); ?>" id="f1"/></div><br/>
			<div><label>Rang 5 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="rank5" maxlength="32" type="text" value="<?php echo getFactionRank($dStats['Member'],5); ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label> <input name="skin5" type="text" maxlength="3" value="<?php echo getFactionSkin($dStats['Member'],5); ?>" id="f1"/></div><br/>
			<div><label>Rang 6 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="rank6" maxlength="32" type="text" value="<?php echo getFactionRank($dStats['Member'],6); ?>" id="f1"/> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</label> <input name="skin6" type="text" maxlength="3" value="<?php echo getFactionSkin($dStats['Member'],6); ?>" id="f1"/></div><br/>
		<center><button class="buton_g" name="ok" type="submit">Enregistrer</button></center>
	</center>
		</fieldset></form><?php } ?>
		</fieldset>
		<br/>
		<?php } else {?>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Ma faction</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>Vous ne faîtes parti d'aucune faction.</b></li>
                </ul>
            </td>
		</table>
		<br/>
		<?php }
		if($dStats['Job'] != 0)
		{?>
			<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mon Job</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>Nom :</b> ' . getJobName($dStats['Job']) .'</li>
					<li><b>Level :</b> ' . $dStats['JobLvl'].'</li>
					<li><b>Expérience :</b> ' . $dStats['JobExp'] .'</li>
					<li><b>Bonus :</b> ' . $dStats['JobBonnus'] .' $</li>
					<li><b>Temps de travail :</b> ' . $dStats['JobTime'] .' minute(s)</li>'; ?>
                </ul>
            </td>
		</table>
		<?php
		}
		else
		{?>
			<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mon Job</b></font></td></tr>
			<td align="left" valign="middle">
				<ul>
					<li><b>Vous ne faîtes parti d'aucun job.</b></li>
                </ul>
            </td>
		</table>
		
		<?php
		}
		?>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>