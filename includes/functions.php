<?php

	function isConnected()
	{
		if(!isset($_SESSION['login'])){return false;} 
		else {return true;}
	}
	
	function isInGame()
	{
		global $bdd;
		$req = mysqli_query($bdd,'SELECT Connected FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_row($req);
		if($dStats[0] != 0){return true;} 
		else {return false;}
	}
	
	function isAdmin()
	{
		global $bdd;
		$req = mysqli_query($bdd,'SELECT AdminLevel FROM lvrp_users WHERE id = '.$_SESSION['id'].'');
		$dStats = mysqli_fetch_row($req);
		if($dStats[0] != 0){return true;} 
		else {return false;}
	}

	function getAdminRank($id)
	{
		switch($id)
		{
			case 1: return 'Modérateur en Test';
			case 2: return 'Modérateur';
			case 3: return 'Administrateur';
			case 4: return 'Administrateur Général';
			default: return 'Aucun';
		}
	}
	
	function getVipRank($id)
	{
		switch($id)
		{
			case 1: return 'Aucun';
			case 1: return 'Fer';
			case 2: return 'Argent';
			case 3: return 'Or';
			case 4: return 'Diamant';
			default: return 'Aucun';
		}
	}
	
	function getStyleCombat($id)
	{
		switch($id)
		{
			case 0: return 'Elbow';
			case 1: return 'Boxing';
			case 2: return 'Grabkick';
			case 3: return 'Kneehead';
			case 4: return 'Kungfu';
			case 5: return 'Normal';
			default: return 'Aucun';
		}
	}
	
	function getOriginName($id)
	{
		switch($id)
		{
			case 1: return 'Vice City';
			case 2: return 'Liberty City';
			case 3: return 'Chinatown';
			case 4: return 'San Andreas';
			default: return 'Aucun';
		}
	}
	
	function getCityName($id)
	{
		switch($id)
		{
			case 0: return 'Los Santos';
			case 1: return 'San Fierro';
			case 2: return 'Las Venturas';
			case 3: return 'Fort Carson';
			case 4: return 'BaySide';
			case 5: return 'Angel Pine';
			case 6: return 'Dillimore';
			case 7: return 'Blueberry';
			case 8: return 'Montgomery';
			case 9: return 'Palomino Creek';
			case 10: return 'Las Payasdas';
			case 11: return 'Las Barbancas';
			case 12: return 'El Quebrados';
			default: return 'San Andreas';
		}
	}

	function getLangName($id)
	{
		if($id==1) return 'Japonais';
		elseif($id==2) return 'Espagnol';
		elseif($id==3) return 'Russe';
		elseif($id==4) return 'Arabe';
		elseif($id==5) return 'Italien';
		elseif($id==6) return 'Allemand';
		elseif($id==7) return 'Anglais';
		elseif($id==8) return 'Chinois';
		elseif($id==9) return 'Portugais';
		elseif($id==10) return 'Turc';
		elseif($id==11) return 'Antillais';
		elseif($id==12) return 'Mexiquain';
		elseif($id==13) return 'Créole';
		elseif($id==14) return 'Jamaicain';
		elseif($id==15) return 'Coréen';
		elseif($id==16) return 'Cantonais';
		elseif($id==17) return 'Ukrainien';
		else return 'Aucune';
		
	}
	
	function getWepName($id)
	{
		if($id==1) return 'Point Américain';
		elseif($id==2) return 'Club de Golf';
		elseif($id==3) return 'Matraque';
		elseif($id==4) return 'Couteau';
		elseif($id==5) return 'Batte';
		elseif($id==6) return 'Pelle';
		elseif($id==7) return 'Katana';
		elseif($id==9) return 'Pelle';
		elseif($id==10 || $id==11 || $id==12 || $id==13) return 'God';
		elseif($id==14) return 'Bouqette de fleures';
		elseif($id==15) return 'Pied de biche';
		elseif($id==17) return 'Grenade Lacrymogène';
		elseif($id==18) return 'Cocktail Molotov';
		elseif($id==22) return 'Colt .45';
		elseif($id==23) return 'Colt .45 Silencieux';
		elseif($id==25) return 'ShotGun';
		elseif($id==27) return 'Spa 12';
		elseif($id==28) return 'Uzi';
		elseif($id==29) return 'Mp5';
		elseif($id==30) return 'Ak47';
		elseif($id==31) return 'M41';
		elseif($id==32) return 'Tec 9';
		elseif($id==33) return 'Rifle';
		elseif($id==34) return 'Sniper';
		elseif($id==41) return 'Bombe Lacrymogène';
		elseif($id==42) return 'Extincteur';
		elseif($id==43) return 'Appareil Photo';
		elseif($id==46) return 'Parachute';
	}
	
	function getVehicleName($model)
	{
		if($model==400) return 'Landstalker';
		elseif($model==401) return 'Bravura';
		elseif($model==402) return 'Buffalo';
		elseif($model==403) return 'Linerunner';
		elseif($model==404) return 'Perenniel';
		elseif($model==405) return 'Sentinel';
		elseif($model==406) return 'Dumper';
		elseif($model==407) return 'Firetruck';
		elseif($model==408) return 'Trashmaster';
		elseif($model==409) return 'Stretch';
		elseif($model==410) return 'Manana';
		elseif($model==411) return 'Infernus';
		elseif($model==412) return 'Voodoo';
		elseif($model==413) return 'Pony';
		elseif($model==414) return 'Mule';
		elseif($model==415) return 'Cheetah';
		elseif($model==416) return 'Ambulance';
		elseif($model==417) return 'Leviathan';
		elseif($model==418) return 'Moonbeam';
		elseif($model==419) return 'Esperanto';
		elseif($model==420) return 'Taxi';
		elseif($model==421) return 'Washington';
		elseif($model==422) return 'Bobcat';
		elseif($model==423) return 'Mr Whoopee';
		elseif($model==424) return 'BF Injection';
		elseif($model==425) return 'Hunter';
		elseif($model==426) return 'Premier';
		elseif($model==427) return 'Enforcer';
		elseif($model==428) return 'Securicar';
		elseif($model==429) return 'Banshee';
		elseif($model==430) return 'Predator';
		elseif($model==431) return 'Bus';
		elseif($model==432) return 'Rhino';
		elseif($model==433) return 'Barracks';
		elseif($model==434) return 'Hotknife';
		elseif($model==435) return 'Trailers';
		elseif($model==436) return 'Previon';
		elseif($model==437) return 'Coach';
		elseif($model==438) return 'Cabbie';
		elseif($model==439) return 'Stallion';
		elseif($model==440) return 'Rumpo';
		elseif($model==441) return 'RC Bandit';
		elseif($model==442) return 'Romero';
		elseif($model==443) return 'Packer';
		elseif($model==444) return 'Monster';
		elseif($model==445) return 'Admiral';
		elseif($model==446) return 'Squallo';
		elseif($model==447) return 'Seasparrow';
		elseif($model==448) return 'Pizzaboy';
		elseif($model==449) return 'Tram';
		elseif($model==450) return 'Trailers';
		elseif($model==451) return 'Turismo';
		elseif($model==452) return 'Speeder';
		elseif($model==453) return 'Reefer';
		elseif($model==454) return 'Tropic';
		elseif($model==455) return 'Flatbed';
		elseif($model==456) return 'Yankee';
		elseif($model==457) return 'Caddy';
		elseif($model==458) return 'Solair';
		elseif($model==459) return 'Topfun Van';
		elseif($model==460) return 'Skimmer';
		elseif($model==461) return 'PCJ-600';
		elseif($model==462) return 'Faggio';
		elseif($model==463) return 'Freeway';
		elseif($model==464) return 'RC Baron';
		elseif($model==465) return 'RC Raider';
		elseif($model==466) return 'Glendale';
		elseif($model==467) return 'Oceanic';
		elseif($model==468) return 'Sanchez';
		elseif($model==469) return 'Sparrow';
		elseif($model==470) return 'Patriot';
		elseif($model==471) return 'Quad';
		elseif($model==472) return 'Coastguard';
		elseif($model==473) return 'Dinghy';
		elseif($model==474) return 'Hermes';
		elseif($model==475) return 'Sabre';
		elseif($model==476) return 'Rustler';
		elseif($model==477) return 'ZR-350';
		elseif($model==478) return 'Walton';
		elseif($model==479) return 'Regina';
		elseif($model==480) return 'Comet';
		elseif($model==481) return 'BMX';
		elseif($model==482) return 'Burrito';
		elseif($model==483) return 'Camper';
		elseif($model==484) return 'Marquis';
		elseif($model==485) return 'Baggage';
		elseif($model==486) return 'Dozer';
		elseif($model==487) return 'Maverick';
		elseif($model==488) return 'SAN News Maverick';
		elseif($model==489) return 'Rancher';
		elseif($model==490) return 'FBI Rancher';
		elseif($model==491) return 'Virgo';
		elseif($model==492) return 'Greenwood';
		elseif($model==493) return 'Jetmax';
		elseif($model==494) return 'Hotring Racer';
		elseif($model==495) return 'Sandking';
		elseif($model==496) return 'Blista';
		elseif($model==497) return 'Police Maverick';
		elseif($model==498) return 'Boxville';
		elseif($model==499) return 'Benson';
		elseif($model==500) return 'Mesa';
		elseif($model==501) return 'RC Goblin';
		elseif($model==502) return 'Hotring Racer';
		elseif($model==503) return 'Hotring Racer';
		elseif($model==504) return 'Bloodring Banger';
		elseif($model==505) return 'Rancher';
		elseif($model==506) return 'Super GT';
		elseif($model==507) return 'Elegant';
		elseif($model==508) return 'Journey';
		elseif($model==509) return 'Bike';
		elseif($model==510) return 'Mountain Bike';
		elseif($model==511) return 'Beagle';
		elseif($model==512) return 'Cropduster';
		elseif($model==513) return 'Stuntplane';
		elseif($model==514) return 'Tanker';
		elseif($model==515) return 'Roadtrain';
		elseif($model==516) return 'Nebula';
		elseif($model==517) return 'Majestic';
		elseif($model==518) return 'Buccaneer';
		elseif($model==519) return 'Shamal';
		elseif($model==520) return 'Hydra';
		elseif($model==521) return 'FCR-900';
		elseif($model==522) return 'NRG-500';
		elseif($model==523) return 'HPV1000';
		elseif($model==524) return 'Cement Truck';
		elseif($model==525) return 'Towtruck';
		elseif($model==526) return 'Fortune';
		elseif($model==527) return 'Cadrona';
		elseif($model==528) return 'FBI Truck';
		elseif($model==529) return 'Willard';
		elseif($model==530) return 'Forklift';
		elseif($model==531) return 'Tractor';
		elseif($model==532) return 'Combine Harvester';
		elseif($model==533) return 'Feltzer';
		elseif($model==534) return 'Remington';
		elseif($model==535) return 'Slamvan';
		elseif($model==536) return 'Blade';
		elseif($model==537) return 'Freight';
		elseif($model==538) return 'Brownstreak';
		elseif($model==539) return 'Vortex';
		elseif($model==540) return 'Vincent';
		elseif($model==541) return 'Bullet';
		elseif($model==542) return 'Clover';
		elseif($model==543) return 'Sadler';
		elseif($model==544) return 'Firetruck';
		elseif($model==545) return 'Hustler';
		elseif($model==546) return 'Intruder';
		elseif($model==547) return 'Primo';
		elseif($model==548) return 'Cargobob';
		elseif($model==549) return 'Tampa';
		elseif($model==550) return 'Sunrise';
		elseif($model==551) return 'Merit';
		elseif($model==552) return 'Utility Van';
		elseif($model==553) return 'Nevada';
		elseif($model==554) return 'Yosemite';
		elseif($model==555) return 'Windsor';
		elseif($model==556) return 'Monster';
		elseif($model==557) return 'Monster';
		elseif($model==558) return 'Uranus';
		elseif($model==559) return 'Jester';
		elseif($model==560) return 'Sultan';
		elseif($model==561) return 'Stratum';
		elseif($model==562) return 'Elegy';
		elseif($model==563) return 'Raindance';
		elseif($model==564) return 'RC Tiger';
		elseif($model==565) return 'Flash';
		elseif($model==566) return 'Tahoma';
		elseif($model==567) return 'Savanna';
		elseif($model==568) return 'Bandito';
		elseif($model==569) return 'Trailers';
		elseif($model==570) return 'Trailers';
		elseif($model==571) return 'Kart';
		elseif($model==572) return 'Mower';
		elseif($model==573) return 'Dune';
		elseif($model==574) return 'Sweeper';
		elseif($model==575) return 'Broadway';
		elseif($model==576) return 'Tornado';
		elseif($model==577) return 'AT400';
		elseif($model==578) return 'DFT-30';
		elseif($model==579) return 'Huntley';
		elseif($model==580) return 'Stafford';
		elseif($model==581) return 'BF-400';
		elseif($model==582) return 'Newsvan';
		elseif($model==583) return 'Tug';
		elseif($model==584) return 'Trailer';
		elseif($model==585) return 'Emperor';
		elseif($model==586) return 'Wayfarer';
		elseif($model==587) return 'Euros';
		elseif($model==588) return 'Hotdog';
		elseif($model==589) return 'Club';
		elseif($model==590) return 'Trailer';
		elseif($model==591) return 'Trailer';
		elseif($model==592) return 'Andromada';
		elseif($model==593) return 'Dodo';
		elseif($model==594) return 'RC Cam';
		elseif($model==595) return 'Launch';
		elseif($model==596) return 'Police Car';
		elseif($model==597) return 'Police Car';
		elseif($model==598) return 'Police Car';
		elseif($model==599) return 'Police Ranger';
		elseif($model==600) return 'Picador';
		elseif($model==601) return 'S.W.A.T';
		elseif($model==602) return 'Alpha';
		elseif($model==603) return 'Phoenix';
		elseif($model==604) return 'Glendale Shit';
		elseif($model==605) return 'Sadler Shit';
		elseif($model==606) return 'Baggage';
		elseif($model==607) return 'Baggage';
		elseif($model==608) return 'Tug Stairs';
		elseif($model==609) return 'Boxville';
		elseif($model==610) return 'Farm Trailer';
		elseif($model==611) return 'Utility Trailer';
	}
	function getVehicleColor($color)
	{
		if($color==0) return 'Noire';
		
		elseif($color==1 || $color==-1) return 'Blanche';
		
		elseif($color==3) return 'Rouge';
		
		elseif($color==16) return 'Verte';
		
		elseif($color==6) return 'Jaune';
		
		elseif($color==7) return 'Bleu';
		
		elseif($color==255) return 'Aléatoire';
		
		else return 'No définie';
	}
	
	function getHouseAssurance($type)
	{
		if($type==0) return 'Aucune';
		
		elseif($type==1) return '25% de remise';
		
		elseif($type==2) return '50% de remise';
		
		elseif($type==3) return '75% de remise';
	}
	
	function getFactionName($id)
	{
		global $bdd;
		if($id==1) return 'LSPD Centre';
		elseif($id==2) return 'SFPD';
		elseif($id==3) return 'LSPD Est';
		elseif($id==4) return 'SASD';
		elseif($id==5) return 'FBI';
		elseif($id==6) return 'Gouvernement LS';
		elseif($id==7) return 'Gouvernement SF';
		elseif($id==8) return 'Gouvernement LV';
		elseif($id==9) return 'Gouvernement SA';
		elseif($id==10) return 'CIA';
		elseif($id>=200)
		{
			$sqlid = $id-199;
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_illegals` WHERE `id`=".$sqlid."");
			$dFac = mysqli_fetch_array($result);
			return $dFac['Name'];
		}
	}
	
	function getFactionRank($id,$rank)
	{
		global $bdd;
		if($id>=1 && $id <= 4)
		{
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_polices` WHERE `id`=".$id."");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Rank1'];
			elseif($rank==2) return $dFac['Rank2'];
			elseif($rank==3) return $dFac['Rank3'];
			elseif($rank==4) return $dFac['Rank4'];
			elseif($rank==5) return $dFac['Rank5'];
			elseif($rank==6) return $dFac['Rank6'];
			elseif($rank==7) return $dFac['Rank7'];
			elseif($rank==8) return $dFac['Rank8'];
			else return $dFac['Rank1'];
		}
		if($id==5)
		{
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_fbi` WHERE `id`=1");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Rank1'];
			elseif($rank==2) return $dFac['Rank2'];
			elseif($rank==3) return $dFac['Rank3'];
			elseif($rank==4) return $dFac['Rank4'];
			elseif($rank==5) return $dFac['Rank5'];
			elseif($rank==6) return $dFac['Rank6'];
			else return $dFac['Rank1'];
		}
		if($id>=6 && $id<=9)
		{
			$iddd=$id-5;
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_governements` WHERE `id`=".$iddd."");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['rank1'];
			elseif($rank==2) return $dFac['rank2'];
			elseif($rank==3) return $dFac['rank3'];
			elseif($rank==4) return $dFac['rank4'];
			elseif($rank==5) return $dFac['rank5'];
			elseif($rank==6) return $dFac['rank6'];
			else return $dFac['rank1'];
		}
		if($id==10)
		{
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_sannews` WHERE `id`=1");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Rank1'];
			elseif($rank==2) return $dFac['Rank2'];
			elseif($rank==3) return $dFac['Rank3'];
			elseif($rank==4) return $dFac['Rank4'];
			elseif($rank==5) return $dFac['Rank5'];
			elseif($rank==6) return $dFac['Rank6'];
			else return $dFac['Rank1'];
		}
		if($id>=200)
		{
			$sqlid = $id-199;
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_illegals` WHERE `id`=".$sqlid."");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Rank1'];
			elseif($rank==2) return $dFac['Rank2'];
			elseif($rank==3) return $dFac['Rank3'];
			elseif($rank==4) return $dFac['Rank4'];
			elseif($rank==5) return $dFac['Rank5'];
			elseif($rank==6) return $dFac['Rank6'];
			else return $dFac['Rank1'];
		}
	}
	function getFactionSkin($id,$rank)
	{
		global $bdd;
		if($id>=1 && $id <= 4)
		{
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_polices` WHERE `id`=".$id."");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Skin1'];
			elseif($rank==2) return $dFac['Skin2'];
			elseif($rank==3) return $dFac['Skin3'];
			elseif($rank==4) return $dFac['Skin4'];
			elseif($rank==5) return $dFac['Skin5'];
			elseif($rank==6) return $dFac['Skin6'];
			else return $dFac['Skin1'];
		}
		if($id==5)
		{
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_fbi` WHERE `id`=1");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Skin1'];
			elseif($rank==2) return $dFac['Skin2'];
			elseif($rank==3) return $dFac['Skin3'];
			elseif($rank==4) return $dFac['Skin4'];
			elseif($rank==5) return $dFac['Skin5'];
			elseif($rank==6) return $dFac['Skin6'];
			else return $dFac['Skin1'];
		}
		if($id>=6 && $id<=9)
		{
			$iddd=$id-5;
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_governements` WHERE `id`=".$iddd."");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['skin1'];
			elseif($rank==2) return $dFac['skin2'];
			elseif($rank==3) return $dFac['skin3'];
			elseif($rank==4) return $dFac['skin4'];
			elseif($rank==5) return $dFac['skin5'];
			elseif($rank==6) return $dFac['skin6'];
			else return $dFac['skin1'];
		}
		if($id>=200)
		{
			$sqlid = $id-199;
			$result = mysqli_query($bdd,"SELECT * FROM `lvrp_factions_illegals` WHERE `id`=".$sqlid."");
			$dFac = mysqli_fetch_array($result);
			if($rank==1) return $dFac['Rank1'];
			elseif($rank==2) return $dFac['Skin2'];
			elseif($rank==3) return $dFac['Skin3'];
			elseif($rank==4) return $dFac['Skin4'];
			elseif($rank==5) return $dFac['Skin5'];
			elseif($rank==6) return $dFac['Skin6'];
			else return $dFac['Rank1'];
		}
	}
	
	function getJobName($id)
	{
		switch ($id)
		{
			case 1:  {return"Livreur de Pizza";}
			case 2:  {return"Fermier";}
			case 3:  {return"Mineur";}
			case 4:  {return"Eboueur";}
			case 5:  {return"Ouvrier";}
			case 6:  {return"Pilote de Ligne";}
			case 7:  {return"Facteur";}
			case 8:  {return"Pecheur";}
			case 9:  {return"Voiturier";}
			case 10: {return"Camionneur";}
			case 11: {return"Medecin";}
			case 12: {return"Bagagiste";}
			case 13: {return"Déménageur";}
			case 14: {return"Jardinier";}
			case 16: {return"Pompier";}
			case 17: {return"Mécanicien";}
			case 18: {return"Récupérateur de Carcasse";}
			case 19: {return"Vendeur à la sauvette ";}
			case 20: {return"Chauffeur de taxi";}
			case 21: {return"Avocat";}
		}
		return "Aucun";
	}
	
	function getWeaponName($id)
	{
		if($id==1) return 'Point Américain';
		elseif($id==2) return 'Club de Golf';
		elseif($id==3) return 'Matraque';
		elseif($id==4) return 'Couteau';
		elseif($id==5) return 'Batte';
		elseif($id==6) return 'Pelle';
		elseif($id==7) return 'Katana';
		elseif($id==9) return 'Pelle';
		elseif($id==10 || $id==11 || $id==12 || $id==13) return 'God';
		elseif($id==14) return 'Bouqette de fleures';
		elseif($id==15) return 'Pied de biche';
		elseif($id==17) return 'Grenade Lacrymogène';
		elseif($id==18) return 'Cocktail Molotov';
		elseif($id==22) return 'Colt .45';
		elseif($id==23) return 'Colt .45 Silencieux';
		elseif($id==25) return 'ShotGun';
		elseif($id==27) return 'Spa 12';
		elseif($id==28) return 'Uzi';
		elseif($id==29) return 'Mp5';
		elseif($id==30) return 'Ak47';
		elseif($id==31) return 'M41';
		elseif($id==32) return 'Tec 9';
		elseif($id==33) return 'Rifle';
		elseif($id==34) return 'Sniper';
		elseif($id==41) return 'Bombe Lacrymogène';
		elseif($id==42) return 'Extincteur';
		elseif($id==43) return 'Appareil Photo';
		elseif($id==46) return 'Parachute';
	}
	
	function getItemName($modelid)
	{
		switch($modelid)
		{
			case 1 - 49 :{return getWeaponName($modelid);}
			case 1212 :{return"Argent";}
			case 1575 :{return"Weed";}
			case 1946 :{return"Ball de Basket";}
			case 1576 :{return"Matériaux";}
			case 1577 :{return"Graine";}
			case 1578 :{return"Cocaïne";}
			case 1579 :{return"Heroïne";}
			case 1580 :{return"Ecstasy";}
			case 1950 :{return"Morphine";}
			case (19039 > $modelid && $modelid < 19053) :{return"Montre"; break;}
			case 18921 > $modelid && $modelid < 18924 : {return"Beret";}
			case 18634 :{return"Pied de biche";}
			case 18645 : case 18976 - 18979 :{return"Casque Moto";}
			case 19006 > $modelid && $modelid < 19035: case 19138 > $modelid && $modelid < 19140 :{return"Lunette";}
			case 18891 - 18920 :{return"Bandana";}
			case 19421 - 19424:{return"Casque Stereo";}
			case 18875 :{return"GPS";}
			case 1650 :{return"Jerricain";}
			case 1485 :{return"Joint";}
			case 1210 :{return"Malette";}
			case 18643: case 19080 > $modelid && $modelid < 19084 :{return"Laser";}
			case 1718 :{return"Decodeur";}
			case 2226 :{return"BoomBox";}
			case 2966 :{return"Talkie Walkie";}
			case 2351 :{return"Briquet";}
			case 2751 :{return"Tabac";}
			case 2752 :{return"Cigarettes";}
			case 19087 :{return"Corde";}
			case 18974 :{return"Cagoule";}
			case 1851 :{return"Dé";}
			case 1719 :{return"RadioFm";}
			case 328 :{return"Feuilles";}
			case 2894 :{return"Annuaire";}
			case 18926 > $modelid && $modelid < 18935 : {return"Casquette";}
			case 19093 : {return"Casquette";}
			case 18636 : {return"Casquette";}
			case 19160 : {return"Casquette";}
			case 18939 > $modelid && $modelid < 18943 : {return"Casquette";}
			case 18955 > $modelid && $modelid < 18959 :{return"Casquette";}
			case 18944 > $modelid && $modelid < 18951: {return"Chapeau";}
			case 18970 > $modelid && $modelid < 18971: {return"Chapeau";}
			case 18969: {return"Chapeau";}
			case 19095 > $modelid && $modelid < 19098: {return"Chapeau";}
			case 18639: {return"Chapeau";}
			case 18962: {return"Chapeau";}
			case 19099: {return"Chapeau";}
			case 19100 :{return"Chapeau";}
		}
		return "Aucun";
	}
	
	function log_Token($Name,$Reason)
	{
		$date = date("d-m-Y");
		$heure = date("H:i");
		$ip = $_SERVER["REMOTE_ADDR"];
		mysqli_query($bdd,"INSERT INTO `lvrp_site_tokens` SET Name='".$Name."', Date='".$date." a ".$heure."', Reason='".$Reason."', Ip='".$ip."'");
	}

	function log_Buy($Id,$Reason,$price)
	{
		$date = date("d-m-Y");
		$heure = date("H:i");
		$ip = $_SERVER["REMOTE_ADDR"];
		mysqli_query($bdd,"INSERT INTO `lvrp_site_pay` SET SQLid='".$Id."', Date='".$date." a ".$heure."', Reason='".$Reason."', Ip='".$ip."', Price ='".$price."'");
	}
	
	function IsAPlane($model)
	{
		if($model == 460 || $model == 476 || $model == 511 || $model == 512 || $model == 513 || $model == 520 || $model == 553 || $model == 577 || $model == 592 || $model == 593)
			{return true;}
		return false;
	}
	
	function IsABoat($model)
	{
		if($model == 472 || ($model == 473) || ($model == 484) || ($model == 493) || ($model == 595) || ($model == 430) || ($model == 453) || ($model == 452) || ($model == 446) || ($model == 454))
			{return true;}
		return false;
	}
	
	function IsAHelicopter($model)
	{
		if($model == 417 || $model == 425 || $model == 447 || $model == 469 || $model == 487 || $model == 488 || $model == 497 || $model == 548 || $model == 563)
			{return true;}
		return false;
	}
	
	function getDealerShipPos($city, $model, &$posx, &$posy, &$posz, &$posa)
	{
		if($city == 0 || $city == 6 || $city == 7 || $city == 8 || $city == 9)
		{
			if(IsAHelicopter($model) || IsAPlane($model))
			{
				$posx=1554.2797;
				$posy=-2636.7129;
				$posz=13.2724;
				$posa=359.8439;
			}
			elseif(IsABoat($model))
			{
				$posx=860.3051;
				$posy=-1979.1169;
				$posz-0.6543;
				$posa=271.2381;
			}
			else
			{
				$posx=2308.6560;
				$posy=-1992.9777;
				$posz=13.2617;
				$posa=269.5106;
			}
		}
		elseif($city == 1 || $city == 5)
		{
			if(IsAHelicopter($model) || IsAPlane($model))
			{
				$posx=-1293.3965;
				$posy=-0.3290;
				$posz=15.0705;
				$posa=134.2761;
			}
			elseif(IsABoat($model))
			{
				$posx=-1631.8468;
				$posy=160.5995;
				$posz-0.6049;
				$posa=316.1017;
			}
			else
			{
				$posx=-1576.0115;
				$posy=127.0075;
				$posz=3.2565;
				$posa=187.9822;
			}
		}
		elseif($city == 2 || $city == 3 || $city == 4 || $city == 10 || $city == 11 || $city == 12)
		{
			if(IsAHelicopter($model) || IsAPlane($model))
			{
				$posx=1328.3392;
				$posy=1585.8988;
				$posz=11.7420;
				$posa=268.1481;
			}
			elseif(IsABoat($model))
			{
				$posx=2295.3750;
				$posy=518.8284;
				$posz=-0.3876;
				$posa=91.5610;
			}
			else
			{
				$posx=1463.6990;
				$posy=2327.3416;
				$posz=10.5259;
				$posa=358.6438;
			}
		}
	}