<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Serveur  »  Salaires</div>
	<div class="contain">
		<h3>Chômages ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Ville</th>
					<th class="center">Montant</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements ORDER BY id');
			while($donnees = mysqli_fetch_assoc($req))
			{
				if($donnees['id']>=4)
					{continue;}
				echo '
				
				<tr>
					<td class="center">'.getCityName($donnees['id']-1).'</td>
					<td class="center">'.$donnees['unemployment'].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Jobs ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Job</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=4');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<21; $i++)
			{
				$name='job'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getJobName($i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Los Santos Police Departement Centre ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=1');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<9; $i++)
			{
				$name='police'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(1,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>San Fierro Police Departement ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=2');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<9; $i++)
			{
				$name='police'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(2,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<h3>Los Santos Police Departement Est ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=3');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<9; $i++)
			{
				$name='police'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(3,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>San Andreas Shériff Departement ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=4');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<9; $i++)
			{
				$name='police'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(4,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Federal Bureau Of Investigation ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=4');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<7; $i++)
			{
				$name='fbi'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(5,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de Los Santos ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=1');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<7; $i++)
			{
				$name='governement'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(6,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de San Fierro ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=2');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<7; $i++)
			{
				$name='governement'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(7,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de Las Venturas ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=3');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<7; $i++)
			{
				$name='governement'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(8,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>Gouvernement de San Andreas ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=4');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<7; $i++)
			{
				$name='governement'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(9,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<h3>San News ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Rang</th>
					<th class="center">Salaire</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_factions_governements WHERE id=4');
			$donnees = mysqli_fetch_assoc($req);
			
			for($i=1; $i<7; $i++)
			{
				$name='cia'.$i.'';
				
				echo '
				
				<tr>
					<td class="center">'.getFactionRank(10,$i).'</td>
					<td class="center">'.$donnees[$name].' $</td>
				</tr>
				
				';
			}?>

			</tbody>
		</table>
		<hr />
		<div class="clear">&nbsp;</div>
	</div>
