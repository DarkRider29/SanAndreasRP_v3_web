<!--
	pages/home.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
-->
<?php
	if(isConnected())
	{
?>
	<div class="top">Admin  »  Informations</div>
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
		<br/>
		<fieldset>
		Bienvenue dans la section dédiée aux administrateurs !<br/>
		Ce panel a été réalisé afin de ganger du temps en évitant aux administrateurs de se connectés
		<br/><br/>
		
		Sachez qu'il n'est pas terminé à 100% et qu'il se peut que certain bug y sont.<br/>
		Merci de les reporter sur le forum en partie admin !
		<br />
		</fieldset>
		<div class="clear">&nbsp;</div>
	</div>
<?php
	}
	else
		{header ('Location: index.php');}
?>