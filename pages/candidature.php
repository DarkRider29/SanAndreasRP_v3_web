<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected() && isAdmin())
	{
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		
		if(isset($_GET['accept']))
		{
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_site_insriptions WHERE id = '.$_GET['accept'].'');
			if($dVal = mysqli_fetch_array($req))
			{
			
			$requete="INSERT INTO lvrp_users (id,Name,Email,Pass,Sex,Age,Skin,Origin,Lang1,City,Inscription) VALUES ('','".$dVal['name']."','".$dVal['email']."','".sha1($dVal['pass'])."','".$dVal['sex']."','".$dVal['age']."','".$dVal['skin']."','".$dVal['origin']."','".$dVal['lang']."','".$dVal['city']."',UNIX_TIMESTAMP())";
			mysqli_query($bdd,$requete);
			$tmpId = mysqli_insert_id($bdd);
			mysqli_query($bdd,'INSERT INTO lvrp_users_inventories Set SQLid="'.$tmpId.'"');
			mysqli_query($bdd,'INSERT INTO lvrp_users_phones SET SQLid="'.$tmpId.'"');
			
			for($i=1; $i<=5; $i++)
				{mysqli_query($bdd,'INSERT INTO lvrp_users_accessories Set SQLid="'.$tmpId.'", IndexZ="'.$i.'"');}
				
				if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $dVal['email']))
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
				Bonjour, '.$dVal['name'].'
				
				Nous avons le plaisir de vous informer que votre compte a été accepté ! 
				Vous pouvez dès à présent vous connectez au serveur à l\'aide de vos identifiants.
				
				Liens utils :
				Site : http://sanandreas-rp.fr/
				Forum : http://sanandreas-rp.fr/forum/
				Adresse TeamSpeak : ts.sanandreas-rp.fr
				Adresse SAMP : samp.sanandreas-rp.fr
				
				Cordialement,
				L\'équipe de San Andreas RolePlay
				
				Ne répondez pas à ce message !
				');
				mail($dVal['email'],'[SARPfr] Dossier d\'inscription',$message,$header);
				
				mysqli_query($bdd,"DELETE FROM `lvrp_site_insriptions` WHERE `id` = '".$_GET['accept']."'");
				
				echo '<meta http-equiv="refresh" content="0; URL=index.php?p=admin">';
			}
			else
				{echo '<meta http-equiv="refresh" content="0; URL=index.php?p=admin">';}
		}
		
		if(!isset($_GET['id']))
			{echo '<meta http-equiv="refresh" content="0; URL=index.php?p=admin">';}
		else
		{
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_site_insriptions WHERE id = '.$_GET['id'].'');
			$dVal = mysqli_fetch_array($req);
			
			if ($dVal['sex'] == 1){ $dVal['sex'] = 'Homme'; } else { $dVal['sex'] = 'Femme'; }
		}

?>
	<div class="top">Admin  »  Candidature</div>
	<div class="contain">
	<h3>En attente de validation ..</h3>
		<table cellpadding="0" cellspacing="1" class="classic">
            <tr class="tablein"><td colspan="2" align="center" style="padding:2px"><font color="#31302F"><b>Informations</b></font></td></tr>
			<td align="left" valign="middle">
				<ul><?php 
				echo'
					<li><b>Nom :</b> ' . $dVal['name'] .'</li>
					<li><b>Email :</b> ' . $dVal['email'] .'</li>
					<li><b>Date :</b> ' . date('d/m/y',$dVal['dateTime']) .'</li>
					<li><b>Sexe :</b> ' . $dVal['sex'] .'</li>
					<li><b>Age :</b> ' . $dVal['age'] .' ans</li>
					<li><b>Skin :</b> ' . $dVal['skin'] .'</li>
					<li><b>Origine :</b> ' . getOriginName($dVal['origin']) .'</li>
					<li><b>Ville :</b> '.getCityName($dVal['city']).'</li> 
					<li><b>Ip :</b> ' . $dVal['ip'] .'</li>';
					?>
                </ul>
            </td>
		</table>
		<br/>
		<fieldset>
			<center>
			<b>Ecrivez votre motivation à nous rejoindre :</b><br/><br/>
				<?php 
					echo '<textarea disabled rows="6" cols="80">'.$dVal['motivation'].'</textarea>';
				?>
				<br/><br/>
				<b>Ecrivez votre expérience dans le RolePlay :</b><br/><br/>
				<?php 
					echo '<textarea disabled rows="6" cols="80">'.$dVal['experience'].'</textarea>';
				?>
				<br/><br/>
				<b>Ecrivez le(s) nom(s) de votre/vos précédent(s) serveur(s) :</b><br/><br/>
				<?php 
					echo '<textarea disabled rows="6" cols="80">'.$dVal['antecedent'].'</textarea>';
				?>
				<br/><br/>
				<b>Ecrivez l'histoire de votre personnage :</b><br/><br/>
				<?php 
					echo '<textarea disabled rows="6" cols="80">'.$dVal['story'].'</textarea>';
				?>
				<br/><br/>
				<b>Ecrivez vos projets sur le serveur (falcutatif) :</b><br/><br/>
				<?php 
					echo '<textarea disabled rows="6" cols="80">'.$dVal['projet'].'</textarea>';
				?>
			</center>
		</fieldset>

		<div class="menu">
			<center><a class="buton_g" href="index.php?p=candidature&amp;accept=<?php echo $_GET['id']; ?>">Accepter</a>
			<a class="buton_g" href="index.php?p=candidatures&amp;sup_id=<?php echo $_GET['id']; ?>">Refuser</a></center>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>