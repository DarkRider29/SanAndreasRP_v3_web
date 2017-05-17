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
		
			if(isset($_GET['sup_id']))
			{
				$req = mysqli_query($bdd,'SELECT * FROM lvrp_site_insriptions WHERE id = '.$_GET['sup_id'].'');
				$dVal = mysqli_fetch_array($req);
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
				
				Nous avons le regret de vous annoncer que votre inscription a été refusée. 
				Vous pouvez toujours réessayer en vous rendant sur notre site.
				
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
				mysqli_query($bdd,"DELETE FROM `lvrp_site_insriptions` WHERE `id` = '".$_GET['sup_id']."'");
					echo"
				<script type='text/javascript'>
				window.location.replace('index.php?p=admin');
				</script>
				";
			}

?>
	<div class="top">Admin  »  Candidatures</div>
	<div class="contain">
	<div class="menu">
			<center>
			<a href="index.php?p=admin">Accueil</a> 
			<a href="index.php?p=candidatures">Candidatures</a> 
			<a href="index.php?p=news">Articles</a> 
			<a href="index.php?p=logs">Logs</a> 
			<a href="index.php?p=afactions">Les Factions</a> 
			<a href="index.php?p=ajobs">Les jobs</a>
			<a href="index.php?p=bans">Bans</a> 
			<a href="index.php?p=staff">Equipe</a> 
			</center>
		</div>
	<h3>En attente de validation ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Email</th>
					<th class="center">Date</th>
					<th class="center">IP</th>
					<th class="center">Details</th>
					<th class="center">Supprimer</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_site_insriptions');
			while ($donnees = mysqli_fetch_assoc($req))
			{

			?>

				<tr>
					<td class="center"><?php echo $donnees['name'];?></td>
					<td class="center"><?php echo $donnees['email'];?></td>
					<td class="center"><?php echo date('d/m/y',$donnees['dateTime']);?></td>
					<td class="center"><?php echo $donnees['ip'];?></td>
					<td class="center"><?php echo'<a href="index.php?p=candidature&id='.$donnees['id'].'">' ?>Voir</a></td>
					<td class="center"><?php echo '<center><a href="index.php?p=candidatures&amp;sup_id='.$donnees['id'].'"><img src=images/croix.png></a></center>'; ?></td>

				</tr>

			<?php } ?>

			</tbody>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>