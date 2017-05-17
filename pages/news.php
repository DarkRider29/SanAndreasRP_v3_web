<!--
	pages/news.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
		$error=0;
		if(!empty($_GET['sup_id']))
		{
			$tmpId = mysqli_real_escape_string($bdd,$_GET['sup_id']);
			mysqli_query($bdd,'DELETE FROM lvrp_site_news WHERE id='.$tmpId.'');
			echo '<meta http-equiv="refresh" content="2; URL=?p=news">';
		}
		if(isset($_POST['ok']))
		{
			$titre = mysqli_real_escape_string($bdd,htmlspecialchars($_POST['title']));
			$contenu = mysqli_real_escape_string($bdd,$_POST['contenu']);
			if ($titre == '' || $contenu == '')
				{$error=1;}
			else
			{
				$req1 = mysqli_query($bdd,"SELECT * FROM lvrp_site_news");
				$data1 = mysqli_fetch_array($req1);
				if ($titre == $data1['Title'])
					{$error=2;}
				else
				{	
					$requete = 'INSERT INTO lvrp_site_news SET Title="'.$titre.'", Autor="'.$_SESSION['login'].'", Contenu="'.$contenu.'", Date=UNIX_TIMESTAMP()';
					mysqli_query($bdd,$requete) or die (mysqli_error());
					echo '<meta http-equiv="refresh" content="2; URL=?p=news">';
				}
			}
		}
		if(isset($_POST['ok2']))
		{
			$titre = mysqli_real_escape_string($bdd,htmlspecialchars($_POST['title']));
			$contenu = mysqli_real_escape_string($bdd,$_POST['contenu']);
			$tmpId = mysqli_real_escape_string($bdd,$_GET['edit_id']);
			if ($titre == '' || $contenu == '')
				{$error=1;}
			else
			{
				$requete = 'UPDATE lvrp_site_news SET Title="'.$titre.'", Contenu="'.$contenu.'" WHERE id='.$tmpId.'';
				mysqli_query($bdd,$requete) or die (mysqli_error());
				echo '<meta http-equiv="refresh" content="2; URL=?p=news">';
			}
		}
?>
	<div class="top">Admin  »  Articles</div>
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
		<br/>
		<?php
			if($error == 1)
				{echo '<div class="box_warning"><center>Remplissez tous les champs !</center></div>';}
			if($error == 2)
				{echo '<div class="box_warning"><center>Ce titre de news existe déja !</center></div>';}
		?>
		<h3>Liste des articles ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="center">Titre</th>
					<th class="center">Auteur</th>
					<th class="center">Contenu</th>
					<th class="center">Date</th>
					<th class="center">Modifier</th>
					<th class="center">Supprimer</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$req2 = mysqli_query($bdd,'SELECT * FROM lvrp_site_news ORDER BY Date DESC');
				while ($donnees = mysqli_fetch_assoc($req2))
				{
					$tmpNews = htmlspecialchars(substr($donnees['Contenu'], 0 , 28));
					?>
					<tr>
						<td class="center"><?php echo $donnees['Title'];?></td>
						<td class="center"><?php echo $donnees['Autor'];?></td>
						<td class="center"><?php echo ''.$tmpNews.' [...]';?></td>
						<td class="center"><?php echo date("d-m-Y à H:i:s",$donnees['Date']);?></td>
						<td class="center"><?php echo '<center><a href="index.php?p=news&amp;edit_id='.$donnees['id'].'"><img src=images/pencil.png></a></center>';?></td>
						<td class="center"><?php echo '<center><a href="index.php?p=news&amp;sup_id='.$donnees['id'].'"><img src=images/croix.png></a></center>';?></td>
					</tr>
			<?php } ?>
			</tbody>
		</table>
		<br/>
		<?php
		if(!empty($_GET['edit_id']))
		{ 
			$tmpId = mysqli_real_escape_string($bdd,$_GET['edit_id']);
			$req = mysqli_query($bdd,'SELECT * FROM lvrp_site_news WHERE id = '.$tmpId.'');
			$data = mysqli_fetch_array($req);
		?>
			<h3>Editer un article ..</h3>
			<div >
			<form method="post" action="#" name="ok2" class="box validate">
				<fieldset>
					<center>Titre : <br/><input type="text" name="title" value="<?php echo $data['Title']; ?>" id="title" size="32" maxlength="64"></center><br/><br/>
					<center>Contenu :</center><textarea name="contenu" id="contenu" class="ckeditor"><?php echo $data['Contenu']; ?></textarea><br/>
					<center><input class="buton_g" type="submit" name="ok2"  value="Valider" /></center>
				</fieldset>
			</form>
			</div>
		<?php 
		}
		else
		{ ?>
			<h3>Nouvelle article ..</h3>
			<div >
			<form method="post" action="#" name="ok" class="box validate">
				<fieldset>
					<center>Titre : <br/><input type="text" name="title", id="title" size="32" maxlength="64"></center><br/><br/>
					<center>Contenu :</center><textarea name="contenu" id="contenu" class="ckeditor"></textarea><br/>
					<center><input class="buton_g" type="submit" name="ok"  value="Valider" /></center>
				</fieldset>
			</form>
			</div>
		<?php }
		?>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>