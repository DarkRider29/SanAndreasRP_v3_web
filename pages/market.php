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
		
		$succes=0;
		$error=0;
		$_SESSION['Refresh']=0;
		
		if(!isset($_SESSION['market']))
			{$_SESSION['market']=0;}
		
		if(isset($_POST['sell']))
		{
			if($dStats['Connected'] == 0 && isset($_POST['sell_type']) && isset($_POST['sell_price']))
			{
				$succes=true;
				$type = $_POST['sell_type'];
				$price = $_POST['sell_price'];
				
				if($price < 1000 || $price > 100000)
					{$succes=false; $_SESSION['market']=1; $_SESSION['Refresh']=1; echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';}
				
				if($type == 1 && $dStats['PointsRename'] <= 0 || $type == 2 && $dStats['ChangeNum'] <= 0 || $type == 3 && $dStats['ChangePlaque'] <= 0 || $type == 4 && $dStats['ChangeSex'] <= 0 || $type == 5 && $dStats['ChangeAge'] <= 0 || $type == 6 && $dStats['Tokens'] < 100)
					{$succes=false; $_SESSION['market']=2; $_SESSION['Refresh']=1; echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';}
				
				if($succes==true)
				{
					if($type == 1) 		{$requete="UPDATE lvrp_users SET PointsRename=PointsRename-1 WHERE id = '".$dStats['id']."'";}
					elseif($type == 2) 	{$requete="UPDATE lvrp_users SET ChangeNum=ChangeNum-1 WHERE id = '".$dStats['id']."'";}
					elseif($type == 3) 	{$requete="UPDATE lvrp_users SET ChangePlaque=ChangePlaque-1 WHERE id = '".$dStats['id']."'";}
					elseif($type == 4) 	{$requete="UPDATE lvrp_users SET ChangeSex=ChangeSex-1 WHERE id = '".$dStats['id']."'";}
					elseif($type == 5) 	{$requete="UPDATE lvrp_users SET ChangeAge=ChangeAge-1 WHERE id = '".$dStats['id']."'";}
					elseif($type == 6) 	{$requete="UPDATE lvrp_users SET Tokens=Tokens-100 WHERE id = '".$dStats['id']."'";}
					mysqli_query($bdd,$requete);
					$_SESSION['market']=3; $_SESSION['Refresh']=1;
					$ip = $_SERVER["REMOTE_ADDR"];
					mysqli_query($bdd,"INSERT INTO `lvrp_site_resale` SET SQLid='".$dStats['id']."', Type='".$type."', Price='".$price."', Date=UNIX_TIMESTAMP(), Ip='".$ip."'");
					echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';
				}
			}
		}
		
		if(!empty($_GET['type']))
		{
			if($_GET['type'] == "buy")
			{
				if(!empty($_GET['id']) && isConnected() && !isInGame())
				{
					$succes=true;
					$tmpId = mysqli_real_escape_string($bdd,$_GET['id']);
					$req2 = mysqli_query($bdd, 'SELECT * FROM lvrp_site_resale WHERE id = '.$tmpId.'');
					$response = mysqli_fetch_array($req2);
					$price = $response['Price'];
					if($dStats['Bank'] < $price)
						{$succes=false; $_SESSION['market']=6; $_SESSION['Refresh']=1; echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';}

					if($succes == true)
					{
						$cash=$dStats['Bank']-$response['Price'];
						$type = $response['Type'];
						if($type == 1) 		{$requete="UPDATE lvrp_users SET PointsRename=PointsRename+1, Bank='".$cash."' WHERE id = '".$dStats['id']."'";}
						elseif($type == 2) 	{$requete="UPDATE lvrp_users SET ChangeNum=ChangeNum+1, Bank='".$cash."' WHERE id = '".$dStats['id']."'";}
						elseif($type == 3) 	{$requete="UPDATE lvrp_users SET ChangePlaque=ChangePlaque+1, Bank='".$cash."' WHERE id = '".$dStats['id']."'";}
						elseif($type == 4) 	{$requete="UPDATE lvrp_users SET ChangeSex=ChangeSex+1, Bank='".$cash."' WHERE id = '".$dStats['id']."'";}
						elseif($type == 5) 	{$requete="UPDATE lvrp_users SET ChangeAge=ChangeAge+1, Bank='".$cash."' WHERE id = '".$dStats['id']."'";}
						elseif($type == 6) 	{$requete="UPDATE lvrp_users SET Tokens=Tokens+100, Bank='".$cash."' WHERE id = '".$dStats['id']."'";}
						mysqli_query($bdd,$requete);
						$_SESSION['market']=7; $_SESSION['Refresh']=1;
						mysqli_query($bdd,"UPDATE lvrp_users SET Cagnotte=Cagnotte+".$response['Price']." WHERE id = '".$response['SQLid']."'");
						mysqli_query($bdd,"DELETE FROM lvrp_site_resale WHERE id = '".$tmpId."'");
						echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';
					}
				}
			}
			if($_GET['type'] == "delete")
			{
				if(!empty($_GET['id']) && isConnected() && !isInGame())
				{
					$succes=true;
					$tmpId = mysqli_real_escape_string($bdd,$_GET['id']);
					$req2 = mysqli_query($bdd, 'SELECT * FROM lvrp_site_resale WHERE id = '.$tmpId.'');
					$response = mysqli_fetch_array($req2);
					if($response['SQLid'] != $dStats['id'] && $dStats['AdminLevel'] < 4)
						{$succes=false; $_SESSION['market']=4; $_SESSION['Refresh']=1; echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';}
					
					if($succes == true)
					{
						$type = $response['Type'];
						if($type == 1) 		{$requete="UPDATE lvrp_users SET PointsRename=PointsRename+1 WHERE id = '".$response['SQLid']."'";}
						elseif($type == 2) 	{$requete="UPDATE lvrp_users SET ChangeNum=ChangeNum+1 WHERE id = '".$response['SQLid']."'";}
						elseif($type == 3) 	{$requete="UPDATE lvrp_users SET ChangePlaque=ChangePlaque+1 WHERE id = '".$response['SQLid']."'";}
						elseif($type == 4) 	{$requete="UPDATE lvrp_users SET ChangeSex=ChangeSex+1 WHERE id = '".$response['SQLid']."'";}
						elseif($type == 5) 	{$requete="UPDATE lvrp_users SET ChangeAge=ChangeAge+1 WHERE id = '".$response['SQLid']."'";}
						elseif($type == 6) 	{$requete="UPDATE lvrp_users SET Tokens=Tokens+100 WHERE id = '".$response['SQLid']."'";}
						mysqli_query($bdd,$requete);
						$_SESSION['market']=5; $_SESSION['Refresh']=1;
						mysqli_query($bdd,"DELETE FROM lvrp_site_resale WHERE id = '".$tmpId."'");
						echo '<meta http-equiv="refresh" content="0; URL=index.php?p=market">';
					}
					
				}
			}
		}
		
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
?>
	<div class="top">Boutique  »  marche</div>
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
				{echo '<div class="box_warning"><center>Vous devez être déconnecté du serveur pour effectuer un achat ou une vente !</center></div>';}
			if($_SESSION['market'] != 0 && $_SESSION['Refresh']==0)
			{
				if($_SESSION['market'] == 1)
					{echo '<div class="box_warning"><center>Le prix doit être compris entre 1000$ et 100 000$ !</center></div>'; $_SESSION['market']=0;}
				if($_SESSION['market'] == 2)
					{echo '<div class="box_warning"><center>Vous n\'en disposez pas assez pour en vendre !</center></div>'; $_SESSION['market']=0;}
				if($_SESSION['market'] == 3)
					{echo '<div class="box_vert"><center>Vous avez bien posté votre annonce.</center></div>'; $_SESSION['market']=0;}
				if($_SESSION['market'] == 4)
					{echo '<div class="box_warning"><center>Cette annonce ne vous appartient pas !</center></div>'; $_SESSION['market']=0;}
				if($_SESSION['market'] == 5)
					{echo '<div class="box_vert"><center>Vous avez supprimé votre annonce.</center></div>'; $_SESSION['market']=0;}
				if($_SESSION['market'] == 6)
					{echo '<div class="box_warning"><center>Vous ne disposez pas d\'assez d\'argent dans votre compte en banque !</center></div>'; $_SESSION['market']=0;}
				if($_SESSION['market'] == 7)
					{echo '<div class="box_vert"><center>Vous avez acheté cet avantage/tokens.</center></div>'; $_SESSION['market']=0;}
			}
		?>
		<center>
		<br/>
		Bienvenue sur le marché de SARP,<br/>
		C'est ici que vous pouvez vendre ou acheter des tokens ou avantages contre de l'argent IG.
		<br/><br/>
		<div class="box_warning"><center>Nous ne sommes pas responsable de vos erreurs d'achats ou de reventes !</center></div>
		<br/>
		</center>
		<fieldset>
			<legend>Revente</legend>
			<form name="sell" method="post" action="index.php?p=market">
			<?php
				if($dStats['Cagnotte'] > 0)
					{ echo '<div class="box_vert"><center>Vous avez '.$dStats['Cagnotte'].' $ de vente, <b>/cagnotte</b> IG pour les récupérer.</center></div>';}
			
				if($dStats['PointsRename'] > 0)
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sell_type" value="1"/> 1 Rename<br/>';}
				else
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="sell_type" value="1"/> 1 Rename<br/>';}
				if($dStats['ChangeNum'] > 0)
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sell_type" value="2"/> 1 Changement de numéro personalisé <br/>';}
				else
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="sell_type" value="2"/> 1 Changement de numéro personalisé<br/>';}
				if($dStats['ChangePlaque'] > 0)
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sell_type" value="3"/> 1 Changement de plaque <br/>';}
				else
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="sell_type" value="3"/> 1 Changement de plaque<br/>';}
				if($dStats['ChangeSex'] > 0)
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sell_type" value="4"/> 1 Changement de sexe <br/>';}
				else
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="sell_type" value="4"/> 1 Changement de sexe<br/>';}
				if($dStats['ChangeAge'] > 0)
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sell_type" value="5"/> 1 Changement de d\'âge<br/>';}
				else
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="sell_type" value="5"/> 1 Changement de d\'âge<br/>';}
				if($dStats['Tokens'] > 99)
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sell_type" value="6"/> 100 Tokens<br/>';}
				else
					{echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="sell_type" value="6"/> 100 Tokens<br/>';}
			
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prix de revente (en $) :&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" min="1000" max="100000" name="sell_price"/>';
			?>
			<br/><br/>
			<?php if($dStats['Connected'] == 0) { ?>
			<center><button class="buton_g"  name="sell" value="Valider" type="submit">Valider</button><center>
			<?php } else { ?>
			<center><button disabled class="buton_g"  name="sell" value="Valider" type="submit">Valider</button>
			<br/><i><font color="red">Impossible en étant connecté sur le serveur.</font></i><center>
			<?php } ?>
			</form>
		</fieldset>
		<br/><br/>
		<div class="box_orange"><center>Vous disposez de <b>
		<?php 
			echo $dStats['Bank']
		?></b> $ sur votre compte en banque.</center></div>
		<center>
		<?php
			$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_site_resale ORDER BY Type DESC');
			while ($donnees = mysqli_fetch_assoc($req2))
			{
				if($donnees['Price'] <= 0 || $donnees['SQLid'] == -1) continue;
				echo '<div class="sellbox">';
					
				if($donnees['SQLid'] == $dStats['id'] || $dStats['AdminLevel'] > 3)
				{
					echo '<a href="index.php?p=market&amp;type=delete&amp;id='.$donnees['id'].'">
					<div id="Layer2" style="position:absolute; width:16px; height:16px; z-index:2"><img style="border: 0; overflow: auto; height:16px; width: 16px;\');" src="./images/croix.png" alt="Supprimer"></div></a>
					';
				}
				
				$tmp = mysqli_query($bdd,"SELECT Name FROM lvrp_users WHERE id='".$donnees['SQLid']."'");
				$row = mysqli_fetch_row($tmp);
				
				if($donnees['Type'] == 1)
				{
					echo '<img style="border: 0; overflow: auto; height:135px; width: 166px;\');" src="./images/rename.png">
					<center><h3>1 rename</h3></center>
					&nbsp;&nbsp;&nbsp;Par : '.$row[0].'<br/>
					&nbsp;&nbsp;&nbsp;Prix : '.$donnees['Price'].' $ <br/>
					';
				}
				elseif($donnees['Type'] == 2)
				{
					echo '<img style="border: 0; overflow: auto; height:135px; width: 166px;\');" src="./images/changenum.png">
					<center><h3>1 changeNum</h3></center>
					&nbsp;&nbsp;&nbsp;Par : '.$row[0].'<br/>
					&nbsp;&nbsp;&nbsp;Prix : '.$donnees['Price'].' $ <br/>
					';
				}
				elseif($donnees['Type'] == 3)
				{
					echo '<img style="border: 0; overflow: auto; height:135px; width: 166px;\');" src="./images/changeplaque.png">
					<center><h3>1 changePlaque</h3></center>
					&nbsp;&nbsp;&nbsp;Par : '.$row[0].'<br/>
					&nbsp;&nbsp;&nbsp;Prix : '.$donnees['Price'].' $ <br/>
					';
				}
				elseif($donnees['Type'] == 4)
				{
					echo '<img style="border: 0; overflow: auto; height:135px; width: 166px;\');" src="./images/changesex.png">
					<center><h3>1 changeSexe</h3></center>
					&nbsp;&nbsp;&nbsp;Par : '.$row[0].'<br/>
					&nbsp;&nbsp;&nbsp;Prix : '.$donnees['Price'].' $ <br/>
					';
				}
				elseif($donnees['Type'] == 5)
				{
					echo '<img style="border: 0; overflow: auto; height:135px; width: 166px;\');" src="./images/changeage.png">
					<center><h3>1 changeAge</h3></center>
					&nbsp;&nbsp;&nbsp;Par : '.$row[0].'<br/>
					&nbsp;&nbsp;&nbsp;Prix : '.$donnees['Price'].' $ <br/>
					';
				}
				elseif($donnees['Type'] == 6)
				{
					echo '<img style="border: 0; overflow: auto; height:135px; width: 166px;\');" src="./images/token.png">
					<center><h3>100 tokens</h3></center>
					&nbsp;&nbsp;&nbsp;Par : '.$row[0].'<br/>
					&nbsp;&nbsp;&nbsp;Prix : '.$donnees['Price'].' $ <br/>
					';
				}
				echo '
				<p>
					<center><a a href="#?w=500" rel="popup_'.$donnees['id'].'" class="poplight buton_g">Acheter</a></center></p>
					<div id="popup_'.$donnees['id'].'" class="popup_block">
						<center>Souhaitez-vous vraiment l\'acheter ?<br/>
						<a class="buton_g" href="index.php?p=market&amp;type=buy&amp;id='.$donnees['id'].'">Oui</a> <a class="buton_g close" href="#">Non</a></center>
					</div>
				';
				echo '</div>';
			}
		?>
		</center>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>