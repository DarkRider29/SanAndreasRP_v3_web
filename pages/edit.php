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
		
		if(!isset($_SESSION['Error']))
			{$_SESSION['Error']=0;}
		
		$_SESSION['Refresh']=0;
		
		if(isset($_POST['email']))
		{
			if($dStats['Connected'] == 0)
			{
				$em1 = mysqli_real_escape_string($bdd,$_POST['email1']);
				$em2 = mysqli_real_escape_string($bdd,$_POST['email2']);
				
				if($em1 == $em2 && $em1 != "" && $em2 != "")
				{
					$req2 = mysqli_query($bdd,'SELECT COUNT(*) FROM lvrp_users WHERE Email="'.$em1.'"');
					$data2 = mysqli_fetch_row($req2);
					if($data2[0] >0)
						{$_SESSION['Error']=3; $_SESSION['Refresh']=1;header ('Location: index.php?p=edit');}
					else
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Email='".$em1."' WHERE id='".$_SESSION['id']."'");
						$_SESSION['Error']=2; $_SESSION['Refresh']=1;
						header ('Location: index.php?p=edit');
					}
				}
				else
					{$_SESSION['Error']=1; $_SESSION['Refresh']=1;header ('Location: index.php?p=edit');}
			}
		}
		if(isset($_POST['mdp']))
		{
			if($dStats['Connected'] == 0)
			{
				$mdp1 = mysqli_real_escape_string($bdd,$_POST['bpass']);
				$mdp2 = mysqli_real_escape_string($bdd,$_POST['pass1']);
				$mdp3 = mysqli_real_escape_string($bdd,$_POST['pass2']);
				
				if(sha1($mdp1) != $dStats['Pass'])
					{$_SESSION['Error']=4; $_SESSION['Refresh']=1;header ('Location: index.php?p=edit');}
				else
				{
					if($mdp2 == $mdp3 && $mdp2 != "" && $mdp3 != "")
					{
						mysqli_query($bdd,"UPDATE lvrp_users SET Pass='".sha1($mdp2)."' WHERE id='".$_SESSION['id']."'");
						$_SESSION['Error']=6; $_SESSION['Refresh']=1;
						header ('Location: index.php?p=edit');
					}
					else
						{$_SESSION['Error']=5; $_SESSION['Refresh']=1;header ('Location: index.php?p=edit');}
				}
			}
		}

?>
	<div class="top">Mon compte  »  Preferences</div>
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
			if($dStats['Connected'] == 1)
				{echo '<div class="box_warning"><center>Vous devez être déconnecté pour modifier votre compte !</center></div>';}
			if($_SESSION['Error'] != 0 && $_SESSION['Refresh']==0)
			{
				if($_SESSION['Error'] == 1)
					{echo '<div class="box_warning"><center>Les adresses email ne correspondent pas !</center></div>'; $_SESSION['Error']=0;}
				if($_SESSION['Error'] == 3)
					{echo '<div class="box_warning"><center>L\'adresse email est déjà utilisée !</center></div>'; $_SESSION['Error']=0;}
				if($_SESSION['Error'] == 4)
					{echo '<div class="box_warning"><center>L\'ancien mot de passe ne correspond pas !</center></div>'; $_SESSION['Error']=0;}
				if($_SESSION['Error'] == 5)
					{echo '<div class="box_warning"><center>Les nouveaux mots de passe de correspondent pas !</center></div>'; $_SESSION['Error']=0;}
				if($_SESSION['Error'] == 2)
					{echo '<div class="box_vert"><center>Vous avez bien changé votre adresse email.</center></div>'; $_SESSION['Error']=0;}
				if($_SESSION['Error'] == 6)
					{echo '<div class="box_vert"><center>Vous avez bien changé votre mot de passe.</center></div>'; $_SESSION['Error']=0;}
			}
		?>
		<form method="post" action="index.php?p=edit" name="email">
			<fieldset>
				<legend>Email</legend>
				<br/>
				<center><?php echo '<i><font color="orange">'.$dStats['Email'].'</font></i>'; ?></center>
				<br/>
				<center>
				Entrez votre nouvelle adresse :<br/>
				<input name="email1" size="32" maxlength="64" type="email" id="f1"/><br/><br/>
				Entrez votre nouvelle adresse (Encore) :<br/>
				<input name="email2" size="32" maxlength="64" type="email" id="f1"/><br/><br/>
				</center>
				<br/>
			<center><button class="buton_g" name="email" type="submit">Enregistrer</button></center>
			</fieldset>
		</form>
		<br/>
		<form method="post" action="index.php?p=edit" name="mdp">
			<fieldset>
				<legend>Mot de passe</legend>
				<br/>
				<center>
				Ancien mot de passe :<br/>
				<input name="bpass" size="32" maxlength="64" type="password" id="f1"/><br/><br/>
				Entrez votre nouveau mot de passe :<br/>
				<input name="pass1" size="32" maxlength="64" type="password" id="f1"/><br/><br/>
				Entrez votre nouveau mot de passe (Encore) :<br/>
				<input name="pass2" size="32" maxlength="64" type="password" id="f1"/><br/><br/>
				</center>
				<br/>
			<center><button class="buton_g" name="mdp" type="submit">Enregistrer</button></center>
			</fieldset>
		</form>
		<br/>
		<form method="post" action="index.php?p=edit" name="foru">
			<fieldset>
				<legend>Forum</legend>
				<br/>
				<center>
				Adresse email de votre comtpe forum :<br/>
				<input name="email1" size="32" maxlength="64" type="text" id="f1"/><br/><br/>
				Mot de passe de votre compte forum :<br/>
				<input name="pass" size="32" maxlength="32" type="password" id="f1"/><br/><br/>
				</center>
				<br/>
			<center><button class="buton_g" name="foru" type="submit">Lier</button></center>
			</fieldset>
		</form>

		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>