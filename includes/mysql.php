<?php
/*
	includes/mysql.php
	site San Andreas RolePlay V3 réalisé par Dark_Rider29
	adapté au GameMode de La Vie RolePlay ©
*/
// Identifiants MySQLi
	$host = '127.0.0.1';
	$port = '3306';
	$bdd1 = 'lvrp';
	$root = 'root';
	$pass = '';
	
// Infos SAMP
	$samp['ip']='127.0.0.1';
	$samp['port']='7777';
	
// Infos TeamSpeak
	$ts3['ip']="ts.sanandreas-rp.fr";
	$ts3['port']="9987";


// Connexion à la base de donnée
	global $bdd;
	if($bdd = mysqli_connect($host, $root, $pass, $bdd1))
		{mysqli_query($bdd ,"SET NAMES UTF8");}
	else
		{echo 'Impossible de se connecté au serveur MySQL.';}
	
?>