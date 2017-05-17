<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(!isConnected())
	{
		$_SESSION['Refresh']=0;
		if(!isset($_SESSION['ErrorReg']))
			{$_SESSION['ErrorReg']=0;}
		if(!isset($_SESSION['register']) || $_SESSION['register'] == 0)
		{
			echo '<div class="top">Inscription  »  Etape 1</div>
	<div class="contain">';
			if(isset($_POST['register1']))
			{
				$champs=0;
				for($i=1; $i<16; $i++)
				{
					if(!isset($_POST['id_'.$i.'']))
						{$champs++;}
				}
				if($champs == 0)
				{
					$total=0;
					$req=mysqli_query($bdd,'SELECT * FROM lvrp_server_questions ORDER BY id');
					while ($donnees = mysqli_fetch_assoc($req))
					{
						if($_POST['id_'.$donnees['id'].''] == $donnees['reponseJuste'])
							{$total++;}
					}
					if($total == 15)
						{$_SESSION['register'] = 1;}
					else
					{
						$_SESSION['ErrorReg']=1;
						$_SESSION['Refresh']=1;
					}
				}
				else
					{$_SESSION['ErrorReg']=2; $_SESSION['Refresh']=1;}
				echo '<meta http-equiv="refresh" content="0; URL=index.php?p=register">';
			}
	?>
		<?php 
			if($_SESSION['ErrorReg'] != 0 && $_SESSION['Refresh']==0)
			{
				if($_SESSION['ErrorReg'] == 1)
					{echo '<div class="box_warning"><center>Vous avez fait des erreurs, recommencez !</center></div>'; $_SESSION['ErrorReg']=0;}
				if($_SESSION['ErrorReg'] == 2)
					{echo '<div class="box_warning"><center>Répondez à toutes les questions !</center></div>'; $_SESSION['ErrorReg']=0;}
			}
		?>
		<form name="register" method="post" action="index.php?p=register">
		<fieldset><div class="inscr">
		<?php
		$req=mysqli_query($bdd,'SELECT * FROM lvrp_server_questions ORDER BY id');
		while ($donnees = mysqli_fetch_assoc($req))
		{ ?>
		
			
				<?php echo '<b>Question '.$donnees['id'].'</b> - '.$donnees['question'].'';?><br/>
				<input type="radio" name="<?php echo 'id_'.$donnees['id'].''; ?>" value="1"/><?php echo ' '.$donnees['R1'].'';?><br/>
				<input type="radio" name="<?php echo 'id_'.$donnees['id'].''; ?>" value="2"/><?php echo ' '.$donnees['R2'].'';?><br/>
				<input type="radio" name="<?php echo 'id_'.$donnees['id'].''; ?>" value="3"/><?php echo ' '.$donnees['R3'].'';?><br/>
				<br/>
		
		<?php } ?>
		</div></fieldset>
		<br/>
		<center><button class="buton_g"  name="register1" value="Valider" type="submit">Valider</button><center>
		</form>
		<div class="clear">&nbsp;</div>
	</div>
<?php
		}
		elseif($_SESSION['register'] == 1)
		{
			echo '<div class="top">Inscription  »  Etape 2</div>
			<div class="contain">';
			if(isset($_POST['register2']))
			{
				$motivation=mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['motivation'])));
				$experiencez=mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['experience'])));
				$antecedentz=mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['antecedent'])));
				$storyz=		mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['story'])));
				$projet=	mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['projet'])));
				$email=		mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['mail'])));
				$email2=		mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['mail2'])));
				$namez=mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['name'])));
				$pass1z=mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['pass'])));
				$pass2z=mysqli_real_escape_string($bdd,htmlspecialchars(trim($_POST['pass2'])));
				if(!isset($_POST['sex']))
					{$sexz=1;}
				else
					{$sexz=$_POST['sex'];}
				$originez=$_POST['origine'];
				$agez=$_POST['age'];
				$skinz=$_POST['skin'];
				$languesecz = $_POST['languesec'];
				$cityz=	$_POST['city'];
				
				if($motivation=="" || $experiencez=="" || $antecedentz=="" || $storyz=="" || $email=="" || $email2=="" || $namez=="" || $pass1z=="" || $pass2z=="" || $sexz=="" || $originez=="" || $agez=="" || $skinz=="" || $languesecz=="" || $cityz=="")
					{$_SESSION['ErrorReg']=2; /*$_SESSION['Refresh']=1; header ('Location: index.php?p=register');*/}
				else
				{
					$good=true;
					$req2 = mysqli_query($bdd,'SELECT COUNT(*) FROM lvrp_users WHERE Email="'.$email.'"');
					$data2 = mysqli_fetch_row($req2);
					if($data2[0] >0)
						{$good=false;}
						
					$req3 = mysqli_query($bdd,'SELECT COUNT(*) FROM lvrp_site_insriptions WHERE email="'.$email.'" ORDER DESC');
					$data3 = mysqli_fetch_row($req3);
					if($data3[0] >0)
						{$good=false;}
						
					$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE Name="'.$namez.'"') or die(mysqli_error());
					$data2 = mysqli_fetch_array($req2);
					
					if($data2['Name'] == $namez)
						{$good=false; echo '<div class="box_warning"><center>Cet nom est déjà utilisé !</center></div>';}
						
					$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_site_insriptions WHERE name="'.$namez.'"') or die(mysqli_error());
					$data2 = mysqli_fetch_array($req2);
					
					if($data2['name'] == $namez)
						{$good=false; echo '<div class="box_warning"><center>Cet nom est déjà utilisé !</center></div>';}
						
					if($pass1z != $pass2z)
						{$good=false; echo '<div class="box_warning"><center>Les mots de passe ne correspondent pas !</center></div>';}
						
					if($agez < 16 || $agez>70)
						{$good=false; echo '<div class="box_warning"><center>L\'âge doit être compris entre 16 et 70 ans !</center></div>';}
					
					if($skinz < 1 || $skinz>299)
						{$good=false; echo '<div class="box_warning"><center>L\'ID du skin doit être compris entre 1 et 299 !</center></div>';}

					if($good==true)
					{
						$requete="INSERT INTO lvrp_site_insriptions (id,motivation,experience,antecedent,story,projet,email,name,pass,sex,origin,age,skin,lang,city,ip,dateTime) VALUES ('','".$motivation."','".$experiencez."','".$antecedentz."','".$storyz."','".$projet."','".$email."','".$namez."','".$pass1z."','".$sexz."','".$originez."','".$agez."','".$skinz."','".$languesecz."','".$cityz."','".$_SERVER["REMOTE_ADDR"]."',UNIX_TIMESTAMP())";
						//echo $requete;
						mysqli_query($bdd,$requete)or die(mysqli_error());
						$_SESSION['register_SQLID']=mysqli_insert_id($bdd);
						$_SESSION['register']=4;
						echo '<meta http-equiv="refresh" content="0; URL=index.php?p=register">';
					}
					else
						{$_SESSION['ErrorReg']=3; /*$_SESSION['Refresh']=1; header ('Location: index.php?p=register');*/}
				}
			}
		?>
			<?php 
			if($_SESSION['ErrorReg'] != 0 )
			{
				if($_SESSION['ErrorReg'] == 2)
					{echo '<div class="box_warning"><center>Remplissez tous les champs obligatoires !</center></div>'; $_SESSION['ErrorReg']=0;}
				if($_SESSION['ErrorReg'] == 3)
					{echo '<div class="box_warning"><center>Cet email est déjà utilisé !</center></div>'; $_SESSION['ErrorReg']=0;}
			}
		?>
			<fieldset>
				<legend>Inscription au serveur</legend>
				<form name="register" method="post" action="index.php?p=register" class="box style">
				<center>
				<b>Ecrivez votre motivation à nous rejoindre :</b><br/><br/>
				<?php 
					if(isset($_POST['motivation']))
						{echo '<textarea name="motivation" rows="6" cols="80">'.$_POST['motivation'].'</textarea>';}
					else
						{echo '<textarea name="motivation" rows="6" cols="80"></textarea>';}
				?>
				<br/><br/>
				<b>Ecrivez votre expérience dans le RolePlay :</b><br/><br/>
				<?php 
					if(isset($_POST['experience']))
						{echo '<textarea name="experience" rows="6" cols="80">'.$_POST['experience'].'</textarea>';}
					else
						{echo '<textarea name="experience" rows="6" cols="80"></textarea>';}
				?>
				<br/><br/>
				<b>Ecrivez le(s) nom(s) de votre/vos précédent(s) serveur(s) :</b><br/><br/>
				<?php 
					if(isset($_POST['antecedent']))
						{echo '<textarea name="antecedent" rows="6" cols="80">'.$_POST['antecedent'].'</textarea>';}
					else
						{echo '<textarea name="antecedent" rows="6" cols="80"></textarea>';}
				?>
				<br/><br/>
				<b>Ecrivez l'histoire de votre personnage :</b><br/><br/>
				<?php 
					if(isset($_POST['story']))
						{echo '<textarea name="story" rows="6" cols="80">'.$_POST['story'].'</textarea>';}
					else
						{echo '<textarea name="story" rows="6" cols="80"></textarea>';}
				?>
				<br/><br/>
				<b>Ecrivez vos projets sur le serveur (falcutatif) :</b><br/><br/>
				<?php 
					if(isset($_POST['projet']))
						{echo '<textarea name="projet" rows="6" cols="80">'.$_POST['projet'].'</textarea>';}
					else
						{echo '<textarea name="projet" rows="6" cols="80"></textarea>';}
				?>
				<br/><br/>
				<b>Informations compte et personnage :</b><br/><br/>
				</center>
				<br/><br/>
				<div class="inscr">
					<label>Prénom_Nom : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="name" type="text" maxlength="30" placeholder="Prénom_Nom" id="f1"/><br/><br/>
					<label>Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="mail" maxlength="64" type="email" placeholder="Adresse Email" id="f1"/><br/><br/>
					<label>Email (Encore) : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="mail2" maxlength="64" type="email" placeholder="Adresse Email (confirm)" id="f1"/><br/><br/>
					<label>Mot de passe : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input name="pass" type="password" maxlength="32" placeholder="Mot de passe" id="f1"/></br><br/>
					<label>Mot de passe (Encore) : &nbsp;&nbsp;</label> <input name="pass2" type="password" maxlength="32" placeholder="Mot de passe (confirm)" id="f1"/></br><br/>
					
					<label>Sexe :</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M<input id="inputtext1" name="sex" value="1" type="radio"/>

				F<input id="inputtext1" name="sex" value="2" type="radio" />
					</br><br/>
						<label>Age :</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="age" type="number" maxlength="2" placeholder="Age" id="f1"/>
						</br><br/>
						<label>Skin (<a href="http://wiki.sa-mp.com/wiki/Skins:All" TARGET="_blank">Liste</a>) :</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="skin" type="number" maxlength="3" placeholder="Skin ID" id="f1"/>
				</br><br/>
				<label>Origine :</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="origine">
							<option value="1">Vice City</option>	
							<option value="2">Liberty City</option>
							<option value="3">Chinatown</option>
				</select></br><br/>

				<label>Langue secondaire :</label> 

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="languesec">

							<option value="1">Japonais</option>
							<option value="2">Espagnol</option>
							<option value="3">Russe</option>
							<option value="4">Arabe</option>
							<option value="5">Italien</option>
							<option value="6">Allemand</option>
							<option value="7">Français</option>
							<option value="8">Chinois</option>
							<option value="9">Portugais</option>
							<option value="10">Turc</option>
							<option value="11">Antillais</option>
							<option value="12">Mexiquain</option>
							<option value="13">Créole</option>
							<option value="14">Jamaicain</option>
							<option value="15">Coréen</option>
							<option value="16">Cantonais</option>
							<option value="17">Ukrainien</option>
				</select></br><br/>
				
				<label>Ville de résidence :</label> 

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="city">
				<?php
				for($i=0; $i<13; $i++)
				{
					if($i>=1)
						{echo '<option disabled value="'.$i.'">'.getCityName($i).'</option>';}
					else
						{echo '<option value="'.$i.'">'.getCityName($i).'</option>';}
				}
				?>
				</select></br><br/>

				</div>
			</fieldset>
			<br/>
				<center><button class="buton_g" name="register2" value="Valider" type="submit">Valider</button><center>
				</form>
				<div class="clear">&nbsp;</div>
			</div>
		<?php
		}
		elseif($_SESSION['register'] == 4)
		{
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_site_insriptions WHERE id = '.$_SESSION['register_SQLID'].'');
			$dStats = mysqli_fetch_array($req);
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $dStats['email']))
				{$passage_ligne = "\r\n";}
			else
				{$passage_ligne = "\n";}
				
			$boundary = "-----=".md5(rand());
			//=====Création du header de l'e-mail
			$header = "From: \"SanAndreasRolePlay\"<sanandreasrporiginal@gmail.com>".$passage_ligne;
			$header .= "Reply-to: \"SanAndreasRolePlay\" <sanandreasrporiginal@gmail.com>".$passage_ligne;
			$header .= "MIME-Version: 1.0".$passage_ligne;
			$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========

			$message = "...";
			$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message .= "...";

			
			$message = str_replace("\n.", "\n..",'
			Bonjour, '.$dStats['name'].'
			Nous vous informons que votre inscription sur San Andreas RolePlay a été enregistrée dans notre base de données. 
			Cependant celle-ci est en attente de validation par un administrateur, votre compte sera validé sous 48 heures et vous receverez un message le confirmant.
			
			Voici un récapitualif de votre compte :
			- Nom : '.$dStats['name'].'
			- Email : '.$dStats['email'].'
			- Mot de passe : '.$dStats['pass'].'
			- IP : '.$dStats['ip'].'
			
			Ci cela n\'est pas déjà fait, nous vous invitons à vous inscrire sur notre forum :
			http://sanandreas-rp.fr/forum/
			
			Liens utils :
			Site : http://sanandreas-rp.fr/
			Forum : http://sanandreas-rp.fr/forum/
			Adresse TeamSpeak : ts.sanandreas-rp.fr
			Adresse SAMP : samp.sanandreas-rp.fr
			
			L\'équipe de San Andreas RolePlay vous remercie de votre inscription.
			
			Ne répondez pas à ce message !
			');
			mail($dStats['email'],'[SARPfr] Inscription',$message,$header);
			$_SESSION['register']=0;
			?>
			<div class="top">Inscription  »  Etape 3</div>
			<div class="contain">
				<fieldset>
				<br/>
				<b>Inscription réussie !</b><br/><br/>
				Votre inscription sur SARP a bien été enregistrée.<br/>
				Nous vous avons envoyé un email confirmant vos données enregistrées<br/> à l'adresse suivante <font color="red"><?php echo $dStats['email']; ?></font><br/>
				<br/>
				Votre compte est en attente de validation par un Administrateur, le temps d'attente est inférieur à 48 heures.<br/>
				Vous serez avertis par message lorsque votre compte sera validé.<br/>
				<br/>
				Si cela n'est pas déjà fait, nous vous invitons à vous inscrire sur notre forum : <br/>
				<a href="http://sanandreas-rp.fr/forum/">http://sanandreas-rp.fr/forum/</a><br/><br/>
				L'équipe de San Andreas RolePlay vous remerci de votre compréhension.
				
				<br/>
				</fieldset>
				<div class="clear">&nbsp;</div>
			</div>
			<?php
		}
	}
	else
		{header ('Location: index.php');}
?>