<!--
	pages/classements.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	
?>
	<div class="top">Serveur  »  Membres connectes</div>
	<div class="contain">
	<h3>Les membres connectés ..</h3>
		<table class="zebra" cellspacing="0" cellpadding="0">

			<thead>
				<tr>
					<th class="center">Prénom_Nom</th>
					<th class="center">Level</th>
					<th class="center">Dernière connexion</th>
					<th class="center">Profil public</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$position = 0;
			$req = mysqli_query($bdd,'select * FROM lvrp_users WHERE Connected = 1');
			while ($donnees = mysqli_fetch_assoc($req))
			{
			?>

				<tr>
					<?php
						echo '<td class="center">';
						if($donnees['AdminLevel'] > 0)
							{echo '<font color="red">'.$donnees['Name'].'</font>';}
						elseif($donnees['DonateRank'] > 0)
							{echo '<font color="orange">'.$donnees['Name'].'</font>';}
						else
							{echo ''.$donnees['Name'].'';}
						
						echo '</td>';
					?>
					<td class="center"><?php echo $donnees['Level'];?></td>
					<td class="center"><?php echo date('d/m/y',$donnees['LastLog']);?></td>
					<?php
						echo '<td class="center"><a href="#?w=500" rel="popup_'.$donnees['id'].'" class="poplight buton_g">Profil</a></td>';
						if ($donnees['Sex'] == 1){ $donnees['Sex'] = 'Homme'; } else { $donnees['Sex'] = 'Femme'; }
						if($donnees['Married'] != 0)
						{
							$req2 = mysqli_query($bdd,'SELECT Name FROM lvrp_users WHERE id = '.$donnees['MarriedTo'].'');
							$name = mysqli_fetch_row($req2);
							$donnees['MarriedTo']=$name[0];
						}
						else
							{$donnees['MarriedTo']="Personne";}
						echo '
						<div id="popup_'.$donnees['id'].'" class="popup_block">
							<img src="./images/skins/'.$donnees['Skin'].'.jpg" style="float: right; margin: 50px 0 0 20px;" />
							<h2>'.$donnees['Name'].'</h2>
							<h3><font color="red">Identité</font></h3>
							<b>Nom<b/> : '.$donnees['Name'].'<br/>
							<b>Sexe<b/> : '.$donnees['Sex'].'<br/>
							<b>Age<b/> : '.$donnees['Age'].' ans<br/>
							<b>Origine<b/> : '.getOriginName($donnees['Origin']).'<br/>
							<b>Ville<b/> : '.getCityName($donnees['City']).'<br/>
							<b>Marrié à<b/> : '.$donnees['MarriedTo'].'<br/>

							<h3><font color="red">Compte</font></h3>
							<b>Level<b/> : '.$donnees['Level'].'<br/>
							<b>Temps de jeu<b/> : '.$donnees['ConnectedTime'].' heure(s)<br/>
							<b>Vote<b/> : '.$donnees['Votes'].'<br/>
							<b>Inscrit le<b/> : '.date('d/m/y',$donnees['Inscription']).'<br/>
							<b>Dernière connexion<b/> : '.date('d/m/y',$donnees['LastLog']).'<br/>
							
						</div>';
					?>
				</tr>

			<?php } ?>

			</tbody>
		</table>
		<div id="popup1" class="popup_block">
			<a href="http://www.designbombs.com"><img src="bomber.gif" alt="Lil bomb dude" style="float: right; margin: 50px 0 0 20px;" /></a>
			<h2>Popup #1</h2>
			<pre>&lt;a href=&quot;#?w=500&quot; rel=&quot;popup2&quot; class=&quot;poplight&quot;&gt;</pre>

			<p>Aliquip transverbero loquor esse ille vulputate exerci veniam fatua eros similis illum valde. Praesent, venio conventio rusticus antehabeo lenis. Melior pertineo feugait, praesent hos rusticus et haero facilisis abluo. </p>
			<p>Veniam tincidunt augue abluo vero, augue nisl melior quidem secundum nobis singularis eum eum.</p><p><strong>Besoin d'inspiration ?</strong> Visitez <a href="http://www.designbombs.com">Design Bombs</a></p>
			
		</div>
		<div class="clear">&nbsp;</div>
	</div>
