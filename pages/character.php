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
		
		if ($dStats['Sex'] == 1){ $dStats['Sex'] = 'Homme'; } else { $dStats['Sex'] = 'Femme'; }
		$respectMax=$dStats['Level']*4;
		
		$phone = $dStats['PhoneNr'];
		if ($phone == 0){ $phone = 'Aucun'; }
		
		if($dStats['CarLic'] == '0') $dStats['CarLic'] = 'Non acquis';
		elseif($dStats['CarLic'] == '1') $dStats['CarLic'] = 'Acquis';
			
		if($dStats['FlyLic'] == '0') $dStats['FlyLic'] = 'Non acquis';
		elseif($dStats['FlyLic'] == '1') $dStats['FlyLic'] = 'Acquis';
			
		if($dStats['BoatLic'] == '0') $dStats['BoatLic'] = 'Non acquis';
		elseif($dStats['BoatLic'] == '1') $dStats['BoatLic'] = 'Acquis';
			
		if($dStats['MotoLic'] == '0') $dStats['MotoLic'] = 'Non acquis';
		elseif($dStats['MotoLic'] == '1') $dStats['MotoLic'] = 'Acquis';
			
		if($dStats['LourdLic'] == '0') $dStats['LourdLic'] = 'Non acquis';
		elseif($dStats['LourdLic'] == '1') $dStats['LourdLic'] = 'Acquis';
			
		if($dStats['FishLic'] == '0') $dStats['FishLic'] = 'Non acquis';
		elseif($dStats['FishLic'] == '1') $dStats['FishLic'] = 'Acquis';
			
		if($dStats['TrainLic'] == '0') $dStats['TrainLic'] = 'Non acquis';
		elseif($dStats['TrainLic'] == '1') $dStats['TrainLic'] = 'Acquis';
		
		if($dStats['Married'] != 0)
		{
			$req2 = mysqli_query($bdd,'SELECT Name FROM lvrp_users WHERE id = '.$dStats['MarriedTo'].'');
			$name = mysqli_fetch_row($req2);
			$dStats['MarriedTo']=$name[0];
		}
		else
			{$dStats['MarriedTo']="Personne";}

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
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mon personnage</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>Identité :</b> ' . $dStats['Name'] .'</li>
					<li><b>Sexe :</b> ' . $dStats['Sex'] .'</li>
					<li><b>Age :</b> ' . $dStats['Age'] .' ans</li>
					<li><b>Origine :</b> ' . getOriginName($dStats['Origin']) .'</li>
					<li><b>Marrié à :</b> ' . $dStats['MarriedTo'] .'</li>
					<li><b>Cash :</b> ' . $dStats['Cash'] .' $</li>
					<li><b>Banque :</b> ' . $dStats['Bank'] .' $</li>
					<li><b>Level :</b> ' . $dStats['Level'] .'</li>
					<li><b>Respect :</b> ' . $dStats['Respect'] .'/' . $respectMax .'</li>
					<li><b>Ville :</b> ' . getCityName($dStats['City']) .'</li>
					<li><b>Numéro de téléphone :</b> ' . $phone .'</li>
					<li><b>Seconde langue :</b> ' . getLangName($dStats['Lang1']) .'</li>
					<li><b>Troisième langue :</b> ' . getLangName($dStats['Lang2']) .'</li>
					<li><b>Style de combat :</b> ' . getStyleCombat($dStats['CombatStyle']) .'</li>
					<li><b>Faim :</b> ' . $dStats['Faim'] .'%</li>
					<li><b>Soif :</b> ' . $dStats['Soif'] .'%</li>'; ?>
                </ul>
				<td align="right" valign="middle" style="padding:5px;">
                <img style="border: 0; overflow: auto; max-width: 100px; width: expression(this.scrollWidth >= 100? \'100px\' : \'auto\');" src="<?php echo'images/skins/'.$dStats['Skin'].'.jpg'; ?>" alt="" />
                </td>
            </td>
		</table>
		<br/>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Mes permis</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php echo'
					<li><b>Permis conduire :</b> ' . $dStats['CarLic'] .'</li>
					<li><b>Permis de vol :</b> ' . $dStats['FlyLic'] . '</li>
					<li><b>Permis de navigation :</b> ' . $dStats['BoatLic'] . '</li>
					<li><b>Permis moto : </b> ' . $dStats['MotoLic'] . '</li>
					<li><b>Permis poids lourd : </b> ' . $dStats['LourdLic'] . '</li>
					<li><b>Permis de pêche : </b> ' . $dStats['FishLic'] . '</li>
					<li><b>Permis de train : </b> ' . $dStats['TrainLic'] . '</li>'; ?>
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