<?php
/*
	index.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
*/
// Démarrage session
	session_start();

// Dépendance du site
	require_once('includes/mysql.php');
	require_once('includes/sampquery.class.php');
	require_once('includes/functions.php');
	require_once('includes/header.php');

// Gestion des pages
	if (empty($_GET['p'])) 
		{$_GET['p'] = 'home';}

	switch($_GET['p'])
	{
		case "404":
		case "home":
		case "menu":
		case "character":
		case "goods":
		case "register":
		case "shop":
		case "packs":
		case "vip":
		case "tokens":
		case "vote":
		case "classements":
		case "faction":
		case "admins":
		case "salaries":
		case "factions":
		case "download":
		case "jobs":
		case "inventory":
		case "phone":
		case "edit":
		case "admin":
		case "candidatures":
		case "candidature":
		case "sanctions":
		case "news":
		case "logs":
		case "piloris":
		case "connected":
		case "concessions":
		case "market":
			include("./pages/".$_GET['p'].".php");
		break;

		default:
			include("./pages/404.php");
	break;
}

// Dépendance du site
	require_once('includes/menu_right.php');
	require_once('includes/footer.php');
	
?>