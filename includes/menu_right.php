<?php
/*
	includes/menu_right.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
*/
?>
	</div>
	<div id="aside_right">
	<div class="top">Accueil</div>
	<ul class="nav-sub">
		<li><a href="index.php?p=admins"><b>&Eacute;quipe</b></a></li>
		<li><a href="http://sanandreas.forumactif.org/f4-reglements"><b>Règlements</b></a></li>
		<li><a href="http://sanandreas.forumactif.org/f4-reglements"><b>Définitions</b></a></li>
		<li><a href="index.php?p=classements"><b>Classements</b></a></li>
		<li><a href="index.php?p=download"><b>Téléchargements</b></a></li>
	</ul>
	</div>
	<div id="aside_right">
	<div class="top">Le serveur</div>
	<ul class="nav-sub">
		<li><a href="index.php?p=connected"><b>Les membres connectés</b></a></li>
		<li><a href="index.php?p=piloris"><b>Les piloris</b></a></li>
		<li><a href="index.php?p=salaries"><b>Les salaires</b></a></li>
		<li><a href="index.php?p=factions"><b>Les factions</b></a></li>
		<li><a href="index.php?p=jobs"><b>Les jobs</b></a></li>
		<li><a href="index.php?p=concessions"><b>Les concessions</b></a></li>
	</ul>
	</div>
	
	<?php if(isConnected()) { ?>
	<div id="aside_right">
	<div class="top">In Charactere</div>
	<ul class="nav-sub">
		<li><a href="index.php?p=elections"><b>&Eacute;lections</b></a></li>
		<li><a href="index.php?p=snews"><b>Journal du San News</b></a></li>
		<li><a href="index.php?p=press"><b>Communiqué de press</b></a></li>
		<li><a href="index.php?p=leboncoin_sa"><b>LeBonCoin.sa</b></a></li>
		<li><a href="index.php?p=meetlove_sa"><b>MeetLove.sa</b></a></li>
	</ul>
	</div>
	<?php }   ?> 
	<div id="aside_right">
	<div class="top">Publicite</div>
	<br/>
	<script src="http://www.pubdirecte.com/script/banniere.php?id=101226&ref=67528"></script>
	<Br/>