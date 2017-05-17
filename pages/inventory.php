<!--
	pages/inventory.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
		$req = mysqli_query($bdd,'SELECT * FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_array($req);
		

?>
	<div class="top">Mon compte  »  Mon sac</div>
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
		<h3>Item ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Nom</th>
					<th class="center">Quantité</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users_inventories WHERE SQLid='.$_SESSION['id'].'');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<56; $i++)
			{
				$im='iM'.$i.'';
				$iq='iQ'.$i.'';
				
				if($donnees[$im] > 0)
				{
					?>
					<tr>
					<td class="center"><?php echo getItemName($donnees[$im]);?></td>
					<td class="center"><?php echo $donnees[$iq];?></td>
					
				</tr>
					<?php
				}
			}?>

			</tbody>
		</table>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>